<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCategoriesTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'BIGINT',
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'name' => [
				'type'           => 'BIGINT',
				'unsigned'       => true,
			],
			'slug' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('categories');
	}

	public function down()
	{
		$this->forge->dropTable('categories');
	}
}
