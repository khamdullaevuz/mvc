<?php

namespace Controllers;

use Core\Debug;

class LoginController
{
    public function __invoke($data): void
    {
        Debug::dumpData($data);
    }
}