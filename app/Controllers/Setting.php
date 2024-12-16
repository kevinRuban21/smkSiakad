<?php

namespace App\Controllers;

use App\Models\ModelSekolah;
use App\Models\ModelSlider;
use App\Models\ModelMitra;
use App\Models\ModelGallery;

class Setting extends BaseController
{

    public function __construct() {
        $this->ModelSekolah = new ModelSekolah();
        $this->ModelSlider = new ModelSlider();
        $this->ModelMitra = new ModelMitra();
        $this->ModelGallery = new ModelGallery();
    }

    public function Logo()
    {
        $data = [
            'judul' => 'Setting',
            'subjudul' => 'Logo',
            'menu' => 'setting',
            'submenu' => 'logo',
            'page' => 'setting/v_logo',
            'sekolah' => $this->ModelSekolah->DetailData(),
        ];
        return view('v_template_admin', $data);
    }

    public function UpdateLogo(){
        if($this->validate([
            'logo_sekolah' =>[
                'label' => 'File',
                'rules' => 'max_size[logo_sekolah, 2000]|ext_in[logo_sekolah,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Max 2 MB',
                    'ext_in' => 'Jenis {field} Harus .png',
                ]
            ],
        ])){
            // jika Valid
            $sekolah = $this->ModelSekolah->DetailData();
            $logo_sekolah = $this->request->getFile('logo_sekolah');
            if ($logo_sekolah->getError()==4) {
                $nama_file = $sekolah['logo_sekolah'];
            }else{
                $nama_file = $logo_sekolah->getRandomName();
                $logo_sekolah->move('assets', $nama_file);
            }
            $data = [
                'id' => 1,
                'logo_sekolah' => $nama_file,
            ];
            
            $this->ModelSekolah->UpdateData($data);
            session()->setFlashdata('pesan', 'Logo Berhasil Diubah');
            return redirect()->to('Setting/Logo');

        }else{
            return redirect()->to('Setting/Logo/')->withInput();
        }
    }

    public function Sekolah()
    {
        $data = [
            'judul' => 'Setting',
            'subjudul' => 'Sekolah',
            'menu' => 'setting',
            'submenu' => 'sekolah',
            'page' => 'setting/v_sekolah',
            'sekolah' => $this->ModelSekolah->DetailData(),
        ];
        return view('v_template_admin', $data);
    }

    public function UpdateSekolah(){
        if($this->validate([
            'nama_sekolah' =>[
                'label' => 'Nama Sekolah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!',  
                ]
            ],
            'alamat_sekolah' =>[
                'label' => 'Alamat Sekolah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'telepon_sekolah' =>[
                'label' => 'Telepon',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'email_sekolah' =>[
                'label' => 'Email',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'visi_misi_sekolah' =>[
                'label' => 'Visi dan Misi Sekolah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'sejarah_sekolah' =>[
                'label' => 'Sejarah Sekolah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
        ])){
            // jika Valid
            $data = [
                'id' => 1,
                'nama_sekolah' => $this->request->getPost('nama_sekolah'),
                'alamat_sekolah' => $this->request->getPost('alamat_sekolah'),
                'telepon_sekolah' => $this->request->getPost('telepon_sekolah'),
                'email_sekolah' => $this->request->getPost('email_sekolah'),
                'visi_misi_sekolah' => $this->request->getPost('visi_misi_sekolah'),
                'sejarah_sekolah' => $this->request->getPost('sejarah_sekolah'),
            ];
            
            $this->ModelSekolah->UpdateData($data);
            session()->setFlashdata('pesan', 'Data Sekolah Berhasil Diubah');
            return redirect()->to('Setting/Sekolah');

        }else{
            return redirect()->to('Setting/Sekolah')->withInput();
        }
    }

    public function Sambutan()
    {
        $data = [
            'judul' => 'Setting',
            'subjudul' => 'Sambutan',
            'menu' => 'setting',
            'submenu' => 'sambutan',
            'page' => 'setting/v_sambutan',
            'sekolah' => $this->ModelSekolah->DetailData(),
        ];
        return view('v_template_admin', $data);
    }

    public function UpdateSambutan(){
        if($this->validate([
            'kepsek' =>[
                'label' => 'Nama Kepala Sekolah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!',  
                ]
            ],
            'sambutan' =>[
                'label' => 'Isi Sambutan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!',  
                ]
            ],
            'foto_kepsek' =>[
                'label' => 'File',
                'rules' => 'max_size[foto_kepsek, 2000]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Max 2 MB',
                ]
            ],
        ])){
            // jika Valid
            $sekolah = $this->ModelSekolah->DetailData();
            $foto_kepsek = $this->request->getFile('foto_kepsek');
            if ($foto_kepsek->getError()==4) {
                $nama_file = $sekolah['foto_kepsek'];
            }else{
                $nama_file = $foto_kepsek->getRandomName();
                $foto_kepsek->move('foto', $nama_file);
            }
            $data = [
                'id' => 1,
                'kepsek' => $this->request->getPost('kepsek'),
                'sambutan' => $this->request->getPost('sambutan'),
                'foto_kepsek' => $nama_file,
            ];
            
            $this->ModelSekolah->UpdateData($data);
            session()->setFlashdata('pesan', 'Data Berhasil Diubah');
            return redirect()->to('Setting/Sambutan');

        }else{
            return redirect()->to('Setting/Sambutan')->withInput();
        }
    }

    public function Slider()
    {
        $data = [
            'judul' => 'Setting',
            'subjudul' => 'Slider',
            'menu' => 'setting',
            'submenu' => 'slider',
            'page' => 'setting/v_slider',
            'slider' => $this->ModelSlider->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function InputSlider(){
        $data = [
            'judul' => 'Setting',
            'subjudul' => 'Input Slider',
            'menu' => 'setting',
            'submenu' => 'slider',
            'page' => 'setting/v_input_slider',
            'slider' => $this->ModelSlider->AllData(),
        ];
        return view('v_template_admin', $data);

    }

    public function InsertDataSlider(){
        if($this->validate([
            'judul_slider' =>[
                'label' => 'Judul Slider',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'deskripsi_slider' =>[
                'label' => 'Deskripsi Slider',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'gambar_slider' =>[
                'label' => 'Gambar Slider',
                'rules' => 'uploaded[gambar_slider]|max_size[gambar_slider, 2000]',
                'errors' => [
                    'uploaded' => '{field} Tidak Boleh Kosong',
                    'max_size' => 'Ukuran {field} Max 2 MB',
                ]
            ]
        ])){
            // jika Valid
            $gambar_slider = $this->request->getFile('gambar_slider');
            $nama_file = $gambar_slider->getRandomName();
            $data = [
                'judul_slider' => $this->request->getPost('judul_slider'),
                'deskripsi_slider' => $this->request->getPost('deskripsi_slider'),
                'gambar_slider' => $nama_file,
            ];
            $gambar_slider->move('gambarslider', $nama_file);
            $this->ModelSlider->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan');
            return redirect()->to('Setting/Slider');

        }else{
            return redirect()->to('Setting/InputSlider')->withInput();
        }
    }

    public function EditSlider($id_slider)
    {
        $data = [
            'judul' => 'Setting',
            'subjudul' => 'Edit Slider',
            'menu' => 'setting',
            'submenu' => 'slider',
            'page' => 'setting/v_edit_slider',
            'slider' => $this->ModelSlider->DetailData($id_slider),
        ];
        return view('v_template_admin', $data);
    }

    public function UpdateDataSlider($id_slider){
        if($this->validate([
            'judul_slider' =>[
                'label' => 'Judul Slider',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!',  
                ]
            ],
            'deskripsi_slider' =>[
                'label' => 'Deskripsi Slider',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'gambar _slider' =>[
                'label' => 'Gambar Slider',
                'rules' => 'max_size[gambar_slider, 2000]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Max 2 MB',
                ]
            ]
        ])){
            // jika Valid
            $slider = $this->ModelSlider->DetailData($id_slider);
            $gambar_slider = $this->request->getFile('gambar_slider');
            if ($gambar_slider->getError()==4) {
                $nama_file = $slider['gambar_slider'];
            }else{
                $nama_file = $gambar_slider->getRandomName();
                $gambar_slider->move('gambarslider', $nama_file);
            }
                $data = [
                    'id_slider' => $id_slider,
                    'judul_slider' => $this->request->getPost('judul_slider'),
                    'deskripsi_slider' => $this->request->getPost('deskripsi_slider'),
                    'gambar_slider' => $nama_file,
                ];
            
            $this->ModelSlider->UpdateData($data);
            session()->setFlashdata('update', 'Data Berhasil Diubah');
            return redirect()->to('Setting/Slider');

        }else{
            return redirect()->to('Setting/EditSlider/' . $id_slider)->withInput();
        }
    }

    public function DeleteDataSlider($id_slider){
        $slider = $this->ModelSlider->DetailData($id_slider);
        if ($slider['gambar_slider'] <> '') {
            unlink('gambarslider/' . $slider['gambar_slider']);
        }
        $data = [
            'id_slider' => $id_slider,
        ];
        $this->ModelSlider->DeleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Dihapus');
        return redirect()->to('Setting/Slider');
    }

    public function Mitra()
    {
        $data = [
            'judul' => 'Setting',
            'subjudul' => 'Mitra & Dukungan',
            'menu' => 'setting',
            'submenu' => 'mitra',
            'page' => 'setting/v_mitra',
            'mitra' => $this->ModelMitra->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function InputMitra(){
        $data = [
            'judul' => 'Setting',
            'subjudul' => 'Mitra & Dukungan',
            'menu' => 'setting',
            'submenu' => 'mitra',
            'page' => 'setting/v_input_mitra',
            'mitra' => $this->ModelMitra->AllData(),
        ];
        return view('v_template_admin', $data);

    }

    public function InsertDataMitra(){
        if($this->validate([
            'nama_mitra' =>[
                'label' => 'Nama Instansi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!',  
                ]
            ],
            'logo_mitra' =>[
                'label' => 'Logo Instansi',
                'rules' => 'max_size[logo_mitra, 2000]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Max 2 MB',
                ]
            ]
        ])){
            // jika Valid
            $logo_mitra = $this->request->getFile('logo_mitra');
            $nama_file = $logo_mitra->getRandomName();
            $data = [
                'nama_mitra' => $this->request->getPost('nama_mitra'),
                'logo_mitra' => $nama_file,
            ];
            $logo_mitra->move('logomitra', $nama_file);
            $this->ModelMitra->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan');
            return redirect()->to('Setting/Mitra');

        }else{
            return redirect()->to('Setting/InputMitra')->withInput();
        }
    }

    public function EditMitra($id_mitra)
    {
        $data = [
            'judul' => 'Setting',
            'subjudul' => 'Edit Mitra & Dukungan',
            'menu' => 'setting',
            'submenu' => 'mitra',
            'page' => 'setting/v_edit_mitra',
            'mitra' => $this->ModelMitra->DetailData($id_mitra),
        ];
        return view('v_template_admin', $data);
    }

    public function UpdateDataMitra($id_mitra){
        if($this->validate([
            'nama_mitra' =>[
                'label' => 'Nama Instansi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!',  
                ]
            ],
            'logo_mitra' =>[
                'label' => 'Logo Instansi',
                'rules' => 'max_size[logo_mitra, 2000]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Max 2 MB',
                ]
            ]
        ])){
            // jika Valid
            $mitra = $this->ModelMitra->DetailData($id_mitra);
            $logo_mitra = $this->request->getFile('logo_mitra');
            if ($logo_mitra->getError()==4) {
                $nama_file = $mitra['logo_mitra'];
            }else{
                $nama_file = $logo_mitra->getRandomName();
                $logo_mitra->move('logomitra', $nama_file);
            }
                $data = [
                    'id_mitra' => $id_mitra,
                    'nama_mitra' => $this->request->getPost('nama_mitra'),
                    'logo_mitra' => $nama_file,
                ];
            
            $this->ModelMitra->UpdateData($data);
            session()->setFlashdata('update', 'Data Berhasil Diubah');
            return redirect()->to('Setting/Mitra');

        }else{
            return redirect()->to('Setting/EditMitra/' . $id_mitra)->withInput();
        }
    }

    public function DeleteDataMitra($id_mitra){
        $mitra = $this->ModelMitra->DetailData($id_mitra);
        if ($mitra['logo_mitra'] <> '') {
            unlink('logomitra/' . $mitra['logo_mitra']);
        }
        $data = [
            'id_mitra' => $id_mitra,
        ];
        $this->ModelMitra->DeleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Dihapus');
        return redirect()->to('Setting/Mitra');
    }

    public function Gallery()
    {
        $data = [
            'judul' => 'Setting',
            'subjudul' => 'Gallery',
            'menu' => 'setting',
            'submenu' => 'gallery',
            'page' => 'setting/v_gallery',
            'gallery' => $this->ModelGallery->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function InputGallery(){
        $data = [
            'judul' => 'Setting',
            'subjudul' => 'Gallery',
            'menu' => 'setting',
            'submenu' => 'gallery',
            'page' => 'setting/v_input_gallery',
            'gallery' => $this->ModelGallery->AllData(),
        ];
        return view('v_template_admin', $data);

    }

    public function InsertDataGallery(){
        if($this->validate([
            'ket' =>[
                'label' => 'Keterangan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!',  
                ]
            ],
            'foto' =>[
                'label' => 'Foto',
                'rules' => 'max_size[foto, 2000]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Max 2 MB',
                ]
            ]
        ])){
            // jika Valid
            $foto = $this->request->getFile('foto');
            $nama_file = $foto->getRandomName();
            $data = [
                'ket' => $this->request->getPost('ket'),
                'foto' => $nama_file,
            ];
            $foto->move('gallery', $nama_file);
            $this->ModelGallery->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan');
            return redirect()->to('Setting/Gallery');

        }else{
            return redirect()->to('Setting/InputGallery')->withInput();
        }
    }

    public function EditGallery($id_gallery)
    {
        $data = [
            'judul' => 'Setting',
            'subjudul' => 'Gallery',
            'menu' => 'setting',
            'submenu' => 'gallery',
            'page' => 'setting/v_edit_gallery',
            'gallery' => $this->ModelGallery->DetailData($id_gallery),
        ];
        return view('v_template_admin', $data);
    }

    public function UpdateDataGallery($id_gallery){
        if($this->validate([
            'ket' =>[
                'label' => 'Keterangan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!',  
                ]
            ],
            'foto' =>[
                'label' => 'Foto',
                'rules' => 'max_size[foto, 2000]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Max 2 MB',
                ]
            ]
        ])){
            // jika Valid
            $gallery = $this->ModelGallery->DetailData($id_gallery);
            $foto = $this->request->getFile('foto');
            if ($foto->getError()==4) {
                $nama_file = $gallery['foto'];
            }else{
                $nama_file = $foto->getRandomName();
                $foto->move('gallery', $nama_file);
            }
                $data = [
                    'id_gallery' => $id_gallery,
                    'ket' => $this->request->getPost('ket'),
                    'foto' => $nama_file,
                ];
            
            $this->ModelGallery->UpdateData($data);
            session()->setFlashdata('update', 'Data Berhasil Diubah');
            return redirect()->to('Setting/Gallery');

        }else{
            return redirect()->to('Setting/EditGallery/' . $id_gallery)->withInput();
        }
    }

    public function DeleteDataGallery($id_gallery){
        $gallery = $this->ModelGallery->DetailData($id_gallery);
        if ($gallery['foto'] <> '') {
            unlink('gallery/' . $gallery['foto']);
        }
        $data = [
            'id_gallery' => $id_gallery,
        ];
        $this->ModelGallery->DeleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Dihapus');
        return redirect()->to('Setting/Gallery');
    }

}
