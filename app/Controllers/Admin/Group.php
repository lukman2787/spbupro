<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Myth\Auth\Models\{GroupModel, PermissionModel};

class Group extends BaseController
{
	public function __construct()
    {
        $this->groups = new GroupModel();
		$this->permissions = new PermissionModel();
    }

	public function index()
	{
		return view('backend/groups/index', [
			'title' => 'Group',
			'groups' => $this->groups->findAll(),           
		]);
	}

	public function new()
	{
		return view('backend/groups/new', [
			'title' => 'Tambah Group',
			'permissions' => $this->permissions->findAll(),
		]);
	}

	public function edit($id = null)
	{
		foreach ($this->groups->getPermissionsForGroup($id) as $value) {
			$permissionsGroup[$value['id']] = $value['name'];
		}

		return view('backend/groups/edit', [
			'title' => 'Edit Group',
			'permissions' => $this->permissions->findAll(),
			'group' => $this->groups->find($id),
			'permissionsGroup' => $permissionsGroup,
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

		$this->groups->insert([
			'name' => $this->request->getPost('name'),
			'description' => $this->request->getPost('description'),
		]);

		$permissions = $this->request->getPost('permission');
		if (count($permissions) > 0) {
            foreach ($permissions as $value) {
				$this->groups->addPermissionToGroup($value, $this->groups->getInsertId());
            }
        }

		return redirect()->to(site_url('admin/group'))->with('success', 'Data berhasil ditambah');
	}

	public function update($id = null)
	{
		if (!$this->validate([
            'name' => 'required',
            'permission' => 'required',
        ])) {
            return redirect()->back()->withInput();
        }

		$group = $this->groups->find($id);

		$this->db->transStart();
			$this->groups->update($id, [
				'name' => $this->request->getPost('name'),
				'description' => $this->request->getPost('description'),
			]);

			$db = \Config\Database::connect();
			$db->table('auth_groups_permissions')->where('group_id', $group->id)->delete();
			$permissions = $this->request->getPost('permission');
			if (count($permissions) > 0) {
				foreach ($permissions as $value) {
					$this->groups->addPermissionToGroup($value, $group->id);
				}
			}
		$this->db->transComplete();

		return redirect()->to(site_url('admin/group'))->with('success', 'Data berhasil diedit');
	}

	public function delete($id = null)
	{
		$this->groups->delete($id);
		return redirect()->to(site_url('admin/group'))->with('success', 'Data berhasil dihapus');
	}
}
