<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\{CategoryModel, PostModel, ProfileModel};

class Blog extends BaseController
{
	public function __construct()
	{
		$this->posts = new PostModel();
		$this->categories = new CategoryModel();
		$this->profiles = new ProfileModel();
	}

	public function index()
	{
		return view('frontend/blogs/index', [
			'title' => 'Blog',
			'posts' => $this->posts->findAll(),
			'categories' => $this->categories->findAll(),
			'profile' => $this->profiles->find(1),
		]);
	}
}
