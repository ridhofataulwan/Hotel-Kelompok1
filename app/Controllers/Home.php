<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\BookingModel;
use App\Models\CustomerModel;
use App\Models\ItemsModel;

class Home extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url', 'auth']);
        $this->itemsModel = new ItemsModel();
        $this->customerModel = new CustomerModel();
        $this->adminModel = new AdminModel();
        $this->bookingModel = new BookingModel();
    }
    public function index()
    {
        if (in_groups('admin')) {
            $dataAdmin = [
                'title' => 'Dashboard',
                'admin' => $this->adminModel->getAdminByUser(user_id()),
                'items' => $this->itemsModel->getItems(),
                'customer' => $this->customerModel->getCustomerIdByUser(),
                'adminAll' => $this->adminModel->getAdminByUser(),
                'booking' => $this->bookingModel->getBookingAll(),
            ];
            return view('Admin/dashboard', $dataAdmin);
        } else if (in_groups('customer')) {
            $dataCustomer = [
                'title' => 'Homepage',
                'items' => $this->itemsModel->getItems()
            ];

            $customer = $this->customerModel->getCustomerByUser(user_id());
            if (empty($customer)) {
                //Ini buat bikin profile customer klo baru create(isi = default)
                $this->customerModel->createCustomerProfile(user_id());
            }
            return view('pages/index', $dataCustomer);
        } else {
            $dataCustomer = [
                'title' => 'Homepage',
                'items' => $this->itemsModel->getItems()
            ];
            return view('pages/index', $dataCustomer);
        }
    }
}
