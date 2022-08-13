<?php

namespace App\Controllers\Admin;

use App\Entities\User as EntityUser;
use App\Models\UserModel;
use Myth\Auth\Models\GroupModel;
use App\Controllers\BaseController;

class User extends BaseController
{
	public function __construct()
    {
        $this->users = new UserModel();
        $this->groups = new GroupModel();
    }

	public function index()
	{
		return view('backend/users/index', [
			'title' => 'Pengguna',
			'users' => $this->users->findAll(),           
		]);
	}

	public function new()
	{
        return view('backend/users/new', [
			'title' => 'Tambah Pengguna',
			'groups' => $this->groups->findAll(),
		]);
	}

	public function create()
	{
        $users = model(UserModel::class);

        $rules = [
            'username' => 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]',
            'email'    => 'required|valid_email|is_unique[users.email]',
			'password'     => 'required|strong_password',
            'pass_confirm' => 'required|matches[password]',
            'group' => 'required',
        ];

        if (!$this->validate($rules)) {
			// $validation = \Config\Services::validation();
			// dd($validation);
            return redirect()->back()->withInput();
        }
		
        $users->insert([
			'username' => $this->request->getPost('username'),
			'password_hash' => $this->request->getPost('password'),
			'email' => $this->request->getPost('email'),
			'active' => 1,
		]);

		$this->groups->addUserToGroup($users->getInsertId(), $this->request->getPost('group'));

        return redirect()->route('admin/user')->with('success', 'Berhasil menambahkan data!');
    }

	public function delete($id = null)
	{
		$this->users->delete($id);
		return redirect()->to(site_url('admin/user'))->with('success', 'Data berhasil dihapus');
	}
}
