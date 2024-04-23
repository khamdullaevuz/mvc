#!/usr/bin/env php
<?php
$data = $argv[1] ?? null;
if (!$data) {
    die("make:config - making config\nmake:controller {name} - making controller\nmake:model {name} - making model\nmake:migration {name}\nmigrate:up - up migrate\nmigrate:down - down migrate\nserve - serve application\nserve {port} - serve application with custom port");
}
if (mb_stripos($data, ":") !== false) {
    $value = explode(":", $data);
    $method = $value[0];
    $param = $value[1];
    $name = $argv[2] ?? null;
    if ($method == "make") {
        $dir = $param . "s";
        if ($param == "config") {
            if (!is_dir("config")) {
                mkdir("config");
            }
            if (!file_exists("config/Core.php")) {
                $dir = $param;
                $name = "Core";
                $filename = $name;
            } else {
                die("Config already maked!");
            }
        } elseif ($param == "migration") {
            $name = strtolower($name) . 's';
            $filename = "migration_" . date("Y_m_d_His") . "_create_" . $name;
        }
        $param = ucfirst($param);
        if (!isset($name)) $name = $param;
        if (!isset($filename)) $filename = $name;
        $data = file_get_contents("stubs/" . $param . ".stub");
        $data = str_replace(["{name}", "{table_name}"], [$filename, $name], $data);
        file_put_contents($dir . "/" . $filename . ".php", $data);
        echo "Created " . $dir . "/" . $filename . ".php" . PHP_EOL;
    } elseif ($method == "migrate") {
        require __DIR__ . '/config/Core.php';
        require __DIR__ . '/Core/Connection.php';
        require __DIR__ . '/Core/Migration.php';
        $migration = new Migration();
        if ($param == "up") {
            if (!$migration->tableExist("migrations")) {
                $migration->create("migrations", [
                    "id" => "INT AUTO_INCREMENT PRIMARY KEY",
                    "name" => "VARCHAR(255)",
                    "batch" => "INT",
                    "created_at" => "DATETIME",
                    "updated_at" => "DATETIME",
                ]);
            }
            $migrations = glob("migrations/*.php");
            $batch = $migration->getBatch();
            $migrations_count = count($migrations);
            foreach ($migrations as $migrationFile) {
                if ($migrations_count == $migration->migrationCount()) {
                    die("All migrations are already migrated!");
                }
                require $migrationFile;
                $migrationName = str_replace("migrations/", "", $migrationFile);
                $migrationName = str_replace(".php", "", $migrationName);
                if ($migration->checkMigrationExist($migrationName)) {
                    $migrationNameInstance = new $migrationName();
                    printf("Migration %s up is started!\n", $migrationName);
                    $migrationNameInstance->up();
                    $migration->add("migrations", [
                        "name" => $migrationName,
                        "batch" => $batch,
                        "created_at" => date("Y-m-d H:i:s"),
                        "updated_at" => date("Y-m-d H:i:s"),
                    ]);
                    printf("Migration %s up is migrated successfully!\n", $migrationName);
                }
            }
        } elseif ($param == "down") {
            $batch = $migration->selectLastBatch();
            if (!$batch) die("No migration to rollback!");
            $migrations = $migration->selectByBatch($batch);
            foreach ($migrations as $migrationName) {
                $name = $migrationName["name"];
                require "migrations/" . $name . ".php";
                printf("Migration %s down is started!\n", $name);
                $nameInstance = new $name();
                $nameInstance->down();
                $migration->delete("migrations", $name);
                printf("Migration %s down is migrated successfully!\n", $name);
            }
        }
    }
} else {
    $method = $data;
    if ($method == "serve") {
        if (!isset($argv[2])) {
            exec("php -S localhost:8000 public/index.php");
        } else {
            exec("php -S localhost:" . $argv[2] . " public/index.php");
        }
    }
}
