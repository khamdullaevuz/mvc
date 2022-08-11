<?php

namespace Core;

class Request
{
    public static function get(): string
    {
        return trim($_SERVER['REQUEST_URI'], "/");
    }

    public static function getRequestMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}