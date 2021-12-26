<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\BookingModel;
use App\Models\CustomerModel;
use App\Models\ItemsModel;

class Items extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url', 'auth']);
        $this->itemsModel = new ItemsModel();
        $this->customerModel = new CustomerModel();
        $this->adminModel = new AdminModel();
        $this->bookingModel = new BookingModel();
    }
    public function index()
    {
        if (in_groups('admin')) {
            $data = [
                'admin' => $this->adminModel->getAdminByUser(user_id()),
                'items' => $this->itemsModel->getItems(),
                'title' => 'Item List'
            ];
            return view('Admin/items/listItems', $data);
        } else if (in_groups('customer')) {
            $data = [
                'items' => $this->itemsModel->getItems(),
                'title' => 'Item List'
            ];
            return view('pages/book/rooms', $data);
        }
    }

    public function details($id_item)
    {
        if (in_groups('admin')) {
            $data = [
                'item' => $this->itemsModel->getItems($id_item),
                'title' => 'Detail'
            ];
            // dd($data);  
            return view('Admin/items/detail', $data);
        } else if (in_groups('customer')) {
            $data = [
                'items' => $this->itemsModel->getItems($id_item)
            ];
            return view('pages/book/details', $data);
        }
    }

    public function addItemPage()
    {
        $data = [
            'admin' => $this->adminModel->getAdminByUser(user_id()),
            'title' => "Add Items",
        ];
        return view('Admin/items/addItem', $data);
    }

    public function addItem()
    {
        $upload = $this->request->getFile('thumbnail_item');
        $upload->move('../public/images/items/');
        $data = [
            //Bagian getPost() isinya bisa diganti sesuai yang ada di view
            //Kalo ga, yang di view name dari inputnya yang ngikutin yang disini

            //Mungkin cek error input nambah datanya dibuat di html e aja kali ya, biar ga ribet
            'items_id' => '',
            'items_name' => $this->request->getPost('nama_item'),
            'items_type' => $this->request->getPost('tipe_item'),
            'items_city' => $this->request->getPost('kota_item'),
            'items_address' => $this->request->getPost('alamat_item'),
            'items_price' => $this->request->getPost('harga_item'),
            'items_desc' => $this->request->getPost('deskripsi_item'),
            'items_facility' => $this->request->getPost('fasilitas_item'),
            'items_thumbnail' => '/images/items/' . $upload->getName(),
        ];
        $this->itemsModel->addItem($data);
        echo '
        <script>
            alert("Item has been added successfully!");
            window.location="' . base_url('Admin/items') . '"
        </script>
        ';
    }

    public function delete($id)
    {
        //di tombol delete di view nya dikasih attribute onclick="return confirm('Anda yakin akan menghapus item?');"
        $this->itemsModel->delete($id);
        echo '
        <script>
            alert("Item has been deleted successfully!");
            window.location="' . base_url('Admin/items') . '"
        </script>
        ';
    }

    public function updateItemPage($item_id)
    {
        $data = [
            'admin' => $this->adminModel->getAdminByUser(user_id()),
            'item' => $this->itemsModel->getItems($item_id),
            'title' => 'Update',
        ];

        return view('admin/items/edit', $data);
    }

    public function updateItem()
    {
        $data = [
            //Bagian getPost() isinya bisa diganti sesuai yang ada di view
            //Kalo ga, yang di view name dari inputnya yang ngikutin yang disini

            //Mungkin cek error input nambah datanya dibuat di html e aja kali ya, biar ga ribet
            'items_name' => $this->request->getVar('nama_item'),
            'items_type' => $this->request->getVar('tipe_item'),
            'items_city' => $this->request->getVar('kota_item'),
            'items_address' => $this->request->getVar('alamat_item'),
            'items_price' => $this->request->getVar('harga_item'),
            'items_desc' => $this->request->getVar('deskripsi_item'),
            'items_facility' => $this->request->getVar('fasilitas_item'),
        ];
        $item_id = $this->request->getVar('item_id');
        $this->itemsModel->updateItem($item_id, $data);
        echo '
        <script>
            alert("Item has been updated successfully!");
            window.location="' . base_url('Admin/items') . '"
        </script>
        ';
    }
}
