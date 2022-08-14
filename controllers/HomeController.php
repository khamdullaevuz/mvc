<?php

namespace Controllers;

use Controller;

class HomeController extends Controller
{
    public function __invoke(): void
    {
        $this->view('home');
    }
}