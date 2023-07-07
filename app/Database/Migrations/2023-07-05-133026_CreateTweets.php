<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateTweets extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 5,

            ],
            'content' => [
                'type' => 'TEXT',
            ],
            'category' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('tweets', true);
    }

    public function down()
    {
        $this->forge->dropTable('tweets');
    }
}
