<?php

class Controller
{
    public static function view($view){
        require_once("./Views/".$view.".php");
    }
}

?>