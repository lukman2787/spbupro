<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProfilesTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'BIGINT',
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'logo' => [
				'type'           => 'VARCHAR',
				'constraint'       => 255,
				'nullable' 		=> true
			],
			'background_image' => [
				'type'           => 'VARCHAR',
				'constraint'       => 255,
				'nullable' 		=> true
			],
			'app_name' => [
				'type'           => 'VARCHAR',
				'constraint'       => 255
			],
			'description' => [
				'type'           => 'VARCHAR',
				'constraint'       => 255
			],
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('profiles');
	}

	public function down()
	{
		$this->forge->dropTable('profiles');
	}
}
