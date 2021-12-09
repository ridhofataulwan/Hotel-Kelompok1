<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Admin extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url', 'auth']);
    }
    public function index()
    {
        $data = [
            'title' => 'Admin Dasboard'
        ];
        if (in_groups('admin')) {

            return view('Admin/index',$data);
        } else if (in_groups('customer')) {
            return redirect()->to('Admin/');
        }
    }
}
