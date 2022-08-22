<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProfileModel;

class Dashboard extends BaseController
{
	public function __construct()
	{
		$this->profiles = new ProfileModel();
	}

	public function index()
	{
		return view('backend/dashboard', [
			'title' => 'Dashboard',
			'profiles' => $this->profiles->findAll(),
		]);
	}

	public function editProfile($id = null)
	{

	}

	public function updateProfile($id = null) {}
}
