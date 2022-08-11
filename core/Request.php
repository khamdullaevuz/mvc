<?php

namespace Core;

class Request
{
    public static function get(): string
    {
        return trim($_SERVER['REQUEST_URI'], "/");
    }
}