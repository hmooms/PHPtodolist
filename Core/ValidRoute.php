<?php

Class ValidRoute
{
    private $route;
    private $function;
    private $method;
    private $paramKeyNames;

    public function __construct($route, $function, $method)
    {
        $this->route = $route;
        $this->function = $function;
        $this->method = $method;
        $this->setParamKeyNames($route);
    }

    public static function validateRoute($route)
    {
        // regular expresion ~
    }

    private function setParamKeyNames($route)
    {
        // ^\{.+\}$ the regex
        $matches = preg_grep('/^\{.+\}$/', $route);
        
        // remove "{ }"
        
        // return matches
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