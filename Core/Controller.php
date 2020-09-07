<?php

class Controller
{
    protected function view($view, $data)
    {
        require_once("./Views/".$view.".php");
        // $data?
    }

}

?>