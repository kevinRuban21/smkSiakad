<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelBahanAjar;

class BahanAjar extends BaseController
{
    public function __construct() {
        $this->ModelBahanAjar = new ModelBahanAjar();
    }


    public function index(): string
    {
        $data = [
            'judul' => 'Bahan Ajar',
            'subjudul' => 'Bahan Ajar',
            'menu' => 'bahan-ajar',
            'submenu' => 'bahan_ajar',
            'page' => 'bahan-ajar/v_index',
            'ba' => $this->ModelBahanAjar->AllData(),
        ];
        return view('v_template_guru', $data);
    }

    public function View($id_ba)
    {
        $data = [
            'judul' => 'Bahan Ajar',
            'subjudul' => 'View Bahan Ajar',
            'menu' => 'bahan-ajar',
            'submenu' => 'bahan_ajar',
            'page' => 'bahan-ajar/v_view',
            'ba' => $this->ModelBahanAjar->DetailData($id_ba),
        ];
        return view('v_template_guru', $data);
    }

    public function Input()
    {
        $data = [
            'judul' => 'Bahan Ajar',
            'subjudul' => 'View Bahan Ajar',
            'menu' => 'bahan-ajar',
            'submenu' => 'bahan_ajar',
            'page' => 'bahan-ajar/v_input',
        ];
        return view('v_template_guru', $data);
    }

    public function InsertData(){
        if($this->validate([
            'no_ba' =>[
                'label' => 'Kode',
                'rules' => 'required|is_unique[tbl_ba.no_ba]',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!',
                    'is_unique' => '{field} Judul ini Sudah ada !!!',   
                ]
            ],
            'nama_ba' =>[
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'deskripsi' =>[
                'label' => 'Deskripsi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'file_ba' =>[
                'label' => 'Bahan Ajar',
                'rules' => 'uploaded[file_ba]|max_size[file_ba, 10000]',
                'errors' => [
                    'uploaded' => '{field} Tidak Boleh Kosong',
                    'max_size' => 'Ukuran {field} Max 10 MB',
                ]
            ]
        ])){
            // jika Valid
            $file_ba = $this->request->getFile('file_ba');
            $nama_file = $file_ba->getRandomName();
            $data = [
                'no_ba' => $this->request->getPost('no_ba'),
                'nama_ba' => $this->request->getPost('nama_ba'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'tgl_upload' => date('Y-m-d'),
                'file_ba' => $nama_file,
            ];
            $file_ba->move('bahan_ajar', $nama_file);
            $this->ModelBahanAjar->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan');
            return redirect()->to('BahanAjar');

        }else{
            return redirect()->to('BahanAjar/Input')->withInput();
        }
    }

    public function Edit($id_ba)
    {
        $data = [
            'judul' => 'Bahan Ajar',
            'subjudul' => 'Edit Bahan Ajar',
            'menu' => 'bahan-ajar',
            'submenu' => 'bahan_ajar',
            'page' => 'bahan-ajar/v_edit',
            'ba' => $this->ModelBahanAjar->DetailData($id_ba),
        ];
        return view('v_template_guru', $data);
    }

    public function UpdateData($id_ba){
        if($this->validate([
            'nama_ba' =>[
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'deskripsi' =>[
                'label' => 'Deskripsi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'file_ba' =>[
                'label' => 'Bahan Ajar',
                'rules' => 'max_size[file_ba, 10000]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Max 10 MB',
                ]
            ]
        ])){
            // jika Valid
            $ba = $this->ModelBahanAjar->DetailData($id_ba);
            $file_ba = $this->request->getFile('file_ba');
            if ($file_ba->getError()==4) {
                $nama_file = $ba['file_ba'];
            }else{
                $nama_file = $file_ba->getRandomName();
                $file_ba->move('bahan_ajar', $nama_file);
            }
            $data = [
                'id_ba' => $id_ba,
                'no_ba' => $this->request->getPost('no_ba'),
                'nama_ba' => $this->request->getPost('nama_ba'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'tgl_upload' => date('Y-m-d'),
                'file_ba' => $nama_file,
            ];
            
            $this->ModelBahanAjar->UpdateData($data);
            session()->setFlashdata('update', 'Data Berhasil Diubah');
            return redirect()->to('BahanAjar');

        }else{
            return redirect()->to('BahanAjar/Edit/' . $id_ba)->withInput();
        }
    }

    public function DeleteData($id_ba){
        $ba = $this->ModelBahanAjar->DetailData($id_ba);
        if ($ba['file_ba'] <> '') {
            unlink('bahan_ajar/' . $ba['file_ba']);
        }
        $data = [
            'id_ba' => $id_ba,
        ];
        $this->ModelBahanAjar->DeleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Dihapus');
        return redirect()->to('BahanAjar');
    }
}
