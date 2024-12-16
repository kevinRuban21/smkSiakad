<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelGuru;
use App\Models\ModelMapel;
use App\Models\ModelAdmin;

class DashboardAdmin extends BaseController
{
    public function __construct() {
        $this->ModelAdmin = new ModelAdmin();
    }

    public function index(): string
    {
        $data = [
            'judul' => 'Dashboard Admin',
            'subjudul' => 'Dashboard Admin',
            'menu' => 'dashboard',
            'submenu' => 'dashboard',
            'page' => 'v_dashboard_admin',
            'jmlh_jurusan' => $this->ModelAdmin->JmlhJurusan(),
            'jmlh_guru' => $this->ModelAdmin->JmlhGuru(),
            'jmlh_siswa' => $this->ModelAdmin->JmlhSiswa(),
            'jmlh_kelas' => $this->ModelAdmin->JmlhKelas(),
        ];
        return view('v_template_admin', $data);
    }
}
