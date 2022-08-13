<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Myth\Auth\Models\GroupModel;

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

        // Validate basics first since some password rules rely on these fields
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
		
		// Save the user
        // $allowedPostFields = array_merge(['password'], $this->config->validFields, $this->config->personalFields);
        $user              = $this->request->getPost();

        // $this->config->requireActivation === null ? $user->activate() : $user->generateActivateHash();

        // Ensure default group gets assigned if set
        if (! empty($this->config->defaultUserGroup)) {
            $users = $users->withGroup($this->config->defaultUserGroup);
        }

        $users->insert([
			'username' => $this->request->getPost('username'),
			'password_hash' => $this->request->getPost('password'),
			'email' => $this->request->getPost('email'),
		]);

		$this->groups->addUserToGroup($users->getInsertId(), $this->request->getPost('group'));

        // Success!
        return redirect()->route('admin/user')->with('success', 'Berhasil menambahkan data!');
    }

	public function delete($id = null)
	{
		$this->users->delete($id);
		return redirect()->to(site_url('admin/user'))->with('success', 'Data berhasil dihapus');
	}
}
