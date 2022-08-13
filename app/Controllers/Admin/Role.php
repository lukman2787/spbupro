<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Myth\Auth\Models\{GroupModel, PermissionModel};

class Role extends BaseController
{
	public function __construct()
    {
        $this->roles = new GroupModel();
		$this->permissions = new PermissionModel();
    }

	public function index()
	{
		return view('backend/roles/index', [
			'title' => 'Role',
			'roles' => $this->roles->findAll(),           
		]);
	}

	public function new()
	{
		return view('backend/roles/new', [
			'title' => 'Tambah Role',
			'permissions' => $this->permissions->findAll(),
		]);
	}

	public function edit($id = null)
	{
		return view('backend/roles/edit', [
			'title' => 'Edit Role',
			'permissions' => $this->permissions->findAll(),
			'group' => $this->roles->find($id),
		]);
	}

	public function create()
	{
		if (!$this->validate([
            'name' => 'required',
            'permission' => 'required',
        ])) {
            return redirect()->back()->withInput();
        }

		$this->roles->insert([
			'name' => $this->request->getPost('name'),
			'description' => $this->request->getPost('description'),
		]);

		$permissions = $this->request->getPost('permission');
		if (count($permissions) > 0) {
            foreach ($permissions as $index => $value) {
				$this->roles->addPermissionToGroup($value[$index], $this->roles->getInsertId());
            }
        }

		return redirect()->to(site_url('admin/role'))->with('success', 'Data berhasil ditambah');

	}

	public function delete($id = null)
	{
		$this->roles->delete($id);
		return redirect()->to(site_url('admin/role'))->with('success', 'Data berhasil dihapus');
	}
}
