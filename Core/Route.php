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
            echo "You are an idiot and didn't make a valid route. To be honest im not even mad, just dissapointed.";
        } 
        */

        $validRoute = new validRoute($this->parsedRoute($route), $function, $method);
        
        $this->validRoutes[] = $validRoute;
    }


    public function run()
    {
        $parsedUrl = $this->parseUrl();

        $usedMethod = $_SERVER['REQUEST_METHOD']; // this should return either GET or POST.

        
        if ($usedMethod === 'POST') 
        {
            // get the params from post and put them in params
            $this->params = $_POST; // i think?
        }
        else
        {
            // get the paramaters from the url and put them in the params property 
            $params = $this->parseUrl();
            unset($params[0], $params[1]);
            $this->params = array_values($params);
        }

        // check if the url is a valid url 
        foreach ($this->validRoutes as $key => $value)
        {
            if ($value->getRoute()[0] == $parsedUrl[0] && $value->getRoute()[1] == $parsedUrl[1] && count($value->getRoute()) == count($parsedUrl))
            {
                if ($usedMethod === $value->getMethod())
                {
                    $this->execute($value->getFunction());
                    
                    exit();
                }
                else 
                {
                    echo "You used the wrong request method.. *sigh* You are an idiot. If you are an user please don't try to play the system, you'd lose :p";
                }
            }
        }

        // testing
        var_dump($usedMethod, $this->params);

        // in case that it isnt a valid url
        $this->pageNotFound();
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

            // set 0, which is the class name, to controller 
            $this->controller = $explodedFunction[0] . 'Controller';

            // testing
            echo $this->controller . ' / ';

            // set 1, which is the method name, to action
            $this->action = $explodedFunction[1];

            // testing
            echo $this->action . ' / ';

            var_dump($this->params);

            // check if the controller exists
            if (file_exists(ROOT .'Controllers/' . $this->controller . '.php'))
            {
                // check if the method exists
                if (method_exists($this->controller, $this->action))
                {
                    // check if there are params
                    if ($this->params)
                    {
                        // testing
                        echo '1 / ';

                        // execute the method with the params
                        call_user_func(array($this->controller, $this->action), $this->params);
                    }
                    else
                    {
                        // testing
                        echo '2 / ';

                        // execute the method without params
                        call_user_func(array($this->controller, $this->action));
                    }
                }
                else 
                {
                    // in case the method couldnt be found
                    echo 'The method doesnt exist or couldnt be found. Are you stupid?';
                }
            }
            else 
            {
                // in case the controller couldnt be found
                echo 'The controller doesnt exist or couldnt be found. You probably made a mistake *sigh*';
            }
            // profit?
        }

    }


    private function pageNotFound()
    {
        echo "We are terribly sorry for the inconvenience, but the page you were looking for was not found. Probably one of our IDIOTIC programmers made a mistake.";
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