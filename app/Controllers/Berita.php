<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelBerita;

class Berita extends BaseController
{
    public function __construct() {
        $this->ModelBerita = new ModelBerita();
    }


    public function index()
    {
        $data = [
            'judul' => 'Berita',
            'subjudul' => 'Berita',
            'menu' => 'berita',
            'submenu' => '',
            'page' => 'berita/v_index',
            'berita' => $this->ModelBerita->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function View($id_berita)
    {
        $data = [
            'judul' => 'Berita',
            'subjudul' => 'View Berita',
            'menu' => 'berita',
            'submenu' => '',
            'page' => 'berita/v_view',
            'berita' => $this->ModelBerita->DetailData($id_berita),
        ];
        return view('v_template_admin', $data);
    }

    public function Input()
    {
        $data = [
            'judul' => 'Berita',
            'subjudul' => 'Input Berita',
            'menu' => 'berita',
            'submenu' => 'berita',
            'page' => 'berita/v_input',
        ];
        return view('v_template_admin', $data);
    }

    public function InsertData(){
        if($this->validate([
            'judul_berita' =>[
                'label' => 'Judul Berita',
                'rules' => 'required|is_unique[tbl_berita.judul_berita]',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!',
                    'is_unique' => '{field} Judul ini Sudah ada !!!',   
                ]
            ],
            'isi_berita' =>[
                'label' => 'Isi Berita',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'gambar' =>[
                'label' => 'Gambar',
                'rules' => 'uploaded[gambar]|max_size[gambar, 2000]',
                'errors' => [
                    'uploaded' => '{field} Tidak Boleh Kosong',
                    'max_size' => 'Ukuran {field} Max 2 MB',
                ]
            ]
        ])){
            // jika Valid
            $gambar = $this->request->getFile('gambar');
            $nama_file = $gambar->getRandomName();
            $data = [
                'judul_berita' => $this->request->getPost('judul_berita'),
                'slug_berita' => url_title($this->request->getPost('judul_berita'), '-', true),
                'isi_berita' => $this->request->getPost('isi_berita'),
                'id_user' => session()->get('id_user'),
                'tgl_berita' => date('Y-m-d'),
                'jam_berita' => date('H:i:s'),
                'gambar' => $nama_file,
            ];
            $gambar->move('gambar', $nama_file);
            $this->ModelBerita->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan');
            return redirect()->to('Berita');

        }else{
            return redirect()->to('Berita/Input')->withInput();
        }
    }

    public function Edit($id_berita)
    {
        $data = [
            'judul' => 'Berita',
            'subjudul' => 'Edit Berita',
            'menu' => 'berita',
            'submenu' => 'berita',
            'page' => 'berita/v_edit',
            'berita' => $this->ModelBerita->DetailData($id_berita),
        ];
        return view('v_template_admin', $data);
    }

    public function UpdateData($id_berita){
        if($this->validate([
            'judul_berita' =>[
                'label' => 'Judul Berita',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!',
                    'is_unique' => '{field} Judul ini Sudah ada !!!',   
                ]
            ],
            'isi_berita' =>[
                'label' => 'Isi Berita',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'gambar' =>[
                'label' => 'Gambar',
                'rules' => 'max_size[gambar, 2000]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Max 2 MB',
                ]
            ]
        ])){
            // jika Valid
            $berita = $this->ModelBerita->DetailData($id_berita);
            $gambar = $this->request->getFile('gambar');
            if ($gambar->getError()==4) {
                $nama_file = $berita['gambar'];
            }else{
                $nama_file = $gambar->getRandomName();
                $gambar->move('gambar', $nama_file);
            }

            if ($this->request->getPost('judul_lama') == $this->request->getPost('judul_berita')) {
                $data = [
                    'id_berita' => $id_berita,
                    'isi_berita' => $this->request->getPost('isi_berita'),
                    'id_user' => session()->get('id_user'),
                    'gambar' => $nama_file,
                ];
            }else {
                $data = [
                    'id_berita' => $id_berita,
                    'judul_berita' => $this->request->getPost('judul_berita'),
                    'slug_berita' => url_title($this->request->getPost('judul_berita'), '-', true),
                    'isi_berita' => $this->request->getPost('isi_berita'),
                    'id_user' => session()->get('id_user'),
                    'gambar' => $nama_file,
                ];
            }
            
            $this->ModelBerita->UpdateData($data);
            session()->setFlashdata('update', 'Data Berhasil Diubah');
            return redirect()->to('Berita');

        }else{
            return redirect()->to('Berita/Edit/' . $id_berita)->withInput();
        }
    }

    public function DeleteData($id_berita){
        $berita = $this->ModelBerita->DetailData($id_berita);
        if ($berita['gambar'] <> '') {
            unlink('gambar/' . $berita['gambar']);
        }
        $data = [
            'id_berita' => $id_berita,
        ];
        $this->ModelBerita->DeleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Dihapus');
        return redirect()->to('Berita');
    }
}
