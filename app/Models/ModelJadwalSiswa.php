<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJadwalSiswa extends Model
{
    public function DataSiswa()
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_jurusan', 'tbl_jurusan.id_jurusan=tbl_siswa.id_jurusan', 'LEFT')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_siswa.id_kelas', 'LEFT')
            ->where('nama_siswa', session()->get('nama_siswa'))
            ->get()->getRowArray();
    }

    public function JadwalMapel() {
        return $this->db->table('tbl_jadwal_pelajaran')
            ->join('tbl_mapel', 'tbl_mapel.id_mapel=tbl_jadwal_pelajaran.id_mapel', 'LEFT')
            ->join('tbl_guru', 'tbl_guru.id_guru=tbl_jadwal_pelajaran.id_guru', 'LEFT')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_jadwal_pelajaran.id_kelas', 'LEFT')
            ->where('tbl_jadwal_pelajaran.id_kelas')
            ->get()->getResultArray();
    }

    public function NilaiSiswa($id_siswa) {
        return $this->db->table('tbl_nilai')
            ->join('tbl_siswa', 'tbl_siswa.id_siswa=tbl_nilai.id_siswa', 'LEFT')
            ->where('tbl_nilai.id_siswa', $id_siswa)
            ->get()->getResultArray();
    }

    // public function InsertData($data)
    // {
    //     $this->db->table('tbl_jadwal_pelajaran')->insert($data);
    // }

    // public function DetailData($id_mapel)
    // {
    //     return $this->db->table('tbl_mapel')
    //         ->where('id_mapel', $id_mapel)
    //         ->get()->getRowArray();
    // }

    // public function AllDataMatkul($id_jurusan)
    // {
    //     return $this->db->table('tbl_mapel')
    //         ->where('id_jurusan', $id_jurusan)
    //         ->orderBy('smt', 'ASC')
    //         ->get()->getResultArray();
    // }

}
