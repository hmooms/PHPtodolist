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
        // find the key names (which have to be made with {} )
        $matches = preg_grep('/^\{.+\}$/', $route);

        // reset keys
        $matches = array_values($matches);
        
        // remove "{ }"
        $keyNames = preg_replace('/[^a-zA-Z0-9\-\_\s]/', '', $matches);


        // return the keyNames
        $this->paramKeyNames = $keyNames;
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

    public function getParamKeyNames()
    {
        return $this->paramKeyNames;
    }
}