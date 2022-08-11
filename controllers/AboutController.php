<?php

namespace Controllers;

use Core\Controller;

class AboutController extends Controller
{
    public function about(): void
    {
        $this->view('about', ['helloFromController'=>"About"]);
    }
}