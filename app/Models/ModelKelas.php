<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKelas extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_kelas')
            ->get()->getResultArray();
    }

    public function AllDataKelas($id_jurusan)
    {
        return $this->db->table('tbl_kelas')
            ->where('id_jurusan', $id_jurusan)
            ->orderBy('id_kelas', 'ASC')
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_kelas')->insert($data);
    }

    public function DetailData($id_kelas)
    {
        return $this->db->table('tbl_kelas')
            ->where('id_kelas', $id_kelas)
            ->get()->getRowArray();
    }

    public function DetailKelas($id_kelas)
    {
        return $this->db->table('tbl_kelas')
            ->where('id_kelas', $id_kelas)
            ->get()->getRowArray();
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_kelas')->where('id_kelas', $data['id_kelas'])->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_kelas')->where('id_kelas', $data['id_kelas'])->delete($data);
    }

    public function DataSiswa($id_kelas)
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_jurusan', 'tbl_jurusan.id_jurusan=tbl_siswa.id_jurusan', 'LEFT')
            ->where('id_kelas', $id_kelas)
            ->orderBy('id_siswa', 'DESC')
            ->get()->getResultArray();
    }

    public function JmlhSiswa($id_kelas)
    {
        return $this->db->table('tbl_siswa')
            ->where('id_kelas', $id_kelas)
            ->countAllResults();
    }

    public function SiswaBelum()
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_jurusan', 'tbl_jurusan.id_jurusan=tbl_siswa.id_jurusan', 'LEFT')
            ->where('id_kelas', null)
            ->orderBy('id_siswa', 'DESC')
            ->get()->getResultArray();
    }

    public function UpdateSiswa($data)
    {
        $this->db->table('tbl_siswa')
            ->where('id_siswa', $data['id_siswa'])
            ->update($data);
    }
}
