<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelMapel;
use App\Models\ModelJurusan;

class Mapel extends BaseController
{
    public function __construct() {
        $this->ModelMapel = new ModelMapel();
        $this->ModelJurusan = new ModelJurusan();
    }

    public function index()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Mata Pelajaran',
            'menu' => 'master-data',
            'submenu' => 'mapel',
            'page' => 'mapel/v_mapel',
            'mapel' => $this->ModelMapel->AllData(),
            'jurusan' => $this->ModelJurusan->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function Detail($id_jurusan)
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Mata Pelajaran',
            'menu' => 'master-data',
            'submenu' => 'mapel',
            'page' => 'mapel/v_detail_mapel',
            'jurusan' => $this->ModelJurusan->DetailData($id_jurusan),
            'mapel' => $this->ModelMapel->AllDataMatkul($id_jurusan),
        ];
        return view('v_template_admin', $data);
    }

    public function InsertData($id_jurusan){
        if($this->validate([
            'kode_mapel' =>[
                'label' => 'Kode Mata Pelajaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'mapel' =>[
                'label' => 'Mata Pelajaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'kkm' =>[
                'label' => 'KKM',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'desk' =>[
                'label' => 'Deskripsi Pengetahuan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'k_desk' =>[
                'label' => 'Deskripsi Keterampilan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'smt' =>[
                'label' => 'Semester',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ]
        ])){
            // jika Valid
            $smt = $this->request->getPost('smt');
            if ($smt == 1 || $smt == 3 || $smt == 5) {
                $semester = 'Ganjil';
            }else{
                $semester = 'Genap';
            }
            $data = [
                'kode_mapel' => $this->request->getPost('kode_mapel'),
                'mapel' => $this->request->getPost('mapel'),
                'kkm' => $this->request->getPost('kkm'),
                'desk' => $this->request->getPost('desk'),
                'k_desk' => $this->request->getPost('k_desk'),
                'smt' => $this->request->getPost('smt'),
                'semester' => $semester,
                'id_jurusan' => $id_jurusan,
            ];
            $this->ModelMapel->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan');
            return redirect()->to('Mapel/Detail/' . $id_jurusan);

        }else{
            session()->setFlashdata('eror', 'Inputan Anda Bermasalah');
            return redirect()->to('Mapel/Detail/' . $id_jurusan);
        }
    }

    public function DeleteData($id_jurusan, $id_mapel){
        $data = [
            'id_mapel' => $id_mapel,
        ];
        $this->ModelMapel->DeleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Dihapus !!!');
        return redirect()->to('Mapel/Detail/' . $id_jurusan);

    }
}
