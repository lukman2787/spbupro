<?php

namespace App\Database\Seeds;

use App\Models\CategoryModel;
use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
	public function run()
	{
		$category = new CategoryModel();
		$category->insert([
			'name' => 'HTML',
			'slug' => 'html',
		]);

		$category->insert([
			'name' => 'PHP',
			'slug' => 'php',
		]);

		$category->insert([
			'name' => 'Laravel',
			'slug' => 'laravel',
		]);
	}
}
