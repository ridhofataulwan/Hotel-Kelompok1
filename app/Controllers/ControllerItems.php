<?php

namespace App\Controllers;

use App\Models\ItemsModel;

class ControllerItems extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url', 'auth']);
        $this->itemsModel = new ItemsModel();
    }
    public function index()
    {
        if (in_groups('admin')) {

            return view('Admin/index');
        } else if (in_groups('customer')) {
            return redirect()->to('Admin/');
        }
    }

    public function listItems()
    {
        $data = [
            'items' => $this->itemsModel->getItems(),
        ];
        return view('HALAMAN LIST ITEMSNYA', $data);
    }

    public function oneItem($id_item)
    {
        $data = [
            'item' => $this->itemsModel->getItems($id_item)
        ];
        return view('HALAMAN DETAIL ITEM NYA', $data);
    }

    public function addItemPage()
    {
        $data = [
            'itemBaru' => True, //Hmmm, ini buat nambah bedain antara form tambah atau form edit (formnya pake satu view aja)
        ];
        return view('HALAMAN FORM NYA', $data);
    }

    public function addItem()
    {
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
            'items_images' => '',
        ];
        $this->itemsModel->addItem($data);
        echo '
                <script>
                    alert("Item Berhasil Ditambahkan");
                    window.location="' . base_url('Admin') . '";
                </script>
            ';
    }

    public function deleteItem($id)
    {
        //di tombol delete di view nya dikasih attribute onclick="return confirm('Anda yakin akan menghapus item?');"
        $this->itemsModel->deleteItem($id);
        echo '
                <script>
                    alert("Item Berhasil Dihapus");
                    window.location="' . base_url('Admin') . '";
                </script>
            ';
    }

    public function updateItemPage($item_id)
    {
        $data = [
            'item' => $this->itemsModel->getItem($item_id)[0],
            'itemBaru' => False,
        ];

        return view('HALAMAN FORM NYA', $data);
    }

    public function updateItem($item_id)
    {
        $data = [
            //Bagian getPost() isinya bisa diganti sesuai yang ada di view
            //Kalo ga, yang di view name dari inputnya yang ngikutin yang disini

            //Mungkin cek error input nambah datanya dibuat di html e aja kali ya, biar ga ribet
            'items_name' => $this->request->getPost('nama_item'),
            'items_type' => $this->request->getPost('tipe_item'),
            'items_city' => $this->request->getPost('kota_item'),
            'items_address' => $this->request->getPost('alamat_item'),
            'items_price' => $this->request->getPost('harga_item'),
            'items_desc' => $this->request->getPost('deskripsi_item'),
            'items_facility' => $this->request->getPost('fasilitas_item'),
        ];
        $this->itemsModel->updateItem($item_id, $data);
        echo '
                <script>
                    alert("Item Berhasil Diubah");
                    window.location="' . base_url('Admin') . '";
                </script>
            ';
    }
}
