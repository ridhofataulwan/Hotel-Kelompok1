<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\ItemsModel;

class Admin extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url', 'auth']);
        $this->itemsModel = new ItemsModel();
        $this->adminModel = new AdminModel();
    }
    public function index()
    {
        if (in_groups('admin')) {
            $dataAdmin = [
                'admin' => $this->adminModel->getAdminByUser(user_id()),
                'admins' => $this->adminModel->getAdminByUser(),
            ];

            return view('Admin/adminList/admin', $dataAdmin);
        } else if (in_groups('customer')) {
            $dataCustomer = [
                'title' => 'Homepage',
                'items' => $this->itemsModel->getItems()
            ];

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
