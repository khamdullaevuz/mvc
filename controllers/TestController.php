<?php

namespace Controllers;

use Core\Debug;

class TestController
{
    public function __invoke(): void
    {
        echo "Post method";
    }
}