<?php

class migration_2023_01_19_144327_create_users extends Migration
{
    public function up()
        {
            $this->create('users', [
                'id' => 'INT AUTO_INCREMENT PRIMARY KEY',
                'name' => 'VARCHAR(255)',
                'created_at' => 'DATETIME',
                'updated_at' => 'DATETIME',
            ]);
        }

    public function down()
    {
        $this->drop('users');
    }
}