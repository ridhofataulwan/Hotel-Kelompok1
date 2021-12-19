<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customer extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url', 'auth']);
        $this->customerModel = new CustomerModel();
    }

    public function index()
    {
        $data = [
            'customer' => $this->customerModel->getCustomerByUser(user_id()),
        ];
        return view('User/profile', $data);
    }

    public function update($id_customer)
    {
        $data = [
            'customer' => $this->customerModel->getCustomerById($id_customer)
        ];
        return view('User/editProfile', $data);
    }

    public function updateCustomer($id_customer)
    {
        //Bagian getPost() isinya bisa diganti sesuai yang ada di view
        //Kalo ga, yang di view name dari inputnya yang ngikutin yang disini

        //Mungkin cek error input nambah datanya dibuat di html e aja kali ya, biar ga ribet

        $data = [

            'customer_name' => $this->request->getVar('nama_customer'),
            'customer_telp' => $this->request->getVar('telp_customer'),
            'customer_address' => $this->request->getVar('alamat_customer'),
        ];

        $this->customerModel->updateCustomerProfile($id_customer, $data);
        echo '
                <script>
                    alert("Profil Anda Berhasil Dirubah");
                    window.location="' . base_url('Home/') . '";
                </script>
            ';
    }
}
