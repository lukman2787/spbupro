<?php

namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\Seeder;
use Myth\Auth\Models\GroupModel;

class UserSeeder extends Seeder
{
	public function run()
	{
		$user = new UserModel();
		$groups = new GroupModel();
		$user->insert([
			'username' => 'hery123',
			'email' => 'ikhsan@gmail.com',
			'password_hash' => password_hash('ikhsan123', PASSWORD_BCRYPT),
		]);

		$groups->addUserToGroup($user->getInsertId(), 1);
	}
}
