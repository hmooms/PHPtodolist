<?php

class Controller
{
    protected function view($view, $data = null)
    {
        require_once("./Views/".$view.".php");
    }

    protected function redirect($data)
    {
        header('Location: /phptodolist' . $data);
    }

}

?>