<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class ControllerCustomer extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url', 'auth']);
        $this->customerModel = new CustomerModel();
    }

    public function customerProfile()
    {
        $data = [
            'customer' => $this->customerModel->getCustomerByUser(user_id()),
        ];
        return view('INI HALAMAN PROFIL CUSTOMER', $data);
    }

    public function updateCustomerPage($id_customer)
    {
        // Halamannya
    }

    public function updateCustomer($id_customer)
    {
        //Bagian getPost() isinya bisa diganti sesuai yang ada di view
        //Kalo ga, yang di view name dari inputnya yang ngikutin yang disini

        //Mungkin cek error input nambah datanya dibuat di html e aja kali ya, biar ga ribet
        $data = [
            'customer_name' => $this->request->getPost('nama_customer'),
            'customer_telp' => $this->request->getPost('telp_customer'),
            'customer_address' => $this->request->getPost('alamat_customer'),
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
