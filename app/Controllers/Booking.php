<?php

namespace App\Controllers;

use App\Models\BookingModel;
use App\Models\CustomerModel;

class Booking extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url', 'auth']);
        $this->customerModel = new CustomerModel();
        $this->bookingModel = new BookingModel();
    }

    public function index()
    {
        // $data = [
        //     'book' => $this->bookingModel->getBooking()
        // ];
        return view('pages/book/rooms');
    }

    public function listBook()
    {
        // $data = [
        //     'bookCustomer' => $this->bookingModel->getBookingCustomer($this->customerModel->getCustomerIdByUser(user_id()))
        // ];
        return view('pages/book/details');
    }

    public function create($item_id)
    {
        $data = [
            'booking_id' => '',
            'booking_duration' => $this->request->getPost('durasi_booking'),
            'booking_price' => $this->request->getPost('harga_booking'),
            'booking_date_start' => $this->request->getPost('mulai_tanggal_booking'),
            'booking_date_stop' => $this->request->getPost('stop_tanggal_booking'),
            'booking_proof_of_payment' => $this->request->getPost('bukti_pembayaran_booking'),
            'booking_id_items' => $item_id,
            'booking_id_customer' => $this->customerModel->getCustomerIdByUser(user_id()),
            'booking_status' => 'pending'
        ];

        $this->bookingModel->createBook($data);
        echo '
                <script>
                    alert("Booking Berhasil Dibuat!");
                    window.location="' . base_url('Home/') . '";
                </script>
            ';
    }
}
