<?php

abstract class Model extends Connection
{
    protected string $table;

    public function selectAllData(): array
    {
        $statement = parent::$pdo->prepare("SELECT * FROM {$this->table}");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectAll(array $data): array
    {
        $query = "SELECT * FROM {$this->table} WHERE {values}";
        $query = $this->generateParam($data, $query);
        $statement = parent::$pdo->prepare($query);

        $statement->execute($data);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectOne(array $data): array
    {
        $query = "SELECT * FROM {$this->table} WHERE {values}";
        $query = $this->generateParam($data, $query);
        $statement = parent::$pdo->prepare($query);

        $statement->execute($data);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function add(array $data): void
    {
        $query = "INSERT INTO {$this->table} ({names}) VALUES ({values})";
        $names = "";
        $values = "";
        foreach(array_keys($data) as $key){
            $names .= $key.',';
            $values .= ':'.$key.',';
        }
        $names = mb_substr($names, 0, -1);
        $values = mb_substr($values, 0, -1);
        $query = str_replace(["{names}", "{values}"], [$names, $values], $query);
        parent::$pdo->prepare($query)->execute($data);
    }

    public function delete(array $data): void
    {
        $query = "DELETE FROM {$this->table} WHERE {values}";
        $query = $this->generateParam($data, $query);
        parent::$pdo->prepare($query)->execute($data);
    }

    /**
     * @param array $data
     * @param string $query
     * @return array|string|string[]
     */
    private function generateParam(array $data, string $query): string|array
    {
        $values = "";
        $i = 0;
        foreach (array_keys($data) as $key) {
            $i++;
            if ($i == 1) {
                $values .= $key . ' = :' . $key;
            } else {
                $values .= ' AND ' . $key . ' = :' . $key;
            }
        }

        return str_replace('{values}', $values, $query);
    }
}