<?php

namespace App\Controllers;

use App\Models\ModelJurusan;
use App\Models\ModelBerita;
use App\Models\ModelGuru;
use App\Models\ModelSekolah;
use App\Models\ModelSlider;
use App\Models\ModelMitra;
use App\Models\ModelGallery;

class Home extends BaseController
{

    public function __construct() {
        $this->ModelJurusan = new ModelJurusan();
        $this->ModelBerita = new ModelBerita();
        $this->ModelGuru = new ModelGuru();
        $this->ModelSekolah = new ModelSekolah();
        $this->ModelSlider = new ModelSlider();
        $this->ModelMitra = new ModelMitra();
        $this->ModelGallery = new ModelGallery();
    }
    public function index(): string
    {
        $data = [
            'judul' => 'Home',
            'subjudul' => '',
            'page' => 'v_home',
            'slider' => $this->ModelSlider->AllData(),
            'beritabaru' => $this->ModelBerita->AllDataLimit(),
        ];
        return view('v_template_front_end', $data);
    }

    public function DetailJurusan($id_jurusan)
    {
        $data = [
            'judul' => 'Jurusan',
            'subjudul' => '',
            'page' => 'front-end/v_detail_jurusan',
            'jurusan' => $this->ModelJurusan->DetailData($id_jurusan),
        ];
        return view('v_template_front_end', $data);
    }

    public function Berita()
    {
        $data = [
            'judul' => 'Berita',
            'subjudul' => '',
            'page' => 'front-end/v_berita',
            'berita' => $this->ModelBerita->paginate(3, 'berita'),
            'pager' => $this->ModelBerita->pager,
            'beritabaru' => $this->ModelBerita->AllDataLimit(),
        ];
        return view('v_template_front_end', $data);
    }

    public function ViewBerita($slug_berita){
        $data = [
            'judul' => 'Berita',
            'subjudul' => 'View Berita',
            'page' => 'front-end/v_view_berita',
            'berita' => $this->ModelBerita->ViewBerita($slug_berita),
            'beritabaru' => $this->ModelBerita->AllDataLimit(),
        ];
        return view('v_template_front_end', $data);
    }

    public function Sambutan()
    {
        $data = [
            'judul' => 'Sambutan Kepala Sekolah',
            'subjudul' => '',
            'page' => 'front-end/v_sambutan',
            'sekolah' => $this->ModelSekolah->DetailData(),
        ];
        return view('v_template_front_end', $data);
    }

    public function Sejarah()
    {
        $data = [
            'judul' => 'Sejarah Sekolah',
            'subjudul' => '',
            'page' => 'front-end/v_sejarah',
            'sekolah' => $this->ModelSekolah->DetailData(),
        ];
        return view('v_template_front_end', $data);
    }

    public function VisiMisi()
    {
        $data = [
            'judul' => 'Visi dan Misi Sekolah',
            'subjudul' => '',
            'page' => 'front-end/v_visi_misi',
            'sekolah' => $this->ModelSekolah->DetailData(),
        ];
        return view('v_template_front_end', $data);
    }

    public function Guru()
    {
        $data = [
            'judul' => 'Daftar Guru',
            'subjudul' => '',
            'page' => 'front-end/v_guru',
            'guru' => $this->ModelGuru->AllData(),
        ];
        return view('v_template_front_end', $data);
    }

    public function Mitra()
    {
        $data = [
            'judul' => 'Mitra dan Dukungan',
            'subjudul' => '',
            'page' => 'front-end/v_mitra',
            'mtr' => $this->ModelMitra->AllData(),
        ];
        return view('v_template_front_end', $data);
    }

    public function Gallery()
    {
        $data = [
            'judul' => 'Gallery',
            'subjudul' => '',
            'page' => 'front-end/v_gallery',
            'glr' => $this->ModelGallery->AllData(),
        ];
        return view('v_template_front_end', $data);
    }
}
