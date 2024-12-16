<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJadwalGuru extends Model
{
    public function DataGuru()
    {
        return $this->db->table('tbl_guru')
            ->where('nama_guru', session()->get('nama_guru'))
            ->get()->getRowArray();
    }

    public function JadwalGuru($id_ta) {
        return $this->db->table('tbl_jadwal_pelajaran')
        ->join('tbl_mapel', 'tbl_mapel.id_mapel=tbl_jadwal_pelajaran.id_mapel', 'LEFT')
        ->join('tbl_guru', 'tbl_guru.id_guru=tbl_jadwal_pelajaran.id_guru', 'LEFT')
        ->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_jadwal_pelajaran.id_kelas', 'LEFT')
        ->join('tbl_jurusan', 'tbl_jurusan.id_jurusan=tbl_jadwal_pelajaran.id_jurusan', 'LEFT')
        ->join('tbl_ta', 'tbl_ta.id_ta=tbl_jadwal_pelajaran.id_ta', 'LEFT')
        // ->where('tbl_jadwal_pelajaran.id_jurusan', $data_siswa['id_jurusan'])
        ->where('nama_guru', session()->get('nama_guru'))
        ->where('tbl_jadwal_pelajaran.id_ta', $id_ta)
        ->get()->getResultArray();
    }

    public function DetailData($id_jadwal) {
        return $this->db->table('tbl_jadwal_pelajaran')
        ->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_jadwal_pelajaran.id_kelas', 'LEFT')
        ->join('tbl_mapel', 'tbl_mapel.id_mapel=tbl_jadwal_pelajaran.id_mapel', 'LEFT')
        ->join('tbl_jurusan', 'tbl_jurusan.id_jurusan=tbl_jadwal_pelajaran.id_jurusan', 'LEFT')
        ->where('tbl_jadwal_pelajaran.id_jadwal', $id_jadwal)
        ->get()->getRowArray();
    }

    public function NS($id_nilai)
    {
        $this->db->table('tbl_nilai')
            ->join('tbl_mapel', 'tbl_mapel.id_mapel=tbl_nilai.id_mapel', 'LEFT')
            ->join('tbl_siswa', 'tbl_siswa.id_siswa=tbl_nilai.id_siswa', 'LEFT')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_nilai.id_kelas', 'LEFT')
            ->join('tbl_jadwal_pelajaran', 'tbl_jadwal_pelajaran.id_jadwal=tbl_nilai.id_jadwal', 'LEFT')
            ->where('id_nilai', $id_nilai)
            ->get()->getRowArray();
    }

}
