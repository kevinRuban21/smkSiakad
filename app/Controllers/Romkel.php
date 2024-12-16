<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelRomkel;
use App\Models\ModelTahunAjaran;

class Romkel extends BaseController
{
    public function __construct() {
        $this->ModelRomkel = new ModelRomkel();
        $this->ModelTahunAjaran = new ModelTahunAjaran();
    }

    public function index()
    {
        $data = [
            'judul' => 'Rombongan Kelas',
            'subjudul' => 'Rombongan Kelas',
            'menu' => 'romkel',
            'submenu' => 'romkel',
            'page' => 'v_romkel',
            'romkel' => $this->ModelRomkel->AllData(),
            'ta' => $this->ModelTahunAjaran->TaAktif(),
        ];
        return view('v_template_admin', $data);
    }
}
