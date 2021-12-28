<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'admin_id';

    public function getAdminByUser($user_id = false)
    {
        if ($user_id == false) {
            return $this->db->table('admin')->join('users', 'admin.user_id = users.id')->get()->getResultArray();
        }
        return $this->db->table('admin')->where(['user_id' => $user_id])->get()->getResultArray()[0];
    }

    public function getAdminById($admin_id)
    {
        return $this->db->table('admin')->where(['customer_id' => $admin_id])->get()->getResultArray()[0];
    }

    public function getAdminIdByUser($user_id = false)
    {
        if ($user_id == false) {
            return $this->findAll();
        }
        return $this->where(['user_id' => $user_id])->first();
    }


    public function CreateAdminProfile($user_id)
    {
        $data = [
            'admin_id' => '',
            'admin_name' => 'Masukkan nama anda',
            'admin_photo' => 'Masukkan no hp',
            'user_id' => $user_id
        ];
        return $this->db->table('admin')->insert($data);
    }
}
