<?php

class HomeController extends Controller
{
    public function index(): void
    {
        $this->view('home', ['helloFromController'=>"Hello World"]);
    }
}