<?php

namespace Core;

class Router
{
    protected static array $routes = [];

    public static function register(string $url, array $controller): void
    {
        self::$routes = array_merge(self::$routes, [$url => $controller]);
    }

    public static function get(): array
    {
        return self::$routes;
    }
}