<?php

namespace Core;

use PDO;
use PDOException;

class Connection
{
    protected PDO $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO(
                'mysql:host=' . HOSTNAME . ';dbname=' . DBNAME,
                USERNAME,
                PASSWORD,
                OPTIONS
            );
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}