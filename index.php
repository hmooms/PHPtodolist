<?php 

spl_autoload_register(function($className){

    // var_dump($className);

    if(file_exists('./'.$className.'.php')){
        require_once './'.$className.'.php';
    }
});

require_once('config.php');
require_once('Routes.php');


?>