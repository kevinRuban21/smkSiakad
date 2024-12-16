<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelJadwalPelajaran;
use App\Models\ModelTahunAjaran;
use App\Models\ModelJurusan;
use App\Models\ModelMapel;
use App\Models\ModelGuru;

class JadwalPelajaran extends BaseController
{
    public function __construct() {
        $this->ModelJadwalPelajaran = new ModelJadwalPelajaran();
        $this->ModelTahunAjaran = new ModelTahunAjaran();
        $this->ModelJurusan = new ModelJurusan();
        $this->ModelMapel = new ModelMapel();
        $this->ModelGuru = new ModelGuru();
    }

    public function index()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Jadwal Pelajaran',
            'menu' => 'master-data',
            'submenu' => 'jadwal',
            'page' => 'jadwal-pelajaran/v_index',
            'ta_aktif' => $this->ModelTahunAjaran->TaAktif(),
            'jurusan' => $this->ModelJurusan->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function Detail($id_jurusan)
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Jadwal Pelajaran',
            'menu' => 'master-data',
            'submenu' => 'jadwal',
            'page' => 'jadwal-pelajaran/v_detail',
            'jadwal' => $this->ModelJadwalPelajaran->AllData($id_jurusan),
            'guru' => $this->ModelGuru->AllData(),
            'jurusan' => $this->ModelJurusan->DetailData($id_jurusan),
            'ta_aktif' => $this->ModelTahunAjaran->TaAktif(),
            'mapel' => $this->ModelJadwalPelajaran->Mapel($id_jurusan),
            'kelas' => $this->ModelJadwalPelajaran->Kelas($id_jurusan),
        ];
        return view('v_template_admin', $data);
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

    public function InsertData($id_jurusan){
        if($this->validate([
            'id_mapel' =>[
                'label' => 'Mata Pelajaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!',  
                ]
            ],
            'id_guru' =>[
                'label' => 'Guru',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'id_kelas' =>[
                'label' => 'Kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'hari' =>[
                'label' => 'Hari',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'waktu' =>[
                'label' => 'Waktu',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
        ])){
            // jika Valid
            $ta = $this->ModelTahunAjaran->TaAktif();
            $data = [
                'id_jurusan' => $id_jurusan,
                'id_ta' => $ta['id_ta'],
                'id_kelas' => $this->request->getPost('id_kelas'),
                'id_mapel' => $this->request->getPost('id_mapel'),
                'id_guru' => $this->request->getPost('id_guru'),
                'hari' => $this->request->getPost('hari'),
                'waktu' => $this->request->getPost('waktu'),
            ];
            $this->ModelJadwalPelajaran->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan');
            return redirect()->to('JadwalPelajaran/Detail/' . $id_jurusan);

        }else{
            return redirect()->to('JadwalPelajaran/Detail/' . $id_jurusan);
        }
    }

    // public function UpdateData($id_kelas){
    //     $data = [
    //         'id_kelas' => $id_kelas,
    //         'kelas' => $this->request->getPost('kelas'),
    //     ];
    //     $this->ModelKelas->UpdateData($data);
    //     session()->setFlashdata('insert', 'Data Berhasil Diubah !!!');
    //     return redirect()->to('Kelas');

    // }

    public function DeleteData($id_jadwal, $id_jurusan){
        $data = [
            'id_jadwal' => $id_jadwal,
        ];
        $this->ModelJadwalPelajaran->DeleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Dihapus !!!');
        return redirect()->to('JadwalPelajaran/Detail/' . $id_jurusan);

    }
}
