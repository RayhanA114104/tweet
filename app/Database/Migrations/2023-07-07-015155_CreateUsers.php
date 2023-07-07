<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsers extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'id',
                'username' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                    'unique' => true,
                ],
                'password' => [
                    'type' =>  'VARCHAR',
                    'constraint' => '200',
                ],
                'fullname' => [
                    'type' => 'VARCHAR',
                    'constraint' => '200',
                ],
                'email' => [
                    'type' => 'VARCHAR',
                    'constraint' => '200',
                ],
                'photo' => [
                    'type' => 'VARCHAR',
                    'constraint' => '200',
                ],
            ]
        );
        $this->forge->addKey('id', true);
        $this->forge->createTable('users', true);
    }

    public function down()
    {
       $this->forge->dropTable('users', true);
    }
}
