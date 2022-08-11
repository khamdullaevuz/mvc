<?php

namespace Controllers;

use Core\Controller;

class HomeController extends Controller
{
    public function index(): void
    {
        $this->view('home', ['helloFromController'=>"Hello World"]);
    }
}