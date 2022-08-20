<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;

class Category extends BaseController
{
	public function __construct()
	{
		$this->categories = new CategoryModel();
	}

	public function index()
	{
		return view('backend/categories/index', [
			'categories' => $this->categories->findAll(),
		]);
	}

	public function delete($id = null)
	{
		$this->categories->delete($id);
		return redirect()->to(site_url('admin/category'))->with('success', 'Data berhasil dihapus');
	}
}
