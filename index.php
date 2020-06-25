<?php 

spl_autoload_register(function($className){

    if(file_exists('./Core/'.$className.'.php')){
        require_once './Core/'.$className.'.php';
    }
    else if(file_exists('./Controllers/'.$className.'.php')){
        require_once './Controllers/'.$className.'.php';
    }
});

require_once('Routes.php');


?>