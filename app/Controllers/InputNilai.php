<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelJadwalPelajaran;
use App\Models\ModelTahunAjaran;
use App\Models\ModelJurusan;
use App\Models\ModelMapel;
use App\Models\ModelJadwalGuru;
use App\Models\ModelJadwalSiswa;
use App\Models\ModelSekolah;
use App\Models\ModelKelas;
use App\Models\ModelSiswa;
use App\Models\ModelInputNilai;

class InputNilai extends BaseController
{
    
    public function __construct() {
        $this->ModelJadwalPelajaran = new ModelJadwalPelajaran();
        $this->ModelTahunAjaran = new ModelTahunAjaran();
        $this->ModelJurusan = new ModelJurusan();
        $this->ModelMapel = new ModelMapel();
        $this->ModelJadwalGuru = new ModelJadwalGuru();
        $this->ModelJadwalSiswa = new ModelJadwalSiswa();
        $this->ModelSekolah = new ModelSekolah();
        $this->ModelKelas = new ModelKelas();
        $this->ModelSiswa = new ModelSiswa();
        $this->ModelInputNilai = new ModelInputNilai();
    }

    public function index()
    {
        $ta = $this->ModelTahunAjaran->TaAktif();
        $data = [
            'judul' => 'Akademik',
            'subjudul' => 'Input Nilai Siswa',
            'menu' => 'akademik',
            'submenu' => 'nilai',
            'page' => 'akademik-guru/nilai/v_data_kelas',
            'ta_aktif' => $this->ModelTahunAjaran->TaAktif(),
            'jadwal' => $this->ModelJadwalGuru->JadwalGuru($ta['id_ta']),
        ];
        return view('v_template_guru', $data);
    }

    public function DataSiswa($id_jadwal)
    {
        $data = [
            'judul' => 'Akademik',
            'subjudul' => 'Data Siswa',
            'menu' => 'akademik',
            'submenu' => 'nilai',
            'page' => 'akademik-guru/nilai/v_data_siswa',
            'ta_aktif' => $this->ModelTahunAjaran->TaAktif(),
            'jadwal' => $this->ModelJadwalGuru->DetailData($id_jadwal),
        ];
        return view('v_template_guru', $data);
    }

    public function NilaiSiswa($id_nilai, $id_siswa)
    {
        $db = \Config\Database::connect();
        $ns = $db->table('tbl_nilai')
            ->join('tbl_jadwal_pelajaran', 'tbl_jadwal_pelajaran.id_jadwal=tbl_nilai.id_jadwal', 'LEFT')
            ->join('tbl_siswa', 'tbl_siswa.id_siswa=tbl_nilai.id_siswa', 'LEFT')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_nilai.id_kelas', 'LEFT')
            ->where('id_nilai', $id_nilai)
            ->where('tbl_nilai.id_siswa', $id_siswa)
            ->get()->getResultArray();
        $data = [
            'judul' => 'Akademik',
            'subjudul' => 'Input Nilai Siswa',
            'menu' => 'akademik',
            'submenu' => 'nilai',
            'page' => 'akademik-guru/nilai/v_input_nilai',
            'ta_aktif' => $this->ModelTahunAjaran->TaAktif(),
            'siswa' => $this->ModelSiswa->DetailData($id_siswa),
            'nilai' => $ns,
        ];
        // dd($nilai);
        return view('v_template_guru', $data);
    }

    public function SimpanNilai($id_nilai, $id_siswa)
    {
        $kehadiran = $this->request->getPost('kehadiran');
        $uas = $this->request->getPost('uas');
        $uts = $this->request->getPost('uts');
        $tugas = $this->request->getPost('tugas');
        $huruf = $this->request->getPost('huruf');
        $knilai = $this->request->getPost('k_nilai');
        $predikat = $this->request->getPost('k_huruf');
        $na = $this->request->getPost('na');
        $na = ($kehadiran + $uas + $uts + $tugas)/4;
            if ($na >= 85) {
                $huruf = 'SANGAT BAIK';
            }else if ($na >= 70) {
                $huruf = 'BAIK';
            }else if ($na >= 60) {
                $huruf = 'CUKUP';
            }else if ($na >= 50) {
                $huruf = 'KURANG';
            }else{
                $huruf = 'SANGAT KURANG';
            };
            if ($knilai >= 85) {
                $predikat = 'SANGAT BAIK';
            }else if ($knilai >= 70) {
                $predikat = 'BAIK';
            }else if ($knilai >= 60) {
                $predikat = 'CUKUP';
            }else if ($knilai >= 50) {
                $predikat = 'KURANG';
            }else{
                $predikat = 'SANGAT KURANG';
            }
            $data = [
                'id_nilai' => $id_nilai,
                'kehadiran' => $kehadiran,
                'uas' => $uas,
                'uts' => $uts,
                'tugas' => $tugas,
                'na' => $na,
                'huruf' => $huruf,
                'k_nilai' => $knilai,
                'k_huruf' => $predikat,
            ]; 
            $this->ModelInputNilai->save($data);
        session()->setFlashdata('update', 'Nilai Berhasil DiInput');
        return redirect()->to('InputNilai/NilaiSiswa/' . $id_nilai . '/' . $id_siswa);
        
    }

    public function TmbhSiswa($id_siswa, $id_kelas, $id_mapel, $id_jadwal, $ta_aktif){
        $data = [
            'id_siswa' => $id_siswa,
            'id_kelas' => $id_kelas,
            'id_mapel' => $id_mapel,
            'id_jadwal' => $id_jadwal,
            'id_ta' => $ta_aktif,
        ];
        $this->ModelInputNilai->TmbhSiswa($data);
        session()->setFlashdata('update', 'Siswa Berhasil Ditambahkan !!!');
        return redirect()->to('InputNilai/DataSiswa/' . $id_jadwal);

    }

    public function HpsSiswa($id_nilai, $id_jadwal){
        $data = [
            'id_nilai' => $id_nilai,
        ];
        $this->ModelInputNilai->HpsSiswa($data);
        session()->setFlashdata('delete', 'Siswa Berhasil Dihapus !!!');
        return redirect()->to('InputNilai/DataSiswa/' . $id_jadwal);

    }

    // public function NilaiSiswa($id_nilai)
    // {
    //     $data = [
    //         'judul' => 'Akademik',
    //         'subjudul' => 'Input Nilai Siswa',
    //         'menu' => 'akademik',
    //         'submenu' => 'nilai',
    //         'page' => 'akademik-guru/nilai/v_input_nilai',
    //         'ta_aktif' => $this->ModelTahunAjaran->TaAktif(),
    //         'nilai' => $this->ModelInputNilai->AllData($id_nilai),
    //     ];
    //     return view('v_template_guru', $data);
    // }


    // public function PrintJadwal()
    // {
    //     $data = [
    //         'judul' => 'Print Jadwal',
    //         'data_siswa' => $this->ModelJadwalSiswa->DataSiswa(),
    //         'sekolah' => $this->ModelSekolah->DetailData(),
    //         'ta_aktif' => $this->ModelTahunAjaran->TaAktif(),
    //     ];
    //     return view('akademik-siswa/v_print_jadwal', $data);
    // }

    
}
