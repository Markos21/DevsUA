<?php 

use MVC\Model;

class ModelsUploads extends Model {

    public function getAllData() {
        return [$this->getAllUploads()];
    }

   

    public function getAllUploads() {

        // sql statement
        $sql = "SELECT * FROM " . DB_PREFIX . "uploads";

        // exec query
        $query = $this->db->query($sql);

        $data = [];
       

        // Conclusion
        if ($query->num_rows) {
            foreach($query->rows as $key => $value):
                $data['data'][] = [
                        'uploads'    => $value
                    ];
            endforeach;
        } else {
            $data['uploads'][] = [
                'uploads'       => array()
            ];
        }

        return $data;
    }

public function storeImage($image)
{
     $errors = array();
    
     // File info
    $file_name = $image['name'];
    $file_size = $image['size'];
    $file_tmp = $image['tmp_name'];
    $file_type = $image['type'];

     // Get file extension
    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));
    
    // White list extensions
    $extensions = array("jpeg","jpg","png");
  
     // Check it's valid file for upload
    if(in_array($file_ext, $extensions) === false) {
       $errors =array(
          'status'=>false,
          'message'=>"Extension not allowed, please choose a JPEG or PNG file.",
          'status_code'=>'400'
       );
       return $errors;
    }
    
      // Check file size
    if($file_size > 2097152) {
       $errors = array(
        'status'=>false,
        'message'=>'File size must be exactly 2 MB',
        'status_code'=>'400'
       );
         return $errors;
    }
    
     if(empty($errors) == true) {
    
        $original_file_name = $image['name'];
        $file_size = $image['size'];
        $file_ext = pathinfo($original_file_name, PATHINFO_EXTENSION);
        $hash=md5_file($image['tmp_name']);

        $sql = "INSERT INTO ". DB_PREFIX . " uploads (original_file_name, file_size, file_ext,hash)
                VALUES ('$original_file_name','$file_size' , '$file_ext','$hash')";
                
        move_uploaded_file($file_tmp, UPLOAD . "Images/" . $hash);
                // exec query
        $query = $this->db->query($sql);
        
                if ($query->num_rows>0) {
                  $response=array(
                    'status'=>true,
                    'Id'=>$hash,
                    'status_code'=>201
                  );
                return $response;
                } else {
                    $errors=array(
                        'error'=>$errors,
                        'status_code'=>'400'
                    );
                         return $errors;
                
                }
      
    } else {
       print_r($errors);
    }
}

    
}
