<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePostsTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'BIGINT',
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'user_id' => [
				'type'           => 'BIGINT',
				'unsigned'       => true,
			],
			'slug' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'title'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'meta_description'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'meta_keyword'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'body' => [
				'type' => 'TEXT',
			],
			'image' => [
				'type' => 'VARCHAR',
				'constraint' => '255'
			]
		]);

		$this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id');
		$this->forge->createTable('posts');
	}

	public function down()
	{
		$this->forge->dropTable('posts');
	}
}
