<?php

namespace Controllers;

use Core\Controller;

class HomeController extends Controller
{
    public function __invoke(): void
    {
        $values = ['helloFromController'=>"Hello World"];
        $this->view('home', compact('values'));
    }
}