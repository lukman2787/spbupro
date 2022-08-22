<?php

namespace App\Database\Seeds;

use App\Models\ProfileModel;
use CodeIgniter\Database\Seeder;

class ProfileSeeder extends Seeder
{
	public function run()
	{
		$profiles = new ProfileModel();
		$profiles->insert([
			'app_name' => 'SPBU Pro Media',
			'description' => 'Membantu kemajuan sdm untuk Indonesia'
		]);
	}
}
