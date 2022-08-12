<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
	public function __construct()
    {
        $this->users = new UserModel();
    }

	public function index()
	{
		return view('backend/users/index', [
			'title' => 'Pengguna',
			'users' => $this->users->findAll(),           
		]);
	}

	public function delete($id = null)
	{
		$this->users->delete($id);
		return redirect()->to(site_url('admin/user'))->with('success', 'Data berhasil dihapus');
	}
}
