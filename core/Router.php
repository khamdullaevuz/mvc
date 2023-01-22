<?php

final class Router
{
    private static array $routes = [];

    public static function get(string $uri, $controller): void
    {
        self::$routes = array_merge(self::$routes, [$uri => ['controller'=>$controller, 'type'=>'GET']]);
    }

    public static function post(string $uri, $controller): void
    {
        self::$routes = array_merge(self::$routes, [$uri => ['controller'=>$controller, 'type'=>'POST']]);
    }

    public static function put(string $uri, $controller): void
    {
        self::$routes = array_merge(self::$routes, [$uri => ['controller'=>$controller, 'type'=>'PUT']]);
    }

    public static function patch(string $uri, $controller): void
    {
        self::$routes = array_merge(self::$routes, [$uri => ['controller'=>$controller, 'type'=>'PATCH']]);
    }

    public static function delete(string $uri, $controller): void
    {
        self::$routes = array_merge(self::$routes, [$uri => ['controller'=>$controller, 'type'=>'DELETE']]);
    }

    public static function routeAll(): array
    {
        return self::$routes;
    }

    public static function currentRoute(string $route): bool
    {
        return explode('/', Request::getRequestUrl())[0] == $route;
    }
}