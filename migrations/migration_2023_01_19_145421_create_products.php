<?php

class migration_2023_01_19_145421_create_products extends Migration
{
    public function up()
        {
            $this->create('products', [
                'id' => 'INT AUTO_INCREMENT PRIMARY KEY',
                'name' => 'VARCHAR(255) NOT NULL',
                'created_at' => 'DATETIME',
                'updated_at' => 'DATETIME',
            ]);
        }

    public function down()
    {
        $this->drop('products');
    }
}