<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        return redirect()->to(site_url('administrator'));
    }

    public function login()
    {
        if (session('id_user')) {
            return redirect()->to(site_url('admin/dashboard'));
        }
        return view('admin/auth/login');
    }

    public function loginProcess()
    {
        $post = $this->request->getPost();
        $query = $this->db->table('users')->getWhere(['username' => $post['username']]);
        $user = $query->getRow();
        if ($user) {
            $password_hash = sha1($post['password']);
            $query_password = $this->db->table('users')->getWhere(['username' => $post['username'], 'password' => $password_hash]);
            // if (password_verify($post['password'], $user->password_user)) {
            if ($query_password->getRow()) {
                $params = ['id_user' => $user->user_id];
                session()->set($params);
                return redirect()->to(site_url('admin/dashboard'));
            } else {
                return redirect()->back()->with('error', 'Password tidak sesuai');
            }
        } else {
            return redirect()->back()->with('error', 'Username tidak ditemukan');
        }
    }

    public function logout()
    {
        session()->remove('id_user');
        return redirect()->to(site_url('administrator'));
    }
}
