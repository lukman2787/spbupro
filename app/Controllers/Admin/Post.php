<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\{PostModel, CategoryModel};

class Post extends BaseController
{
	public function __construct()
	{
		$this->posts = new PostModel();
		$this->categories = new CategoryModel();
	}

	public function index()
	{
		return view('backend/posts/index', [
			'title' => 'List Postingan',
			'posts' => $this->posts->findAll()
		]);
	}

	public function new()
	{
		return view('backend/posts/new', [
			'title' => 'Tambah Postingan',
			'categories' => $this->categories->findAll(),
		]);
	}

	public function create()
	{
		if (!$this->validate([
            'title' => 'required',
            'body' => 'required',
            'category' => 'required',
            'image' => [
                'rules' => 'is_image[image]'
                    . '|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]'
                    . '|max_size[image,2048]'
            ],
        ])) {
            return redirect()->back()->withInput();
        }

		$file = $this->request->getFile('image');
        if ($file->getError() == 4) {
            $image = null;
        } else {
            $image = $file->getRandomName();
            $file->move('uploads/post', $image);
        }
		
		$this->posts->insert([
			'title' => $this->request->getPost('title'),
			'user_id' => user()->id,
			'slug' => url_title($this->request->getPost('title'), '-', true),
			'body' => $this->request->getPost('body'),
			'meta_keyword' => $this->request->getPost('meta_keyword'),
			'meta_description' => $this->request->getPost('meta_description'),
			'image' => $image,
		]);

		$categories = $this->request->getPost('category');
		if (count($categories) > 0) {
			foreach($categories as $category) {
				$this->posts->addCategoryToPost($category, $this->posts->getInsertId());
			}
		}

		return redirect()->to(site_url('admin/post'))->with('success', 'Data berhasil ditambah');
	}

	public function update($id = null)
	{
		if (!$this->validate([
            'title' => 'required',
            'body' => 'required',
            'category' => 'required',
            'image' => [
                'rules' => 'is_image[image]'
                    . '|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]'
                    . '|max_size[image,2048]'
            ],
        ])) {
            return redirect()->back()->withInput();
        }

		$file = $this->request->getFile('image');
        if ($file->getError() == 4) {
            $image = null;
        } else {
            $image = $file->getRandomName();
            $file->move('uploads/post', $image);
        }
		
		$this->posts->update($id, [
			'title' => $this->request->getPost('title'),
			'slug' => url_title($this->request->getPost('title'), '-', true),
			'body' => $this->request->getPost('body'),
			'meta_keyword' => $this->request->getPost('meta_keyword'),
			'meta_description' => $this->request->getPost('meta_description'),
			'image' => $image,
		]);

		$categories = $this->request->getPost('category');
		if (count($categories) > 0) {
			foreach($categories as $category) {
				$this->posts->addCategoryToPost($category, $this->posts->getInsertId());
			}
		}

		return redirect()->to(site_url('admin/post'))->with('success', 'Data berhasil ditambah');
	}

	public function delete($id = null)
	{
		$this->posts->delete($id);
		$this->posts->deleteAllCategoryFromPost($id);
		return redirect()->to(site_url('admin/post'))->with('success', 'Data berhasil dihapus');
	}
}
