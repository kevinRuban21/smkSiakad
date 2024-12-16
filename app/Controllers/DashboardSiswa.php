<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelGuru;
use App\Models\ModelMapel;
use App\Models\ModelHalamanSiswa;

class DashboardSiswa extends BaseController
{
    public function __construct() {
        $this->ModelHalamanSiswa = new ModelHalamanSiswa();
    }

    public function index(): string
    {
        $data = [
            'judul' => 'Dashboard Siswa',
            'subjudul' => 'Dashboard Siswa',
            'menu' => 'dashboard',
            'submenu' => 'dashboard',
            'page' => 'v_dashboard_siswa',
            'jmlh_jurusan' => $this->ModelHalamanSiswa->JmlhJurusan(),
            'jmlh_guru' => $this->ModelHalamanSiswa->JmlhGuru(),
            'jmlh_siswa' => $this->ModelHalamanSiswa->JmlhSiswa(),
            'jmlh_kelas' => $this->ModelHalamanSiswa->JmlhKelas(),
        ];
        return view('v_template_siswa', $data);
    }
}
