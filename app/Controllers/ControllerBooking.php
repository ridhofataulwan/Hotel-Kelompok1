<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class ControllerBooking extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url', 'auth']);
        $this->customerModel = new CustomerModel();
        $this->bookingModel = new BookingModel();
    }

    public function createNewBookPage(){
        //halaman
    }

    public function createNewBook(){
        $data = [
            'booking_id' => '',
            'booking_duration' => $this->request->getPost('durasi_booking'),
            'booking_price' => $this->request->getPost('harga_booking'),
            'booking_date_start' => $this->request->getPost('mulai_tanggal_booking'),
            'booking_date_stop' => $this->request->getPost('stop_tanggal_booking'),
            'booking_proof_of_payment' => $this->request->getPost('bukti_pembayaran_booking'),
            'booking_id_items' => 'BELUM KE RESOLVE GIMANA, APAKAH PAKE CHART KERANJANG??',
            'booking_id_customer' => $this->request->getPost('id_customer_booking'),
            'booking_status' => 'pending'
        ]

        $this->bookingModel->createBook($data);
        echo '
                <script>
                    alert("Booking Berhasil Dibuat!");
                    window.location="' . base_url('Home/') . '";
                </script>
            ';
    }
}
