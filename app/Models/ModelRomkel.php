<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRomkel extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_romkel')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_romkel.id_kelas', 'LEFT')
            ->join('tbl_ta', 'tbl_ta.id_ta=tbl_romkel.id_ta', 'LEFT')
            ->where('tbl_ta.status', 1)
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_romkel')->insert($data);
    }

    public function DetailData($id_romkel)
    {
        return $this->db->table('tbl_romkel')
            ->where('id_romkel', $id_romkel)
            ->get()->getRowArray();
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_romkel')->where('id_romkel', $data['id_romkel'])->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_kelas')->where('id_kelas', $data['id_kelas'])->delete($data);
    }
}
