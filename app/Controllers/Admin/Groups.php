<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourcePresenter;
// use App\Models\GroupModel;

class Groups extends ResourcePresenter
{
	// function __construct()
	// {
	// 	$this->group = new GroupModel();
	// }
	protected $modelName = 'App\Models\GroupModel';
	/**
	 * Present a view of resource objects
	 *
	 * @return mixed
	 */
	public function index()
	{
		$data['datagroup'] = $this->model->findAll();
		return view('admin/group/index', $data);
	}

	/**
	 * Present a view to present a specific resource object
	 *
	 * @param mixed $id
	 *
	 * @return mixed
	 */
	public function show($id = null)
	{
		//
	}

	/**
	 * Present a view to present a new single resource object
	 *
	 * @return mixed
	 */
	public function new()
	{
		return view('admin/group/new');
	}

	/**
	 * Process the creation/insertion of a new resource object.
	 * This should be a POST.
	 *
	 * @return mixed
	 */
	public function create()
	{
		// get post jika nama form dengan field table sama
		$data = $this->request->getPost();

		$this->model->insert($data);
		return redirect()->to(site_url('groups'))->with('success', 'Data Berhasil disimpan');
	}

	/**
	 * Present a view to edit the properties of a specific resource object
	 *
	 * @param mixed $id
	 *
	 * @return mixed
	 */
	public function edit($id = null)
	{
		return view('admin/group/edit');
	}

	/**
	 * Process the updating, full or partial, of a specific resource object.
	 * This should be a POST.
	 *
	 * @param mixed $id
	 *
	 * @return mixed
	 */
	public function update($id = null)
	{
		//
	}

	/**
	 * Present a view to confirm the deletion of a specific resource object
	 *
	 * @param mixed $id
	 *
	 * @return mixed
	 */
	public function remove($id = null)
	{
		//
	}

	/**
	 * Process the deletion of a specific resource object
	 *
	 * @param mixed $id
	 *
	 * @return mixed
	 */
	public function delete($id = null)
	{
		//
	}
}
