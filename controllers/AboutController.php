<?php

class AboutController extends Controller
{
    public function index(): void
    {
        $this->view('about', ['helloFromController'=>"About"]);
    }
}