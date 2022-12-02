<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 7,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
                'unique'       => true,
            ],
            'password'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'type'       => [
                'type'       => 'Varchar',
                'constraint' => '25',
            ],
            'deleted_at'       => [
                'type'       => 'datetime',
                'null' => true,
                'default' => null
            ],
            'updated_at'       => [
                'type'       => 'datetime',
                'default' => null
            ],
            'created_at datetime default current_timestamp',


        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
