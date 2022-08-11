<?php

namespace Core;

class App{
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
}