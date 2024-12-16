<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMitra extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_mitra')->get()->getResultArray();
    }

    public function DetailData($id_mitra)
    {
        return $this->db->table('tbl_mitra')
            ->where('id_mitra', $id_mitra)
            ->get()->getRowArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_mitra')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_mitra')->where('id_mitra', $data['id_mitra'])->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_mitra')->where('id_mitra', $data['id_mitra'])->delete($data);
    }

}
