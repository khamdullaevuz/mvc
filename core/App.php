<?php

namespace Core;

class App{
    function run(): void
    {
        $routes = Router::get();
        $request = trim($_SERVER['REQUEST_URI'], "/");
        if(array_key_exists($request, $routes)){
            $route = $routes[$request];
            $controllerName = $route[0];
            $function = $route[1];
            require '../'.$controllerName.'.php';
            $controller = new $controllerName();
            $controller->$function();
        }else{
            $error = '404 not found';
            require '../views/error.view.php';
        }
    }
}