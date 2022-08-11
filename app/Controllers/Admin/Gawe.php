<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Gawe extends BaseController
{
    public function index()
    {
        $builder = $this->db->table('gawe');
        $query   = $builder->get();
        // $query   = $this->db->query('SELECT * FROm gawe');
        $data['data_gawe'] = $query->getResult();
        return view('admin/gawe/get', $data);
    }

    public function create()
    {
        return view('admin/gawe/add');
    }

    public function store()
    {
        // cara 1 : name_field sama
        // $data = $this->request->getPost();
        // cara 2 : name_field spesifik
        $data = [
            'nama_gawe' => $this->request->getVar('nama_gawe'),
            'date_gawe' => $this->request->getVar('date_gawe'),
            'info_gawe' => $this->request->getVar('info_gawe'),
        ];
        $this->db->table('gawe')->insert($data);
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('gawe'))->with('success', 'Data Berhasil disimpan');
        }
    }

    public function edit($id = null)
    {
        if ($id != null) {
            $query = $this->db->table('gawe')->getWhere(['id_gawe' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['gawe'] = $query->getRow();
                return view('admin/gawe/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id)
    {
        // $data = $this->request->getPost();
        // unset($data['_method']);
        $data = [
            'nama_gawe' => $this->request->getVar('nama_gawe'),
            'date_gawe' => $this->request->getVar('date_gawe'),
            'info_gawe' => $this->request->getVar('info_gawe'),
        ];
        $this->db->table('gawe')->where(['id_gawe' => $id])->update($data);
        return redirect()->to(site_url('gawe'))->with('success', 'Data Berhasil diupdate');
    }
    public function destroy($id)
    {
        $this->db->table('gawe')->where(['id_gawe' => $id])->delete();
        return redirect()->to(site_url('gawe'))->with('success', 'Data Berhasil dihapus');
    }
}
