<?php 

class Route
{
    private static $routes = array();  

    public static function add($route, $function)
    {
        self::$routes[] = $route;
       
        
        $url = explode('/', $_GET['url']);

    
        if($_GET['url'] == $route) {
            $function->__invoke();
        }
    }
}

?>