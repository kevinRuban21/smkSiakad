<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelGuru;
use App\Models\ModelMapel;
use App\Models\ModelHalamanGuru;

class DashboardGuru extends BaseController
{
    public function __construct() {
        $this->ModelHalamanGuru = new ModelHalamanGuru();
        $this->ModelGuru = new ModelGuru();
    }

    public function index(): string
    {
        $data = [
            'judul' => 'Dashboard Guru',
            'subjudul' => 'Dashboard Guru',
            'menu' => 'dashboard',
            'submenu' => 'dashboard',
            'page' => 'v_dashboard_guru',
            'jmlh_jurusan' => $this->ModelHalamanGuru->JmlhJurusan(),
            'jmlh_guru' => $this->ModelHalamanGuru->JmlhGuru(),
            'jmlh_siswa' => $this->ModelHalamanGuru->JmlhSiswa(),
            'jmlh_kelas' => $this->ModelHalamanGuru->JmlhKelas(),
        ];
        return view('v_template_guru', $data);
    }

    // public function Tampil($id_guru)
    // {   
    //     $data = [
            
    //     ];
    //     return view('v_dashboard_guru', $data);
    // }
}
