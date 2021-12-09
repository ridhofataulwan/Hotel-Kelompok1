<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemsModel extends Model
{
    protected $table = 'items';
    protected $primaryKey = 'items_id';

    public function getItems($id = '')
    {
        if ($id == '') {
            return $this->db->table('items')->join('items_image', 'items.items_images = items_image.items_image_id')->get()->getResultArray();
        } else {
            return $this->db->table('items')->where(['items_id' => $id])->get()->getResultArray();
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
