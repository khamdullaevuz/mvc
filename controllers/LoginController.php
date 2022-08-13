<?php

namespace Controllers;

class LoginController extends \Controller
{
    public function __invoke($id, $email): void
    {
        echo $id.PHP_EOL.$email;
    }
}