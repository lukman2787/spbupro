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
		$query = $this->request->getGet('search_query');
		return view('frontend/blogs/index', [
			'title' => 'Blog',
			'posts' => $this->posts->like('title', "%$query%")->paginate(5),
			'pager' => $this->posts->pager,
			'categories' => $this->categories->findAll(),
			'profile' => $this->profiles->find(1),
		]);
	}

	public function show($slug = null)
	{
		// dd($this->posts->where('slug', $slug)->first());
		return view('frontend/blogs/show', [
			'title' => 'Blog Details',
			'post' => $this->posts->where('slug', $slug)->first(),
		]);
	}
}
