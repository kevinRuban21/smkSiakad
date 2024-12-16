<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTahunAjaran extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_ta')->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_ta')->insert($data);
    }

    public function DetailData($id_ta)
    {
        return $this->db->table('tbl_ta')->where('id_ta', $id_ta)->get()->getRowArray();
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_ta')->where('id_ta', $data['id_ta'])->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_ta')->where('id_ta', $data['id_ta'])->delete($data);
    }

    public function TaAktif()
    {
        return $this->db->table('tbl_ta')
            ->where('status', 1)
            ->get()->getRowArray();
    }

    public function ResetTa()
    {
        $this->db->table('tbl_ta')->update(['status' => 0]);
    }
}
