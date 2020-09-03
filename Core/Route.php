<?php 

class Route
{
    private $validRoutes = array();  

    private $functions = array();

    private $controller = '';

    private $method = '';

    private $params = [];

    
    public function add($route, $function)
    {
        $parsedRoute = $this->parsedRoute($route);

        $this->validRoutes[] = $parsedRoute;

        // var_dump(is_callable($function));

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

    public function run()
    {
        $parsedUrl = $this->parseUrl();

        $params = $this->parseUrl();
        unset($params[0], $params[1]);
        $this->params = array_values($params);

        // var_dump(gettype($this->validRoutes), $parsedRoute);

        foreach ($this->validRoutes as $key => $value)
        {
            // var_dump($key);
            if ($value[0] == $parsedUrl[0] && $value[1] == $parsedUrl[1] && count($value) == count($parsedUrl))
            {
                $this->IDontKnowHowToNameThisMethodYet($this->functions[$key]);
                
                exit();
            }
        }

        pageNotFound();
        
    }

    // im so good at naming things
    private function IDontKnowHowToNameThisMethodYet($function)
    {
        if (is_callable($function))
        {
            $function->__invoke();
        }
        else 
        {
            // explode @
            $explodedFunction = explode('@', $function); 

            var_dump($explodedFunction);

            // set 0 to controller
            $this->controller = $explodedFunction[0];

            // testing
            echo $this->controller . ' / ';

            // set 1 to action
            $this->action = $explodedFunction[1];

            // testing
            echo $this->action . ' / ';

            var_dump($this->params);
            // call user func array controller action params
            if (file_exists(ROOT .'Controllers/' . $this->controller . '.php'))
            {
                echo '1 / ';
                require_once(ROOT . 'Controllers/' . $this->controller . '.php');

                if (method_exists($this->controller, $this->action))
                {
                    echo '3 / ';

                    if ($this->params)
                    {
                        echo '5 / ';

                        call_user_func(array($this->controller, $this->action), $this->params);
                    }
                    else
                    {
                        echo '6 / ';

                        call_user_func(array($this->controller, $this->action));
                    }
                }
                else 
                {
                    echo '4 / ';
                }
            }
            else 
            {
                echo '2';
            }
            // profit?
        }

    }


    private function checkIfCallable($function)
    {
        return is_callable($function);
    }


    private function pageNotFound()
    {
        echo "This page is not found!";
    }
}
?>