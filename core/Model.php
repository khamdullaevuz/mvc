<?php

namespace Core;
use \PDO;

class Model extends Connection
{
    protected string $table;

    public function selectAll(): array
    {
        $statement = parent::$pdo->prepare("select * from {$this->table}");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }
}