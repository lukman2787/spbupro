<?php

namespace App\Controllers;

use App\Models\UserModel;
use monken\TablesIgniter;

class Users extends BaseController
{
    function __construct()
    {
        $this->user_m = new UserModel();
    }

    public function index()
    {
        return view('admin/users/user_data');
    }

    function fetch_all()
    {
        $data_table = new TablesIgniter();

        $data_table->setTable($this->user_m->noticeTable())
            ->setDefaultOrder("username", "ASC")
            ->setSearch(["username", "name"])
            ->setOrder(["name", "username", "gender", "address"])
            ->setOutput(["name", "username", "gender", "address", "level", $this->user_m->btnAction()]);
        return $data_table->getDatatable();
    }
}
