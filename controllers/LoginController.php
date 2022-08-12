<?php

namespace Controllers;

class LoginController
{
    public function __invoke($data): void
    {
        \Debug::dumpData($data);
    }
}