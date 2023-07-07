<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateTweetComment extends Migration
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
            'tweet_id' => [
                'type' => 'INT',
                'constraint' => 5,

            ],
            'content' => [
                'type' => 'TEXT',
            ],
            'image' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'is_image' => [
                'type' => 'INT',
                'constraint' => 1,
                'default' => 0,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('tweet_comments', true);
    }

    public function down()
    {
        $this->forge->dropTable('tweet_comments');
    }
}
