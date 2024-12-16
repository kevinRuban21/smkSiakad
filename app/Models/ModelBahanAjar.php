<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBahanAjar extends Model
{

    public function AllData()
    {
        return $this->db->table('tbl_ba')->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_ba')->insert($data);
    }

    public function DetailData($id_ba)
    {
        return $this->db->table('tbl_ba')->where('id_ba', $id_ba)->get()->getRowArray();
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_ba')->where('id_ba', $data['id_ba'])->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_ba')->where('id_ba', $data['id_ba'])->delete($data);
    }
}
