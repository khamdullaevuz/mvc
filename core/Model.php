<?php

namespace Core;
use PDO;

class Model extends Connection
{
    protected string $table;

    public function selectAllData(): array
    {
        $statement = parent::$pdo->prepare("select * from {$this->table}");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectAll(string $keyword, string $value): array
    {
        $statement = parent::$pdo->prepare("select * from {$this->table} WHERE {$keyword} = :value");

        $statement->execute([':value'=>$value]);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectOne(string $keyword, string $value): array
    {
        $statement = parent::$pdo->prepare("select * from {$this->table} WHERE {$keyword} = :value");

        $statement->execute([':value'=>$value]);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}