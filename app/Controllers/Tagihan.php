<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelKeuangan;
use App\Models\ModelSiswa;
use App\Models\ModelPembayaran;
use App\Models\ModelJurusan;
use App\Models\ModelJadwalSiswa;

class Tagihan extends BaseController
{
    public function __construct() {
        $this->ModelKeuangan = new ModelKeuangan();
        $this->ModelSiswa = new ModelSiswa();
        $this->ModelPembayaran = new ModelPembayaran();
        $this->ModelJurusan = new ModelJurusan();
        $this->ModelJadwalSiswa = new ModelJadwalSiswa();
    }


    public function index()
    {
        $data = [
            'judul' => 'Tagihan',
            'subjudul' => 'Tagihan',
            'menu' => 'tagihan',
            'submenu' => '',
            'page' => 'tagihan/v_index',
            'keuangan' => $this->ModelKeuangan->AllData(),
            'pembayaran' => $this->ModelPembayaran->AllData(),
            'data_siswa' => $this->ModelJadwalSiswa->DataSiswa(),
            
        ];
        return view('v_template_siswa', $data);
    }

    
}
