<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
	public function run()
	{
		$superadmin = $this->db->table('auth_groups')->insert([
			'name' => 'Super Admin',
			'description' => 'Level Dewa',
		]);

		$admin = $this->db->table('auth_groups')->insert([
			'name' => 'Admin',
			'description' => 'Operator Biasa',
		]);

		// $superadmin->

	}
}
