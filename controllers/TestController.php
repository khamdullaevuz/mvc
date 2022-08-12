<?php

namespace Controllers;

class TestController
{
    public function __invoke(): void
    {
        echo "Post method";
    }
}