<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemsModel extends Model
{
    protected $table = 'items';
    protected $primaryKey = 'items_id';
    protected $allowedFields = ['items_id','items_name','items_type','items_city','items_address','items_price','items_desc','items_facility','items_images' ];
    public function getItems($items_id = true)
    {
         if ($items_id == true) {
             return $this->db->table('items')->join('items_image', 'items.items_images = items_image.items_image_id')->get()->getResultArray();
         } else {
             return $this->where(['items_id' => $items_id])->first();
         }
    }

    public function addItem($data)
    {
        return $this->db->table('items')->insert($data);
    }

    public function deleteItem($id)
    {
        return $this->db->table('items')->delete(['items_id' => $id]);
    }

    public function updateItem($id, $data)
    {
        return $this->db->table('items')->where(['items_id' => $id])->update($data);
    }
}
