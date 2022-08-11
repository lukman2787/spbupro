<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
	{
		// $data = [
		// 	'nama_user' => 'Administrator',
		// 	'email_user' => 'admin@gmail.com',
		// 	'password_user' => password_hash('123456', PASSWORD_BCRYPT),
		// ];
		// $this->db->table('users')->insert($data);

		$data = [
			[
				'nama_user' => 'admin',
				'email_user' => 'admin@gelo.com',
				'password_user' => password_hash('12345678', PASSWORD_BCRYPT),
			],

			[
				'nama_user' => 'Steven Corona',
				'email_user' => 'steven@hms.com',
				'password_user' => password_hash('steven', PASSWORD_BCRYPT),
			],
		];
		$this->db->table('users')->insertbatch($data);
	}
}
