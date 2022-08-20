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

	public function new()
	{
		return view('backend/categories/new', [
			'title' => 'Create Category',
		]);
	}

	public function edit($id = null)
	{
		return view('backend/categories/edit', [
			'title' => 'Edit Categories',
			'category' => $this->categories->find($id),
		]);
	}

	public function create()
	{
		if (!$this->validate([
            'name' => 'required|max_length[255]',
        ])) {
            return redirect()->back()->withInput();
        }

		$this->categories->insert([
			'name' => $this->request->getPost('name'),
			'slug' => url_title($this->request->getPost('name'), '-', true),
		]);

		return redirect()->to(site_url('admin/category'))->with('success', 'Data berhasil ditambah!');
	}

	public function update($id = null) {
		if (!$this->validate([
            'name' => 'required|max_length[255]',
        ])) {
            return redirect()->back()->withInput();
        }

		$this->categories->update($id, [
			'name' => $this->request->getPost('name'),
			'slug' => url_title($this->request->getPost('name'), '-', true),
		]);

		return redirect()->to(site_url('admin/category'))->with('success', 'Data berhasil ditambah!');
	}

	public function delete($id = null)
	{
		$this->categories->delete($id);
		return redirect()->to(site_url('admin/category'))->with('success', 'Data berhasil dihapus');
	}
}
