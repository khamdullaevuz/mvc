<?php

namespace Controllers;

use Core\Controller;
use Models\Users;

class HomeController extends Controller
{
    public function __invoke(): void
    {
        $user = new Users();
        $users = $user->getUsers();
        $this->view('home', compact('users'));
    }
}