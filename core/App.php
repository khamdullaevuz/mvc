<?php

namespace Core;

class App{
    private bool $debug = false;

    function run(): void
    {
        $routes = Router::get();
        $request = Request::get();
        if(array_key_exists($request, $routes)){
            $route = $routes[$request];
            if(is_array($route)) {
                $controllerName = $route[0];
                $function = $route[1];
                $controller = new $controllerName();
                $controller->$function();
            } else {
                $controllerName = $route;
                $controller = new $controllerName();
                $controller->__invoke();
            }
        }else{
            $error = '404 not found';
            require '../views/error.view.php';
        }
    }

    public function debug(bool $action): void
    {
        if($action){
            $this->debug = true;
            ini_set('display_errors', 1);
        }else{
            $this->debug = false;
            ini_set('display_errors', 0);
        }
    }

    public function error_reporting(): void
    {
        if($this->debug) {
            error_reporting(E_ALL);
        }
    }
}