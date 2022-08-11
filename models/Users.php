<?php

namespace Models;
use Core\Model;

class Users extends Model
{
    protected string $table = 'users';

    public function getUsers(): array
    {
        return $this->selectAll();
    }
}