<?php

namespace App\Controllers;

use App\Models\AjaxModel;
use monken\TablesIgniter;

class Ajaxcrud extends BaseController
{
    function __construct()
    {
        $this->ajax_m = new AjaxModel();
    }

    public function index()
    {
        return view('crud/ajax_crud_data');
    }

    public function fetch_all()
    {
        $data_table = new TablesIgniter();

        $data_table->setTable($this->ajax_m->noticeTable())
            ->setDefaultOrder("id", "ASC")
            ->setSearch(["name", "email"])
            ->setOrder(["id", "name", "email", "gender"])
            ->setOutput(["id", "name", "email", "gender", $this->ajax_m->button()]);
        return $data_table->getDatatable();
    }

    public function action()
    {
        if ($this->request->getVar('action')) {
            helper(['form', 'url']);
            $name_error = '';
            $email_error = '';
            $gender_error = '';
            $error = 'no';
            $success = 'no';
            $message = '';

            $error = $this->validate([
                'name'    =>    'required|min_length[3]',
                'email'    =>    'required|valid_email',
                'gender' =>    'required'
            ]);

            if (!$error) {
                $error = 'yes';
                $validation = \Config\Services::validation();
                if ($validation->getError('name')) {
                    $name_error = $validation->getError('name');
                }

                if ($validation->getError('email')) {
                    $email_error = $validation->getError('email');
                }

                if ($validation->getError('gender')) {
                    $gender_error = $validation->getError('gender');
                }
            } else {
                $success = 'yes';
                if ($this->request->getVar('action') == 'Add') {
                    $this->ajax_m->save([
                        'name'        =>    $this->request->getVar('name'),
                        'email'        =>    $this->request->getVar('email'),
                        'gender'    =>    $this->request->getVar('gender')
                    ]);

                    $message = '<div class="alert alert-success">User Data Added</div>';
                }

                if ($this->request->getVar('action') == 'Edit') {
                    $id = $this->request->getVar('hidden_id');

                    $data = [
                        'name'      =>  $this->request->getVar('name'),
                        'email'     =>  $this->request->getVar('email'),
                        'gender'    =>  $this->request->getVar('gender')
                    ];

                    $this->ajax_m->update($id, $data);

                    $message = '<div class="alert alert-success">User Data Updated</div>';
                }
            }

            $output = array(
                'name_error'    =>    $name_error,
                'email_error'    =>    $email_error,
                'gender_error'    =>    $gender_error,
                'error'            =>    $error,
                'success'        =>    $success,
                'message'        =>    $message
            );

            echo json_encode($output);
        }
    }

    public function fetch_single_data()
    {
        if ($this->request->getVar('id')) {
            $user_data = $this->ajax_m->where('id', $this->request->getVar('id'))->first();
            echo json_encode($user_data);
        }
    }

    public function delete()
    {
        if ($this->request->getVar('id')) {
            $id = $this->request->getVar('id');
            $this->ajax_m->where('id', $id)->delete($id);
            echo '<div class="alert alert-success">User Data Deleted</div>';
        }
    }
}
