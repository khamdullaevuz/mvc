<?php

namespace Controllers;

class TestController extends \Controller
{
    public function __invoke(): void
    {
        echo "Post method";
    }
}