<?php

namespace Core;

class Request
{
    public static function getRequestUriWithParams(): array
    {
        return explode('/', filter_var(trim($_SERVER['REQUEST_URI'], "/"), FILTER_SANITIZE_URL));
    }

    public static function getRequestUri(): string
    {
        return explode("?", filter_var(trim($_SERVER['REQUEST_URI'], "/"), FILTER_SANITIZE_URL))[0];
    }

    public static function getRequestMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function getFullUri(): string
    {
        return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }

    public static function getParams(): array
    {
        $url = self::getFullUri();
        $components = parse_url($url, PHP_URL_QUERY);
        parse_str($components, $results);
        return $results;
    }
}