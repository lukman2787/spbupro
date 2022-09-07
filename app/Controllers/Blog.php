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
			'posts' => $this->posts->like('title', "%$query%")->orderBy('created_at', 'desc')->paginate(5),
			'pager' => $this->posts->pager,
			'categories' => $this->categories->findAll(),
			'profile' => $this->profiles->find(1),
		]);
	}

	public function show($slug = null)
	{
		if ($this->posts->where('slug', $slug)->get()->getFirstRow() == null) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}

		return view('frontend/blogs/show', [
			'title' => 'Blog Details',
			'post' => $this->posts->getPostWithUser($slug),
			'categories' => $this->categories->findAll(),
		]);
	}
}
