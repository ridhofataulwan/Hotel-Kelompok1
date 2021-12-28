<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\CustomerModel;

class Customer extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url', 'auth']);
        $this->customerModel = new CustomerModel();
        $this->adminModel = new AdminModel();
    }

    public function index()
    {
        if (in_groups('admin')) {
            $data = [
                'admin' => $this->adminModel->getAdminByUser(user_id()),
                'customer' => $this->customerModel->getCustomerAll(),
            ];
            return view('Admin/customer/admin', $data);
        } else if (in_groups('customer')) {
            $data = [
                'customer' => $this->customerModel->getCustomerByUser(user_id())[0],
            ];
            return view('User/profile', $data);
        }
    }

    public function update()
    {
        $data = [
            'customer' => $this->customerModel->getCustomerByUser(user_id())[0]
        ];
        // $query = $this->builder->get();
        // $data['users'] = $query->getResult();
        return view('User/editProfile', $data);
    }

    public function updateCustomer()
    {
        //Bagian getPost() isinya bisa diganti sesuai yang ada di view
        //Kalo ga, yang di view name dari inputnya yang ngikutin yang disini

        //Mungkin cek error input nambah datanya dibuat di html e aja kali ya, biar ga ribet

        $data = [

            'customer_name' => $this->request->getVar('nama_customer'),
            'customer_telp' => $this->request->getVar('telp_customer'),
            'customer_address' => $this->request->getVar('alamat_customer'),
        ];
        $id_customer = $this->customerModel->getCustomerIdByUser(user_id())['customer_id'];
        $this->customerModel->updateCustomerProfile($id_customer, $data);
        session()->setFlashData('pesan', 'Data has been saved successfully!');
        echo '
        <script>
            window.location="' . base_url('Profile') . '"
        </script>
        ';
    }
}
