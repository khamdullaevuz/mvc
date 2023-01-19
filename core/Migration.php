<?php

class Migration extends Connection
{
    public function create(string $table, array $columns): void
    {
        $sql = "CREATE TABLE IF NOT EXISTS $table (";
        foreach ($columns as $column => $type) {
            $sql .= "$column $type,";
        }
        $sql = substr($sql, 0, -1);
        $sql .= ")";
        static::$pdo->exec($sql);
    }

    public function add($table, array $values)
    {
        $query = "INSERT INTO {$table} ({keys}) VALUES ({values})";
        $query = $this->generateKey($values, $query);
        parent::$pdo->prepare($query)->execute($values);
        return parent::$pdo->lastInsertId();
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

    public function getBatch()
    {
        return static::$pdo->query("SELECT * FROM migrations")->rowCount() + 1;
    }

    public function migrationCount()
    {
        return static::$pdo->query("SELECT * FROM migrations")->rowCount();
    }

    public function checkMigrationExists($name)
    {
        return static::$pdo->query("SELECT * FROM migrations WHERE name = '$name'")->rowCount() == 0;
    }

    public function drop(string $table): void
    {
        $sql = "DROP TABLE IF EXISTS $table";
        static::$pdo->exec($sql);
    }

    public function truncate(string $table): void
    {
        $sql = "TRUNCATE TABLE $table";
        static::$pdo->exec($sql);
    }

    public function rename(string $table, string $newName): void
    {
        $sql = "RENAME TABLE $table TO $newName";
        static::$pdo->exec($sql);
    }

    public function addColumn(string $table, string $column, string $type): void
    {
        $sql = "ALTER TABLE $table ADD $column $type";
        static::$pdo->exec($sql);
    }

    public function dropColumn(string $table, string $column): void
    {
        $sql = "ALTER TABLE $table DROP COLUMN $column";
        static::$pdo->exec($sql);
    }

    public function renameColumn(string $table, string $column, string $newName): void
    {
        $sql = "ALTER TABLE $table CHANGE $column $newName";
        static::$pdo->exec($sql);
    }

    public function addForeignKey(string $table, string $column, string $refTable, string $refColumn): void
    {
        $sql = "ALTER TABLE $table ADD FOREIGN KEY ($column) REFERENCES $refTable($refColumn)";
        static::$pdo->exec($sql);
    }

    public function dropForeignKey(string $table, string $column): void
    {
        $sql = "ALTER TABLE $table DROP FOREIGN KEY $column";
        static::$pdo->exec($sql);
    }

    public function addPrimaryKey(string $table, string $column): void
    {
        $sql = "ALTER TABLE $table ADD PRIMARY KEY ($column)";
        static::$pdo->exec($sql);
    }

    public function dropPrimaryKey(string $table): void
    {
        $sql = "ALTER TABLE $table DROP PRIMARY KEY";
        static::$pdo->exec($sql);
    }

    public function addUniqueKey(string $table, string $column): void
    {
        $sql = "ALTER TABLE $table ADD UNIQUE ($column)";
        static::$pdo->exec($sql);
    }

    public function dropUniqueKey(string $table, string $column): void
    {
        $sql = "ALTER TABLE $table DROP INDEX $column";
        static::$pdo->exec($sql);
    }

    public function addIndex(string $table, string $column): void
    {
        $sql = "ALTER TABLE $table ADD INDEX ($column)";
        static::$pdo->exec($sql);
    }

    public function dropIndex(string $table, string $column): void
    {
        $sql = "ALTER TABLE $table DROP INDEX $column";
        static::$pdo->exec($sql);
    }

    public function addFullTextIndex(string $table, string $column): void
    {
        $sql = "ALTER TABLE $table ADD FULLTEXT ($column)";
        static::$pdo->exec($sql);
    }

    public function dropFullTextIndex(string $table, string $column): void
    {
        $sql = "ALTER TABLE $table DROP INDEX $column";
        static::$pdo->exec($sql);
    }

    public function addSpatialIndex(string $table, string $column): void
    {
        $sql = "ALTER TABLE $table ADD SPATIAL ($column)";
        static::$pdo->exec($sql);
    }

    public function dropSpatialIndex(string $table, string $column): void
    {
        $sql = "ALTER TABLE $table DROP INDEX $column";
        static::$pdo->exec($sql);
    }

    public function addCheckConstraint(string $table, string $column, string $constraint): void
    {
        $sql = "ALTER TABLE $table ADD CHECK ($column $constraint)";
        static::$pdo->exec($sql);
    }

    public function dropCheckConstraint(string $table, string $column): void
    {
        $sql = "ALTER TABLE $table DROP CHECK $column";
        static::$pdo->exec($sql);
    }

    public function addDefaultConstraint(string $table, string $column, string $constraint): void
    {
        $sql = "ALTER TABLE $table ALTER $column SET DEFAULT $constraint";
        static::$pdo->exec($sql);
    }

    public function dropDefaultConstraint(string $table, string $column): void
    {
        $sql = "ALTER TABLE $table ALTER $column DROP DEFAULT";
        static::$pdo->exec($sql);
    }

    public function addNotNullConstraint(string $table, string $column): void
    {
        $sql = "ALTER TABLE $table ALTER $column SET NOT NULL";
        static::$pdo->exec($sql);
    }

    public function dropNotNullConstraint(string $table, string $column): void
    {
        $sql = "ALTER TABLE $table ALTER $column DROP NOT NULL";
        static::$pdo->exec($sql);
    }

    public function addAutoIncrement(string $table, string $column): void
    {
        $sql = "ALTER TABLE $table MODIFY $column INT AUTO_INCREMENT PRIMARY KEY";
        static::$pdo->exec($sql);
    }

    public function dropAutoIncrement(string $table, string $column): void
    {
        $sql = "ALTER TABLE $table MODIFY $column INT";
        static::$pdo->exec($sql);
    }

    public function addComment(string $table, string $column, string $comment): void
    {
        $sql = "ALTER TABLE $table MODIFY $column $comment";
        static::$pdo->exec($sql);
    }

    public function dropComment(string $table, string $column): void
    {
        $sql = "ALTER TABLE $table MODIFY $column";
        static::$pdo->exec($sql);
    }

    public function addColumnAfter(string $table, string $column, string $type, string $after): void
    {
        $sql = "ALTER TABLE $table ADD $column $type AFTER $after";
        static::$pdo->exec($sql);
    }

    public function addColumnFirst(string $table, string $column, string $type): void
    {
        $sql = "ALTER TABLE $table ADD $column $type FIRST";
        static::$pdo->exec($sql);
    }

    public function renameTable(string $table, string $newName): void
    {
        $sql = "RENAME TABLE $table TO $newName";
        static::$pdo->exec($sql);
    }

    public function dropTable(string $table): void
    {
        $sql = "DROP TABLE $table";
        static::$pdo->exec($sql);
    }

    public function truncateTable(string $table): void
    {
        $sql = "TRUNCATE TABLE $table";
        static::$pdo->exec($sql);
    }

    public function tableExists(string $table): bool
    {
        $sql = "SHOW TABLES LIKE '$table'";
        $result = static::$pdo->query($sql);
        return $result->rowCount() > 0;
    }
}