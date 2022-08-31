<?php

namespace App\Controllers;

use App\Models\PostModel;
use App\Models\ProfileModel;

class Home extends BaseController
{
	public function __construct()
	{
		$this->profiles = new ProfileModel();
		$this->posts = new PostModel();
	}

	public function index()
	{
		return view('frontend/home', [
			'title' => 'SPBU Pro Media',
			'profile' => $this->profiles->find(1),
			'posts' => $this->posts->paginate(3),
		]);
	}
}