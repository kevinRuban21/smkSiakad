<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelHalamanGuru extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_guru')
            ->join('tbl_mapel', 'tbl_mapel.id_mapel=tbl_guru.id_mapel', 'LEFT')
            ->orderBy('id_guru', 'DESC')
            ->get()->getResultArray();
    }

    public function TampilData($id_guru)
    {
        return $this->db->table('tbl_guru')
            ->where('id_guru', $id_guru)
            ->get()->getRowArray();
    }

    public function JmlhJurusan(){
        return $this->db->table('tbl_jurusan')->countAll();
    }
    public function JmlhGuru(){
        return $this->db->table('tbl_guru')->countAll();
    }
    public function JmlhSiswa(){
        return $this->db->table('tbl_siswa')->countAll();
    }
    public function JmlhKelas(){
        return $this->db->table('tbl_kelas')->countAll();
    }

}
