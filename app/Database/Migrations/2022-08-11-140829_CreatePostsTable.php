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
				'type'           => 'INT',
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
				'null' => true,
			],
			'meta_keyword'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
				'null' => true,
			],
			'body' => [
				'type' => 'TEXT',
			],
			'image' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => true,
			],
			'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
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
