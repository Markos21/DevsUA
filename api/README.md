


# File UPLOAD Rest API

This project is for upload Image with rest API in PHP.

## Setup

### Step 1 - Clone or Download

```
git clone https://github.com/Markos21/DevsUA

```

### Step 2 - Change Config File

Please open config.php file and find this code section.
```PHP
  // Config Database
define('DATABASE', [
    'Port'   => '3306',
    'Host'   => 'localhost',
    'Driver' => 'PDO',
    'Name'   => '',
    'User'   => '',
    'Pass'   => '',
    'Prefix' => ''
]);

// DB_PREFIX
define('DB_PREFIX', '');
```
update it with your database credentials. you can choose a prefix and the prefix is optional.

#### Example
 My config.php file is like this

```PHP
  // Config Database
define('DATABASE', [
    'Port'   => '3306',
    'Host'   => 'localhost',
    'Driver' => 'PDO',
    'Name'   => 'devsua_db',
    'User'   => 'root',
    'Pass'   => '',
    'Prefix' => 'l_'
]);

// DB_PREFIX
define('DB_PREFIX', 'l_');
```

## Usage

You can see all the files with bellow EndPoint
```
yourdomain.com/api/all

End Point for post request(Image Upload)
yourdomain.com/api/imageupload
```

```

