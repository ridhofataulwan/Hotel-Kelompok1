<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table = 'booking';
    protected $primaryKey = 'booking_id';

    public function getBooking($booking_id = '')
    {
        if ($booking_id == '') {
            return $this->db->table('booking')->join('items', 'booking.booking_id_items = items.items_id')
                ->join('customer', 'booking.booking_id_customer = customer.customer_id')->get()->getResultArray();
        } else {
            return $this->db->table('booking')->join('items', 'booking.booking_id_items = items.items_id')
                ->join('customer', 'booking.booking_id_customer = customer.customer_id')
                ->where(['booking_id' => $booking_id])->get()->getResultArray()[0];
        }
    }

    public function getBookingAll()
    {
        return $this->db->table('booking')->get()->getResultArray();
    }

    public function getBookingCustomer($customer_id)
    {
        return $this->db->table('booking')->join('items', 'booking.booking_id_items = items.items_id')
            ->join('customer', 'booking.booking_id_customer = customer.customer_id')
            ->where(['booking.booking_id_customer' => $customer_id])->get()->getResultArray();
    }

    public function createBook($data)
    {
        return $this->db->table('booking')->insert($data);
    }

    public function updateBook($booking_id, $data)
    {
        return $this->db->table('booking')->where(['booking_id' => $booking_id])->update($data);
    }
}
