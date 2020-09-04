<?php

class Controller
{
    protected function view($view)
    {
        require_once("./Views/".$view.".php");
    }

    protected function with($request)
    {
        // make it possible to send data to the view so you can make forms.
    }
}

?>