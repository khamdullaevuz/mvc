<?php

abstract class Controller
{
    public function view(string $view, array $options = []): void
    {
        extract($options);
        require __DIR__ . '/../views/' . $view . '.view.php';
    }

    public function redirect(string $url, array $options = []): void
    {
        if($options) {
            $query = '?' . http_build_query($options);
            header('location: ' . $url . $query);
            exit;
        }

        header('location: ' . $url);
        exit;
    }
}