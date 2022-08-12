<?php

class Http
{
    public static function responseCode(int $code): void
    {
        http_response_code($code);
    }

    public static function getResponseCode(): int
    {
        return http_response_code();
    }
}