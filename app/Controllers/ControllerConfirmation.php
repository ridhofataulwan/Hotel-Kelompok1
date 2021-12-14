<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class ControllerCustomer extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url', 'auth']);
        $this->customerModel = new CustomerModel();
        $this->confirmationModel = new ConfirmationModel();
    }
    
}
