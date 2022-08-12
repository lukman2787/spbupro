<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCategoryPostTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'BIGINT',
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'category_id' => [
				'type'           => 'BIGINT',
				'unsigned'       => true,
			],
			'post_id' => [
				'type'           => 'BIGINT',
				'unsigned'       => true,
			],
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('category_post');
	}

	public function down()
	{
		$this->forge->dropTable('category_post');
	}
}
