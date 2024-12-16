<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelGuru;

class Guru extends BaseController
{
    public function __construct() {
        $this->ModelGuru = new ModelGuru();
    }

    public function index()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Guru',
            'menu' => 'master-data',
            'submenu' => 'guru',
            'page' => 'guru/v_index',
            'guru' => $this->ModelGuru->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function Input()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Input Guru',
            'menu' => 'master-data',
            'submenu' => 'guru',
            'page' => 'guru/v_input',
        ];
        return view('v_template_admin', $data);
    }

    public function InsertData(){
        if($this->validate([
            'kode_guru' =>[
                'label' => 'Kode Guru',
                'rules' => 'required|is_unique[tbl_guru.kode_guru]',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!',
                    'is_unique' => '{field} ini Sudah ada !!!',   
                ]
            ],
            // 'nip' =>[
            //     'label' => 'NIP',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} Tidak Boleh Kosong !!!',  
            //     ]
            // ],
            'nama_guru' =>[
                'label' => 'Nama Guru',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'tempat_lahir' =>[
                'label' => 'Tempat Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'tgl_lahir' =>[
                'label' => 'Tanggal Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'jk' =>[
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            // 'pendidikan' =>[
            //     'label' => 'Pendidikan',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} Tidak Boleh Kosong',
            //     ]
            // ],
            // 'prodi' =>[
            //     'label' => 'Program Studi',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} Tidak Boleh Kosong',
            //     ]
            // ],
            // 'telp_guru' =>[
            //     'label' => 'Telpon Guru',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} Tidak Boleh Kosong',
            //     ]
            // ],
            'password' =>[
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'foto_guru' =>[
                'label' => 'Foto Guru',
                'rules' => 'uploaded[foto_guru]|max_size[foto_guru, 2000]',
                'errors' => [
                    'uploaded' => '{field} Tidak Boleh Kosong',
                    'max_size' => 'Ukuran {field} Max 2 MB',
                ]
            ],
        ])){
            // jika Valid
            $foto_guru = $this->request->getFile('foto_guru');
            $nama_file = $foto_guru->getRandomName();
            $data = [
                'kode_guru' => $this->request->getPost('kode_guru'),
                'nip' => $this->request->getPost('nip'),
                'nama_guru' => $this->request->getPost('nama_guru'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                'jk' => $this->request->getPost('jk'),
                'pendidikan' => $this->request->getPost('pendidikan'),
                'prodi' => $this->request->getPost('prodi'),
                'telp_guru' => $this->request->getPost('telp_guru'),
                'password' => $this->request->getPost('password'),
                'level' => 2,
                'foto_guru' => $nama_file,
            ];
            $foto_guru->move('fotoguru', $nama_file);
            $this->ModelGuru->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan');
            return redirect()->to('Guru');

        }else{
            return redirect()->to('Guru/Input')->withInput();
        }
    }

    public function Edit($id_guru)
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Edit Data Guru',
            'menu' => 'master-data',
            'submenu' => 'guru',
            'page' => 'guru/v_edit',
            'guru' => $this->ModelGuru->DetailData($id_guru),
        ];
        return view('v_template_admin', $data);
    }

    public function UpdateData($id_guru){
        if($this->validate([
            // 'nip' =>[
            //     'label' => 'NIP',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} Tidak Boleh Kosong !!!',  
            //     ]
            // ],
            'nama_guru' =>[
                'label' => 'Nama Guru',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'tempat_lahir' =>[
                'label' => 'Tempat Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'tgl_lahir' =>[
                'label' => 'Tanggal Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'jk' =>[
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            // 'pendidikan' =>[
            //     'label' => 'Pendidikan',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} Tidak Boleh Kosong',
            //     ]
            // ],
            // 'prodi' =>[
            //     'label' => 'Program Studi',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} Tidak Boleh Kosong',
            //     ]
            // ],
            // 'telp_guru' =>[
            //     'label' => 'Telpon Guru',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} Tidak Boleh Kosong',
            //     ]
            // ],
            'foto_guru' =>[
                'label' => 'Foto Guru',
                'rules' => 'max_size[foto_guru, 2000]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Max 2 MB',
                ]
            ],
        ])){
            $guru = $this->ModelGuru->DetailData($id_guru);
            $foto_guru = $this->request->getFile('foto_guru');
            if ($foto_guru->getError()==4) {
                $nama_file = $guru['foto_guru'];
            }else{
                $nama_file = $foto_guru->getRandomName();
                $foto_guru->move('fotoguru', $nama_file);
            }

            $data = [
                'id_guru' => $id_guru,
                'kode_guru' => $this->request->getPost('kode_guru'),
                'nip' => $this->request->getPost('nip'),
                'nama_guru' => $this->request->getPost('nama_guru'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                'jk' => $this->request->getPost('jk'),
                'pendidikan' => $this->request->getPost('pendidikan'),
                'prodi' => $this->request->getPost('prodi'),
                'telp_guru' => $this->request->getPost('telp_guru'),
                'foto_guru' => $nama_file,
            ];
            
            $this->ModelGuru->UpdateData($data);
            session()->setFlashdata('update', 'Data Berhasil Diubah');
            return redirect()->to('Guru');

        }else{
            return redirect()->to('Guru/Edit/' . $id_guru)->withInput();
        }
    }

    public function DeleteData($id_guru){
        $guru = $this->ModelGuru->DetailData($id_guru);
        if ($guru['foto_guru'] <> '') {
            unlink('fotoguru/' . $guru['foto_guru']);
        }
        $data = [
            'id_guru' => $id_guru,
        ];
        $this->ModelGuru->DeleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Dihapus');
        return redirect()->to('Guru');
    }
}
