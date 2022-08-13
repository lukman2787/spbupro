<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Category extends BaseController
{
	public function index()
	{
		return view('backend/categories/index');
	}
}
