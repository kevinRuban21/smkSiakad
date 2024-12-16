<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPembayaran extends Model
{

    protected $table      = 'tbl_pemb_siswa';
    protected $primaryKey ="id_pemb_siswa";
    protected $useTimestamps = false;
    protected $allowedFields = [ 
        'id_siswa',
        'pemb_raport',
    ];

    public function AllData()
    {
        return $this->db->table('tbl_pemb_siswa')
            ->join('tbl_siswa', 'tbl_siswa.id_siswa=tbl_pemb_siswa.id_siswa', 'LEFT')
            ->join('tbl_jurusan', 'tbl_jurusan.id_jurusan=tbl_pemb_siswa.id_jurusan', 'LEFT')
            ->get()->getResultArray();
    }

    public function DataSiswa($id_siswa)
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_jurusan', 'tbl_jurusan.id_jurusan=tbl_siswa.id_jurusan', 'LEFT')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_siswa.id_kelas', 'LEFT')
            ->where('nama_siswa', $id_siswa)
            ->get()->getRowArray();
    }

    public function SimpanPemb($data)
    {
        $this->db->table('tbl_pemb_siswa')
        ->join('tbl_siswa', 'tbl_siswa.id_siswa=tbl_pemb_siswa.id_siswa', 'LEFT')
        ->join('tbl_jurusan', 'tbl_jurusan.id_jurusan=tbl_pemb_siswa.id_jurusan', 'LEFT')
        ->where('id_pemb_siswa', $data['id_pemb_siswa'])
        ->update($data);
    }

    public function TmbhSiswa($data)
    {
        $this->db->table('tbl_pemb_siswa')
            ->insert($data);
    }

}
