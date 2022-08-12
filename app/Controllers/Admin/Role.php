<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RoleModel;

class Role extends BaseController
{
	public function __construct()
    {
        $this->roles = new RoleModel();
    }

	public function index()
	{
		return view('backend/roles/index', [
			'title' => 'Role',
			'roles' => $this->roles->findAll(),           
		]);
	}

	public function delete($id = null)
	{
		$this->roles->delete($id);
		return redirect()->to(site_url('admin/role'))->with('success', 'Data berhasil dihapus');
	}
}
