<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelGallery extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_gallery')->get()->getResultArray();
    }

    public function DetailData($id_gallery)
    {
        return $this->db->table('tbl_gallery')
            ->where('id_gallery', $id_gallery)
            ->get()->getRowArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_gallery')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_gallery')->where('id_gallery', $data['id_gallery'])->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_gallery')->where('id_gallery', $data['id_gallery'])->delete($data);
    }

}
