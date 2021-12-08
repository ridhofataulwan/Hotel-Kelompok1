<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'customer_id';

    public function getHotel($id = '')
    {
        if ($id == '') {
            return $this->db->table('hotel')->get()->getResultArray();
        } else {
            return $this->db->table('hotel')->where(['hotel_id' => $id])->get()->getResultArray();
        }
    }

    public function getCustomerByUser($id)
    {
        return $this->db->table('customer')->where(['user_id' => $id])->get()->getResultArray();
    }

    public function createCustomerProfile($user_id)
    {
        $data = [
            'customer_id' => '',
            'customer_name' => 'Masukkan nama anda',
            'customer_telp' => 'Masukkan no hp',
            'customer_address' => 'Masukkan alamat anda',
            'user_id' => $user_id
        ];
        return $this->db->table('customer')->insert($data);
    }
}
