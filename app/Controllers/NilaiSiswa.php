<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelJadwalPelajaran;
use App\Models\ModelTahunAjaran;
use App\Models\ModelJurusan;
use App\Models\ModelMapel;
use App\Models\ModelJadwalSiswa;
use App\Models\ModelJadwalGuru;
use App\Models\ModelSekolah;
use App\Models\ModelInputNilai;

class NilaiSiswa extends BaseController
{
    public function __construct() {
        $this->ModelJadwalPelajaran = new ModelJadwalPelajaran();
        $this->ModelTahunAjaran = new ModelTahunAjaran();
        $this->ModelJurusan = new ModelJurusan();
        $this->ModelMapel = new ModelMapel();
        $this->ModelJadwalSiswa = new ModelJadwalSiswa();
        $this->ModelJadwalGuru = new ModelJadwalGuru();
        $this->ModelSekolah = new ModelSekolah();
        $this->ModelInputNilai = new ModelInputNilai();
    }

    public function index()
    {
        $data = [
            'judul' => 'Akademik',
            'subjudul' => 'Nilai Siswa',
            'menu' => 'akademik',
            'submenu' => 'nilai',
            'page' => 'akademik-siswa/nilai/nilai_siswa',
            'ta_aktif' => $this->ModelTahunAjaran->TaAktif(),
            'data_siswa' => $this->ModelJadwalSiswa->DataSiswa(),
        ];
        return view('v_template_siswa', $data);
    }

    public function PrintNilai()
    {
        $data = [
            'judul' => 'Print Nilai',
            'data_siswa' => $this->ModelJadwalSiswa->DataSiswa(),
            'sekolah' => $this->ModelSekolah->DetailData(),
            'ta_aktif' => $this->ModelTahunAjaran->TaAktif(),
        ];
        return view('akademik-siswa/nilai/v_print_nilai', $data);
    }

    // public function InsertData($id_jurusan)
    // {
    //     $ta = $this->ModelTahunAjaran->TaAktif();
    //     $data = [
    //         'id_jurusan' => $id_jurusan,
    //         'id_ta' => $ta['id_ta'],
    //         'id_kelas' => $this->request->getPost('id_kelas'),
    //         'id_mapel' => $this->request->getPost('id_mapel'),
    //         'id_guru' => $this->request->getPost('id_guru'),
    //         'hari' => $this->request->getPost('hari'),
    //         'waktu' => $this->request->getPost('waktu'),
    //     ];
    //     $this->ModelJadwalPelajaran->InsertData($data);
    //     session()->setFlashdata('update', 'Data Berhasil Tambahkan');
    //     return redirect()->to('JadwalPelajaran/Detail/' . $id_jurusan);
    // }

    // public function InsertData($id_jurusan){
    //     if($this->validate([
    //         'id_mapel' =>[
    //             'label' => 'Mata Pelajaran',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} Tidak Boleh Kosong !!!',  
    //             ]
    //         ],
    //         'id_guru' =>[
    //             'label' => 'Guru',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} Tidak Boleh Kosong',
    //             ]
    //         ],
    //         'id_kelas' =>[
    //             'label' => 'Kelas',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} Tidak Boleh Kosong',
    //             ]
    //         ],
    //         'hari' =>[
    //             'label' => 'Hari',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} Tidak Boleh Kosong',
    //             ]
    //         ],
    //         'waktu' =>[
    //             'label' => 'Waktu',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} Tidak Boleh Kosong',
    //             ]
    //         ],
    //     ])){
    //         // jika Valid
    //         $ta = $this->ModelTahunAjaran->TaAktif();
    //         $data = [
    //             'id_jurusan' => $id_jurusan,
    //             'id_ta' => $ta['id_ta'],
    //             'id_kelas' => $this->request->getPost('id_kelas'),
    //             'id_mapel' => $this->request->getPost('id_mapel'),
    //             'id_guru' => $this->request->getPost('id_guru'),
    //             'hari' => $this->request->getPost('hari'),
    //             'waktu' => $this->request->getPost('waktu'),
    //         ];
    //         $this->ModelJadwalPelajaran->InsertData($data);
    //         session()->setFlashdata('insert', 'Data Berhasil Ditambahkan');
    //         return redirect()->to('JadwalPelajaran/Detail/' . $id_jurusan);

    //     }else{
    //         return redirect()->to('JadwalPelajaran/Detail/' . $id_jurusan);
    //     }
    // }

    // public function UpdateData($id_kelas){
    //     $data = [
    //         'id_kelas' => $id_kelas,
    //         'kelas' => $this->request->getPost('kelas'),
    //     ];
    //     $this->ModelKelas->UpdateData($data);
    //     session()->setFlashdata('insert', 'Data Berhasil Diubah !!!');
    //     return redirect()->to('Kelas');

    // }

    // public function DeleteData($id_jadwal, $id_jurusan){
    //     $data = [
    //         'id_jadwal' => $id_jadwal,
    //     ];
    //     $this->ModelJadwalPelajaran->DeleteData($data);
    //     session()->setFlashdata('delete', 'Data Berhasil Dihapus !!!');
    //     return redirect()->to('JadwalPelajaran/Detail/' . $id_jurusan);

    // }
}
