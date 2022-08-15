<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PostModel;

class Blog extends BaseController
{
	public function __construct()
	{
		$this->posts = new PostModel();
	}

	public function index()
	{
		return view('frontend/blogs/index', [
			'title' => 'Blog',
			'posts' => $this->posts->findAll(),
		]);
	}
}
