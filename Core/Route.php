<?php 

class Route
{
    private $validRoutes = array();  

    private $functions = array();

    private $controller = '';

    private $method = '';

    private $params = [];

    
    public function add($route, $something)
    {
        $parsedRoute = $this->parsedRoute($route);

        $this->validRoutes[] = $parsedRoute;

        var_dump(is_callable($function));

        $this->functions[] = $function;
    }

    private function parseUrl()
    {
        return explode('/', $_GET['url']);
    }

    private function parsedRoute($route)
    {
        return explode('/', $route);
    }

    public function run(){
        $parsedUrl = $this->parseUrl();

        // var_dump(gettype($this->validRoutes), $parsedRoute);

        foreach ($this->validRoutes as $key => $value){
            // var_dump($key);
            if ($value[0] == $parsedUrl[0] && $value[1] == $parsedUrl[1] && count($value) == count($parsedUrl)){
                
                IDontKnowHowToNameThisMethodYet($this->functions[$key]);
                
                exit();
            }
        }

        print_r("page not found!");
    }

    private function IDontKnowHowToNameThisMethodYet($function)
    {
        if (checkIfCallable($function)){
            $function->__invoke();
        }
        else {
            // explode @ 
            // set 0 to controller
            // set 1 to action
            // set the needed params somehow 
            // call user func array controller action params
            // profit
        }

    }


    private function checkIfCallable($function)
    {
        return is_callable($function);
    }

}
?>