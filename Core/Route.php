<?php 

class Route
{
    private $validRoutes = array();

    private $controller = '';

    private $method = '';

    private $params = array();

    
    public function add($route, $function, $method = 'GET')
    {

        /* its the validation that has yet to be made  
        if (validRoute::validateRoute($route)) 
        {
            $validRoute = new validRoute($this->parsedRoute($route), $function, $method);
        }
        else 
        {
            echo "The Route: " . $route . "you made is not valid.";
        } 
        */

        $validRoute = new validRoute($this->parsedRoute($route), $function, $method);
        
        $this->validRoutes[] = $validRoute;
    }


    public function run()
    {
        $parsedUrl = $this->parseUrl();

        $usedMethod = $_SERVER['REQUEST_METHOD']; // this should return either GET or POST.

        // check if the url is a valid url 
        foreach ($this->validRoutes as $key => $value)
        {
            if ($value->getRoute()[0] == $parsedUrl[0] && $value->getRoute()[1] == $parsedUrl[1] && count($value->getRoute()) == count($parsedUrl))
            {
                if ($usedMethod === $value->getMethod())
                {
                    $this->execute($value->getFunction(), $value->getParamKeyNames(), $usedMethod);
                    
                    exit();
                }
                else 
                {
                    echo "You used the wrong request method.";
                }
            }
        }

        // in case that it isnt a valid url
        $this->pageNotFound();
    }
    

    // execute the function or method
    private function execute($function, $keyNames, $usedMethod)
    {
        if (is_callable($function))
        {
            $function->__invoke();
        }
        else 
        {
            // set the controller and the action
            $this->setControllerAndAction($function);
            
            // set the parameters
            $this->setParameters($usedMethod, $keyNames);

            // check if the controller exists
            if (file_exists(ROOT .'Controllers/' . $this->controller . '.php'))
            {
                // check if the method exists
                if (method_exists($this->controller, $this->action))
                {
                    // check if there are params
                    if ($this->params)
                    {
                        // execute the method with the params
                        call_user_func(array($this->controller, $this->action), $this->params);
                    }
                    else
                    {
                        // execute the method without params
                        call_user_func(array($this->controller, $this->action));
                    }
                }
                else 
                {
                    // in case the method couldnt be found
                    echo 'The method doesnt exist or couldnt be found.';
                }
            }
            else 
            {
                // in case the controller couldnt be found
                echo 'The controller doesnt exist or couldnt be found.';
            }
            // profit?
        }

    }


    private function setControllerAndAction($function)
    {
         // explode @
         $explodedFunction = explode('@', $function); 

         // set 0, which is the class name, to controller 
         $this->controller = $explodedFunction[0] . 'Controller';

         // set 1, which is the method name, to action
         $this->action = $explodedFunction[1];
    }


    private function setParameters($usedMethod, $keyNames)
    {
        if ($usedMethod === 'POST') 
        {
            // get the params from post and put them in params
            $this->params = $_POST; // i think?
        }
        else
        {
            // get the paramaters from the url and put them in the params property 
            $params = $this->parseUrl();

            // remove the controller and method
            unset($params[0], $params[1]);

            // reset the keys
            $params = array_values($params);

            // set the key names and values
            foreach ($params as $key => $value)
            {
                $this->params[$keyNames[$key]] = $value;
            }
        }
    }


    private function pageNotFound()
    {
        echo "The page you were looking for was not found.";
    }


    private function parseUrl()
    {
        return explode('/', $_GET['url']);
    }


    private function parsedRoute($route)
    {
        return explode('/', $route);
    }
}
?>