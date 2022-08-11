<?php

namespace Controllers;

use Core\Controller;

class HomeController extends Controller
{
    public function __invoke(): void
    {
        $this->view('home', ['helloFromController'=>"Hello World"]);
    }
}