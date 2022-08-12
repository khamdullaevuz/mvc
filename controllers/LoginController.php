<?php

namespace Controllers;

use Core\Debug;
use Core\Request;

class LoginController
{
    public function __invoke($data): void
    {
        Debug::dumpData($data);
    }
}