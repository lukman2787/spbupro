<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Crearteusers extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'BIGINT',
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nama_user'       => [
				'type'       => 'VARCHAR',
				'constraint' => '60',
			],
			'email_user'       => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
			],
			'password_user'       => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
			],
			'info_user' => [
				'type' => 'TEXT',
				'null' => true,
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('users');
	}

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
