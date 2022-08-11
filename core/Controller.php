<?php

class Controller
{
    public function view(string $view, array $options): void
    {
        foreach($options as $key => $option){
            $$key = $option;
        }
        require '../views/'.$view.'.view.php';
    }
}