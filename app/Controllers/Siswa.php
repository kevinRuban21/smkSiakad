<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelSiswa;
use App\Models\ModelJurusan;

class Siswa extends BaseController
{
    public function __construct() {
        $this->ModelSiswa = new ModelSiswa();
        $this->ModelJurusan = new ModelJurusan();
    }

    public function index()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Siswa',
            'menu' => 'master-data',
            'submenu' => 'siswa',
            'page' => 'siswa/v_index',
            'siswa' => $this->ModelSiswa->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function Input()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Input Siswa',
            'menu' => 'master-data',
            'submenu' => 'siswa',
            'page' => 'siswa/v_input',
            'jurusan' => $this->ModelJurusan->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function InsertData(){
        if($this->validate([
            // 'nipd' =>[
            //     'label' => 'NIPD',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} Tidak Boleh Kosong !!!',  
            //     ]
            // ],
            'nisn' =>[
                'label' => 'NISN',
                'rules' => 'required|is_unique[tbl_siswa.nisn]',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!',
                    'is_unique' => '{field} ini Sudah ada !!!',   
                ]
            ],
            'nama_siswa' =>[
                'label' => 'Nama Siswa',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!',  
                ]
            ],
            'nama_ortu' =>[
                'label' => 'Nama Orang Tua/Wali',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!',  
                ]
            ],
            'id_jurusan' =>[
                'label' => 'Jurusan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'tahun_angkatan' =>[
                'label' => 'Tahun Angkatan',
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
            'status' =>[
                'label' => 'Status',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'password' =>[
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'foto_siswa' =>[
                'label' => 'Foto Siswa',
                'rules' => 'uploaded[foto_siswa]|max_size[foto_siswa, 2000]',
                'errors' => [
                    'uploaded' => '{field} Tidak Boleh Kosong',
                    'max_size' => 'Ukuran {field} Max 2 MB',
                ]
            ],
        ])){
            // jika Valid
            $foto_siswa = $this->request->getFile('foto_siswa');
            $nama_file = $foto_siswa->getRandomName();
            $data = [
                'nipd' => $this->request->getPost('nipd'),
                'nisn' => $this->request->getPost('nisn'),
                'nama_siswa' => $this->request->getPost('nama_siswa'),
                'id_jurusan' => $this->request->getPost('id_jurusan'),
                'tahun_angkatan' => $this->request->getPost('tahun_angkatan'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                'jk' => $this->request->getPost('jk'),
                'status' => $this->request->getPost('status'),
                'nama_ortu' => $this->request->getPost('nama_ortu'),
                'password' => $this->request->getPost('password'),
                'level' => $this->request->getPost('level'),
                'foto_siswa' => $nama_file,
            ];
            $foto_siswa->move('fotosiswa', $nama_file);
            $this->ModelSiswa->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan');
            return redirect()->to('Siswa');

        }else{
            return redirect()->to('Siswa/Input')->withInput();
        }
    }

    public function Edit($id_siswa)
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Edit Data Siswa',
            'menu' => 'master-data',
            'submenu' => 'siswa',
            'page' => 'siswa/v_edit',
            'siswa' => $this->ModelSiswa->DetailData($id_siswa),
        ];
        return view('v_template_admin', $data);
    }

    public function UpdateData($id_siswa){
        if($this->validate([
            'nipd' =>[
                'label' => 'NIPD',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!',  
                ]
            ],
            'nisn' =>[
                'label' => 'NISN',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!',  
                ]
            ],
            'nama_siswa' =>[
                'label' => 'Nama Siswa',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            // 'nama_ortu' =>[
            //     'label' => 'Nama Orang Tua/Wali',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} Tidak Boleh Kosong !!!',  
            //     ]
            // ],
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
            'tahun_angkatan' =>[
                'label' => 'Tahun Angkatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'status' =>[
                'label' => 'Status',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'password' =>[
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'foto_siswa' =>[
                'label' => 'Foto Siswa',
                'rules' => 'max_size[foto_siswa, 2000]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Max 2 MB',
                ]
            ],
        ])){
            $siswa = $this->ModelSiswa->DetailData($id_siswa);
            $foto_siswa = $this->request->getFile('foto_siswa');
            if ($foto_siswa->getError()==4) {
                $nama_file = $siswa['foto_siswa'];
            }else{
                $nama_file = $foto_siswa->getRandomName();
                $foto_siswa->move('fotosiswa', $nama_file);
            }

            $data = [
                'id_siswa' => $id_siswa,
                'nipd' => $this->request->getPost('nipd'),
                'nisn' => $this->request->getPost('nisn'),
                'nama_siswa' => $this->request->getPost('nama_siswa'),
                'tahun_angkatan' => $this->request->getPost('tahun_angkatan'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                'jk' => $this->request->getPost('jk'),
                'status' => $this->request->getPost('status'),
                'nama_ortu' => $this->request->getPost('nama_ortu'),
                'password' => $this->request->getPost('password'),
                'foto_siswa' => $nama_file,
            ];
            
            $this->ModelSiswa->UpdateData($data);
            session()->setFlashdata('update', 'Data Berhasil Diubah');
            return redirect()->to('Siswa');

        }else{
            return redirect()->to('Siswa/Edit/' . $id_siswa)->withInput();
        }
    }

    public function DeleteData($id_siswa){
        $siswa = $this->ModelSiswa->DetailData($id_siswa);
        if ($siswa['foto_siswa'] <> '') {
            unlink('fotosiswa/' . $siswa['foto_siswa']);
        }
        $data = [
            'id_siswa' => $id_siswa,
        ];
        $this->ModelSiswa->DeleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Dihapus');
        return redirect()->to('siswa');
    }
}
