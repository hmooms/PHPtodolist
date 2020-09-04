<?php

Class ValidRoute
{
    private $route;
    private $function;
    private $method;

    public function __construct($route, $function, $method)
    {
        $this->route = $route;
        $this->function = $function;
        $this->method = $method;
    }

    public static function validateRoute($route)
    {
        // regular expresion ~
    }

    public function getRoute()
    {
        return $this->route;
    }

    public function getFunction()
    {
        return $this->function;
    }

    public function getMethod()
    {
        return $this->method;
    }
}