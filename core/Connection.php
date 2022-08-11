<?php

namespace Core;

use \PDO;
use \PDOException;

class Connection
{
    protected static PDO $pdo;

    function __construct()
    {
        if(empty(self::$pdo)){
            self::connect();
        }
    }

    public static function connect(): void
    {
        try {
            self::$pdo = new PDO(
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