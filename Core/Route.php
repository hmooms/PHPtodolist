<?php 

class Route
{
    private $validRoutes = array();  

    private $functions = array();

    private $controller = '';

    private $method = '';

    private $params = array();

    
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

        // get the paramaters from the url and put them as a array in the params property 
        $params = $this->parseUrl();
        unset($params[0], $params[1]);
        $this->params = array_values($params);

        // check if the url is a valid url 
        foreach ($this->validRoutes as $key => $value)
        {
            if ($value[0] == $parsedUrl[0] && $value[1] == $parsedUrl[1] && count($value) == count($parsedUrl))
            {
                $this->execute($this->functions[$key]);
                
                exit();
            }
        }

        // in case that it isnt a valid url
        pageNotFound();
        
    }

    // execute the function or method
    private function execute($function)
    {
        if (is_callable($function))
        {
            $function->__invoke();
        }
        else 
        {
            // explode @
            $explodedFunction = explode('@', $function); 

            // testing
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

            // check if the controller exists
            if (file_exists(ROOT .'Controllers/' . $this->controller . '.php'))
            {
                // testing
                echo '1 / ';

                // check if the method exists
                if (method_exists($this->controller, $this->action))
                {
                    // testing
                    echo '3 / ';

                    // check if there are params
                    if ($this->params)
                    {
                        // testing
                        echo '5 / ';

                        // execute the method with the params
                        call_user_func(array($this->controller, $this->action), $this->params);
                    }
                    else
                    {
                        // testing
                        echo '6 / ';

                        // execute the method without params
                        call_user_func(array($this->controller, $this->action));
                    }
                }
                else 
                {
                    // testing
                    echo '4 / ';
                }
            }
            else 
            {
                // testing
                echo '2';
            }
            // profit?
        }

    }


    private function pageNotFound()
    {
        echo "This page is not found!";
    }
}
?>