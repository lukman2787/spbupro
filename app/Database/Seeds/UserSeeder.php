<?php

namespace App\Database\Seeds;

use Myth\Auth\Password;
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
			'password_hash' => Password::hash('ikhsan123'),
			'active' => 1,
		]);

		$groups->addUserToGroup($user->getInsertId(), 1);

		$user->insert([
			'username' => 'userfdsfds',
			'email' => 'ikhsan24@gmail.com',
			'password_hash' => Password::hash('ikhsan123'),
			'active' => 1,
		]);

		$groups->addUserToGroup($user->getInsertId(), 2);
	}
}
