<?php

use Config\Core as Config;

abstract class Connection
{
    protected static PDO $pdo;

    function __construct()
    {
        if (empty(self::$pdo)) {
            self::connect();
        }
    }

    public static function connect(): void
    {
        try {
            self::$pdo = new PDO(
                'mysql:host=' . Config::HOSTNAME . ';dbname=' . Config::DBNAME,
                Config::USERNAME,
                Config::PASSWORD,
                Config::OPTIONS
            );
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
