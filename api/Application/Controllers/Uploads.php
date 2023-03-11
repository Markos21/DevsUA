<?php 

use MVC\Controller;

class ControllersUploads extends Controller {

    public function index() {

        // Connect to database
        $model = $this->model('uploads');

        // Read All Uploads Data
        $data_list = $model->getAllData();

        // Send Response
        $this->response->sendStatus(200);
        $this->response->setContent($data_list);
    }
    
    public function uploadImage() {
         if(isset($this->request->files['image'])){
            // Connect to database
        $model = $this->model('uploads');
        $response = $model->storeImage($this->request->files['image']);
        
        $this->response->setContent($response);
        }
        else {
            $response=array(
                'staus'=>false,
                'message'=>"File is Required Missing Image File",
                'status_code'=>400
            );
            
            $this->response->setContent($response);
        }
    }

    public function store() {
         $data= $this->request->input();
   
        // Send Response
        $this->response->sendStatus(200);
        $this->response->setContent($data);
    }

    
}
