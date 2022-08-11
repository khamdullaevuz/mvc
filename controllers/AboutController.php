<?php

namespace Controllers;

use Core\Controller;

class AboutController extends Controller
{
    public function index(): void
    {
        $this->view('about', ['helloFromController'=>"About"]);
    }
}