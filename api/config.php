<?php

/**
 *  Config File For Handel Route, Database And Request
 * 
 *  
 *  
 */

// Http Default Url
$scriptName = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
define('HTTP_URL', '/'. substr_replace(trim($_SERVER['REQUEST_URI'], '/'), '', 0, strlen($scriptName)));

// Define Path Application
define('SCRIPT', str_replace('\\', '/', rtrim(__DIR__, '/')) . '/');
define('CORE', SCRIPT . 'Core/');
define('UPLOAD', SCRIPT . 'Upload/');
define('CONTROLLERS', SCRIPT . 'Application/Controllers/');
define('MODELS', SCRIPT . 'Application/Models/');

// Config Database
define('DATABASE', [
    'Port'   => '3306',
    'Host'   => 'localhost',
    'Driver' => 'PDO',
    'Name'   => 'devsua_db',
    'User'   => 'root',
    'Pass'   => '',
    'Prefix' => ''
]);

// DB_PREFIX
define('DB_PREFIX', '');


