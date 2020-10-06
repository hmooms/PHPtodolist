<?php

namespace Core;

class Controller
{
    protected function view($view, $data = null)
    {
        require_once("./Views/". $view .".php");
    }

    protected function redirect($data = null)
    {
        header('Location: /' . APP_NAME . $data);
    }

}

?>