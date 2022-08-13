<?php

namespace Controllers;

class LoginController
{
    public function __invoke($id, $email): void
    {
        echo $id.PHP_EOL.$email;
    }
}