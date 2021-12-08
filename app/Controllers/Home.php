<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Home extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url', 'auth']);
        $this->CustomerModel = new CustomerModel();
    }
    public function index()
    {
        if (in_groups('customer')) {
            //cek apakah user yang login udah dibuatin profile nya
            if (empty($this->CustomerModel->getCustomerByUser(user_id()[0]))) {
                //Ini buat bikin profile dari customer klo baru create(isi = default)
                $this->CustomerModel->createCustomerProfile(user_id());
            }

            $data = [
                'title' => 'Welcome To Ecoland',
            ];
            return view('pages/index', $data);
        } else if (in_groups('admin')) {
            return redirect()->to('Admin/');
        }
    }
}
