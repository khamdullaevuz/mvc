<?php

class App{
    private bool $debug = false;

    function run(): void
    {
        $routes = Router::routeAll();
        $request = Request::getRequestUrl();
        if(array_key_exists($request, $routes)){
            $route = $routes[$request];
            if($route['type'] == Request::getRequestMethod() or (isset(Request::getPost()['_method']) and $route['type'] == Request::getPost()['_method'] and Request::getRequestMethod() == "POST")) {
                $route = $route['controller'];
                try {
                    if (is_array($route)) {
                        $controllerName = $route[0];
                        $function = $route[1];
                        $controller = new $controllerName();
                        call_user_func_array([$controller, $function], Request::getParams());
                    } else {
                        $controllerName = $route;
                        $controller = new $controllerName();
                        call_user_func_array($controller, Request::getParams());
                    }
                    Http::responseCode(200);
                } catch (Error $e){
                    if(mb_stripos($e->getMessage(),'Too few arguments to function') !== false){
                        $error = 'Missing required parameters';
                        require __DIR__ . '/../views/error.view.php';
                        Http::responseCode(422);
                    }
                }
            }else{
                $error = '405 method not allowed';
                require __DIR__ . '/../views/error.view.php';
                Http::responseCode(405);
            }
        }else{
            $error = '404 not found';
            require __DIR__ . '/../views/error.view.php';
            Http::responseCode(404);
        }
        if($this->debug){
            ini_set('display_errors', 1);
        }else{
            ini_set('display_errors', 0);
        }
    }

    public function debug(bool $action): void
    {
        $this->debug = $action;
    }

    public function error_reporting(): void
    {
        if($this->debug) {
            error_reporting(E_ALL);
        }
    }
}