<?php

namespace Controllers;

use Models\Product;

class HomeController extends \Controller
{
    public function __invoke(): void
    {
        $this->view('home');
    }
}