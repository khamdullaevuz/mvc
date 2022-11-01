<?php

class Request
{
    public static function getRequestUrl(): string
    {
        return explode("?", filter_var(trim($_SERVER['REQUEST_URI'], "/"), FILTER_SANITIZE_URL))[0];
    }

    public static function getRequestMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function getFullUrl(): string
    {
        return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    }

    public static function getParams(): array
    {
        $url = self::getFullUrl();
        $components = parse_url($url, PHP_URL_QUERY);
        parse_str($components ?? '', $results);
        return $results;
    }

    public static function sendRequest(string $url, array $data = [], string $customRequest = 'get'): string|bool
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $customRequest);
        $result = curl_exec($ch);
        if(curl_error($ch)){
            var_dump(curl_error($ch));
            exit;
        }
        return $result;
    }

    public static function getPost(): array
    {
        return $_POST;
    }

    public static function getFormData(): array
    {
        unset($_POST['_method']);
        return $_POST;
    }
}
