<?php

// paths
$router->get('/', function() {
    echo '<div style="text-align: center;width: 350px;margin: 50px auto;font-size: 25px;padding: 50px;box-shadow: 0 0 10px #dedede;border-radius: 5px;">
        Welcome To DevsUA Mini RestApi <br><br>
        <a href="#" title=""> See API Documentation </a>
    </div>';
});

// Get All Uploads 
$router->get('/all', 'Uploads@index');

// uploads router
$router->post('/imageupload', 'Uploads@uploadImage');


