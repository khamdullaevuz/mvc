<?php

class App{
    private bool $debug = false;

    function run(): void
    {
        $routes = Router::routeAll();
        $request = Request::getRequestUri();
        if(array_key_exists($request, $routes)){
            $route = $routes[$request];
            if($route['type'] == Request::getRequestMethod()) {
                $route = $route['controller'];
                Http::responseCode(200);
                if (is_array($route)) {
                    $controllerName = $route[0];
                    $function = $route[1];
                    $controller = new $controllerName();
                    call_user_func([$controller, $function], Request::getParams());
                } else {
                    $controllerName = $route;
                    $controller = new $controllerName();
                    call_user_func([$controller, '__invoke'], Request::getParams());
                }
            }else{
                Http::responseCode(405);
                $error = '405 method not allowed';
                require '../views/error.view.php';
            }
        }else{
            Http::responseCode(404);
            $error = '404 not found';
            require '../views/error.view.php';
        }
        if($this->debug){
            ini_set('display_errors', 1);
        }else{
            ini_set('display_errors', 0);
        }
    }

    public function debug(bool $action): void
    {
        if($action){
            $this->debug = true;
        }else{
            $this->debug = false;
        }
    }

    public function error_reporting(): void
    {
        if($this->debug) {
            error_reporting(E_ALL);
        }
    }
}