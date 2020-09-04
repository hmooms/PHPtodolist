<?php

class Controller
{
    protected function view($view){
        require_once("./Views/".$view.".php");
    }
}

?>