<?php

namespace Controllers;

use Controller;

class AboutController extends Controller
{
    public function about(): void
    {
        $this->view('about');
    }
}