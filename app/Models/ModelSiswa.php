<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSiswa extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_jurusan', 'tbl_jurusan.id_jurusan=tbl_siswa.id_jurusan', 'LEFT')
            ->orderBy('id_siswa', 'DESC')
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_siswa')->insert($data);
    }

    public function DetailData($id_siswa)
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_jurusan', 'tbl_jurusan.id_jurusan=tbl_siswa.id_jurusan', 'LEFT')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_siswa.id_kelas', 'LEFT')
            ->where('id_siswa', $id_siswa)
            ->get()->getRowArray();
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_siswa')
        ->where('id_siswa', $data['id_siswa'])
        ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_siswa')->where('id_siswa', $data['id_siswa'])->delete($data);
    }
}
