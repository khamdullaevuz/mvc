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

    public function selectAll(array $where): array
    {
        $query = "SELECT * FROM {$this->table} WHERE {where}";
        $query = $this->generateParam($where, $query);
        $statement = parent::$pdo->prepare($query);

        $statement->execute($where);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectOne(array $where): array
    {
        $query = "SELECT * FROM {$this->table} WHERE {where}";
        $query = $this->generateParam($where, $query);
        $statement = parent::$pdo->prepare($query);

        $statement->execute($where);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function add(array $values)
    {
        if (!array_key_exists('created_at', $values))
            $values['created_at'] = date('Y-m-d H:i:s');
        if (!array_key_exists('updated_at', $values))
            $values['updated_at'] = date('Y-m-d H:i:s');
        $query = "INSERT INTO {$this->table} ({keys}) VALUES ({values})";
        $query = $this->generateKey($values, $query);
        parent::$pdo->prepare($query)->execute($values);
        return parent::$pdo->lastInsertId();
    }

    public function update(array $values, array $where): void
    {
        if (!array_key_exists('updated_at', $values))
            $values['updated_at'] = date('Y-m-d H:i:s');
        $query = "UPDATE {$this->table} SET {keys} WHERE {where}";
        $query = $this->generateForKeyUpdate($values, $query);
        $query = $this->generateParam($where, $query);
        $data = array_merge($values, $where);
        parent::$pdo->prepare($query)->execute($data);
    }

    public function delete(array $where): void
    {
        $query = "DELETE FROM {$this->table} WHERE {where}";
        $query = $this->generateParam($where, $query);
        parent::$pdo->prepare($query)->execute($where);
    }

    /**
     * @param array $data
     * @param string $query
     * @return string
     */
    private function generateParam(array $data, string $query): string
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

        return str_replace('{where}', $values, $query);
    }

    /**
     * @param array $data
     * @param string $query
     * @return string
     */
    public function generateKey(array $data, string $query): string
    {
        $keys = "";
        $values = "";
        foreach (array_keys($data) as $key) {
            $keys .= $key . ',';
            $values .= ':' . $key . ',';
        }
        $keys = mb_substr($keys, 0, -1);
        $values = mb_substr($values, 0, -1);
        return str_replace(["{keys}", "{values}"], [$keys, $values], $query);
    }

    /**
     * @param array $data
     * @param string $query
     * @return string
     */
    public function generateForKeyUpdate(array $data, string $query): string
    {
        $keys = "";
        foreach (array_keys($data) as $key) {
            $keys .= $key . ' = ' . ':' . $key . ',';
        }
        $keys = mb_substr($keys, 0, -1);
        return str_replace("{keys}", $keys, $query);
    }
}
