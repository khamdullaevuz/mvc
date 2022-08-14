<?php

namespace Controllers;

class AboutController extends \Controller
{
    public function about(): void
    {
        $this->view('about');
    }
}