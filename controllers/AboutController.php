<?php

namespace Controllers;

use Core\Controller;
use Core\Debug;
use Core\Request;

class AboutController extends Controller
{
    public function about(): void
    {
        $this->view('about', ['helloFromController'=>"About"]);
    }
}