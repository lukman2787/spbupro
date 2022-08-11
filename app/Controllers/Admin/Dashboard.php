<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        // return view('welcome_message');
        return view('admin/dashboard');
    }
}
