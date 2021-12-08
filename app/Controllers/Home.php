<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Welcome To Ecoland',
        ];
        return view('pages/index',$data);
    }
}
