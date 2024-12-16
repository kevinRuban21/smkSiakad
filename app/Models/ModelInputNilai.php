<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelInputNilai extends Model
{
    protected $table      = 'tbl_nilai';
    protected $primaryKey ="id_nilai";
    protected $useTimestamps = false;
    protected $allowedFields = [
    //     'id_jadwal', 
    //     'id_siswa', 
    //     'id_kelas', 
    //     'id_mapel', 
        'kehadiran', 
        'uas', 
        'uts', 
        'tugas', 
        'na', 
        'huruf',
        'k_nilai',
        'k_huruf',
    ];
    
    public function DataNilai()
    {
        $this->db->table('tbl_nilai')
            ->selectSum('na')
            ->get()->getResultArray();
    }
    
    public function AllData($id_siswa)
    {
        return $this->db->table('tbl_nilai')
            ->join('tbl_mapel', 'tbl_mapel.id_mapel=tbl_nilai.id_mapel', 'LEFT')
            ->join('tbl_siswa', 'tbl_siswa.id_siswa=tbl_nilai.id_siswa', 'LEFT')
            ->where('tbl_nilai.id_siswa', $id_siswa)
            ->get()->getResultArray();
    }

    public function SimpanNilai($data)
    {
        $this->db->table('tbl_nilai')
        ->join('tbl_siswa', 'tbl_siswa.id_siswa=tbl_nilai.id_siswa', 'LEFT')
        ->where('id_nilai', $data['id_nilai'])
        ->update($data);
    }

    public function DetailData($id_nilai)
    {
        $this->db->table('tbl_nilai')
            ->join('tbl_mapel', 'tbl_mapel.id_mapel=tbl_nilai.id_mapel', 'LEFT')
            ->join('tbl_siswa', 'tbl_siswa.id_siswa=tbl_nilai.id_siswa', 'LEFT')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_nilai.id_kelas', 'LEFT')
            ->join('tbl_jadwal_pelajaran', 'tbl_jadwal_pelajaran.id_jadwal=tbl_nilai.id_jadwal', 'LEFT')
            ->where('id_nilai', $id_nilai)
            ->get()->getResultArray();
    }


    public function DataSiswa($id_jadwal)
    {
        $this->db->table('tbl_siswa')
            ->join('tbl_jurusan', 'tbl_jurusan.id_jurusan=tbl_siswa.id_jurusan', 'LEFT')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_siswa.id_kelas', 'LEFT')
            ->where('tbl_siswa.id_kelas', $id_jadwal)
            ->get()->getResultArray();
    }

    public function TmbhSiswa($data)
    {
        $this->db->table('tbl_nilai')
            ->insert($data);
    }

    public function HpsSiswa($data)
    {
        $this->db->table('tbl_nilai')->where('id_nilai', $data['id_nilai'])->delete($data);
    }




}
