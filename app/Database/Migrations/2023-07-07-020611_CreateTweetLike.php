<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTweetLike extends Migration
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
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('tweet_likes', true);
    }

    public function down()
    {
        $this->forge->dropTable('tweet_likes');
    }
}
