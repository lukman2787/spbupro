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
		// dd($this->categories->countAll());
		$query = $this->request->getGet('search_query');
		return view('frontend/blogs/index', [
			'title' => 'Blog',
			'posts' => $this->posts->like('title', "%$query%")->orderBy('created_at', 'desc')->paginate(10),
			'pager' => $this->posts->pager,
			'categories' => new CategoryModel(),
			'profile' => $this->profiles->find(1),
		]);
	}

	public function show($slug = null)
	{
		if ($this->posts->where('slug', $slug)->get()->getFirstRow() == null) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
		// dd($this->posts->getPostsRelate());
		return view('frontend/blogs/show', [
			'title' => 'Blog Details',
			'post' => $this->posts->getPostWithUser($slug),
			'posts' => $this->posts,
			'categories' => $this->categories,
		]);
	}

	public function category($slug)
	{
		// dd($slug);
		// dd($this->posts->getPostsBelongsToCategory($slug));
		// dd($this->categories->countAll());
		$query = $this->request->getGet('search_query');
		return view('frontend/blogs/category', [
			'title' => 'Blog',
			// 'posts' => $this->posts->like('title', "%$query%")->orderBy('created_at', 'desc')->paginate(5),
			'posts' => $this->posts->getPostsBelongsToCategory($slug),
			'pager' => $this->posts->pager,
			'categories' => new CategoryModel(),
			'profile' => $this->profiles->find(1),
		]);
	}
}
