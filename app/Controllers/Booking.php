<?php

namespace App\Controllers;

use App\Models\BookingModel;
use App\Models\CustomerModel;
use App\Models\ItemsModel;
use App\Models\AdminModel;

class Booking extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url', 'auth']);
        $this->customerModel = new CustomerModel();
        $this->bookingModel = new BookingModel();
        $this->itemsModel = new ItemsModel();
        $this->adminModel = new AdminModel();
    }

    public function index()
    {
        if (in_groups('admin')) {
            $data = [
                'admin' => $this->adminModel->getAdminByUser(user_id()),
                'booking' => $this->bookingModel->getBooking(),
            ];
            return view('Admin/booking/admin', $data);
        } else if (in_groups('customer')) {
            $customer_id = $this->customerModel->getCustomerIdByUser(user_id())['customer_id'];
            $data = [
                'booking' => $this->bookingModel->getBookingCustomer($customer_id),
            ];
            return view('pages/book/customerbook', $data);
        }
    }

    public function create($item_id)
    {

        $upload = $this->request->getFile('bukti_booking');
        $upload->move('../public/images/proof/');
        $customer = $this->customerModel->getCustomerIdByUser(user_id());
        $customer_id = $customer['customer_id'];
        $data = [
            'booking_id' => '',
            'booking_price' => $this->request->getPost('harga_booking'),
            'booking_date_start' => $this->request->getPost('mulai_tanggal_booking'),
            'booking_date_stop' => $this->request->getPost('stop_tanggal_booking'),
            'booking_proof_of_payment' => '/images/proof/' . $upload->getName(),
            'booking_id_items' => $item_id,
            'booking_id_customer' => $customer_id,
            'booking_status' => 'pending'
        ];

        $this->bookingModel->createBook($data);
        echo '
                <script>
                    alert("Booking Berhasil Dibuat!");
                    window.location="' . base_url('Mybook') . '";
                </script>
            ';
    }

    public function pending($booking_id)
    {
        $data = [
            'booking_status' => 'pending'
        ];
        $this->bookingModel->updateBook($booking_id, $data);
        echo '
                <script>
                    alert("Booking Status:PENDING Berhasil!");
                    window.location="' . base_url('Admin/booking') . '";
                </script>
            ';
    }

    public function ongoing($booking_id)
    {
        $data = [
            'booking_status' => 'ongoing'
        ];
        $this->bookingModel->updateBook($booking_id, $data);
        echo '
                <script>
                    alert("Booking Status:ONGOING Berhasil!");
                    window.location="' . base_url('Admin/booking') . '";
                </script>
            ';
    }

    public function done($booking_id)
    {
        $data = [
            'booking_status' => 'done'
        ];
        $this->bookingModel->updateBook($booking_id, $data);
        echo '
                <script>
                    alert("Booking Status:DONE Berhasil!");
                    window.location="' . base_url('Admin/booking') . '";
                </script>
            ';
    }
}
