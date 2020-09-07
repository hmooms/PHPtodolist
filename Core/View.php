<?php

class View
{
    private $data = array();

    public function __construct($view, $data)
    {
        $this->data = $data;
    }

}