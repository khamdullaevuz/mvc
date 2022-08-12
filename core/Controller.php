<?php

class Controller
{
    public function view(string $view, array $options): void
    {
        extract($options);
        require '../views/'.$view.'.view.php';
    }
}