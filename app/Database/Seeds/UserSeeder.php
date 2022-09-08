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
			'username' => 'ikhsan123',
			'email' => 'ikhsan@gmail.com',
			'password_hash' => Password::hash('Dadan123'),
			'active' => 1,
		]);

		$groups->addUserToGroup($user->getInsertId(), 1);

		$user->insert([
			'username' => 'kuncoro123',
			'email' => 'ikhsan24@gmail.com',
			'password_hash' => Password::hash('Mihawk123'),
			'active' => 1,
		]);

		$groups->addUserToGroup($user->getInsertId(), 2);
	}
}
