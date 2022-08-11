<?php

namespace Core;

class Http
{
    public static function responseCode(int $code): void
    {
        http_response_code($code);
    }
}