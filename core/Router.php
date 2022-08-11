<?php

namespace Core;

class Router
{
    private static array $routes = [];

    public static function register(string $uri, array | string $controller): void
    {
        self::$routes = array_merge(self::$routes, [$uri => $controller]);
    }

    public static function get(): array
    {
        return self::$routes;
    }
}