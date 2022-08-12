<?php

namespace Controllers;

use Models\Users;

class HomeController extends \Controller
{
    public function __invoke(): void
    {
        $user = new Users();
        $users = $user->selectOne('id', 1);
        $this->view('home', compact('users'));
    }
}