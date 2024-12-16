<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelTahunAjaran;

class TahunAjaran extends BaseController
{
    public function __construct() {
        $this->ModelTahunAjaran = new ModelTahunAjaran();
    }

    public function index()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Tahun Ajaran',
            'menu' => 'master-data',
            'submenu' => 'tahun_ajaran',
            'page' => 'v_tahun_ajaran',
            'ta' => $this->ModelTahunAjaran->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function InsertData(){
        $data = [
            'ta' => $this->request->getPost('ta'),
            'semester' => $this->request->getPost('semester'),
            'status' => 0,
        ];
        $this->ModelTahunAjaran->InsertData($data);
        session()->setFlashdata('insert', 'Data Berhasil Ditambahkan !!!');
        return redirect()->to('TahunAjaran');

    }

    public function DeleteData($id_ta){
        $data = [
            'id_ta' => $id_ta,
        ];
        $this->ModelTahunAjaran->DeleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Dihapus !!!');
        return redirect()->to('TahunAjaran');

    }

    public function set_status_ta($id_ta){
        // reset status ta
        $this->ModelTahunAjaran->ResetTa();

        // set status ta
        $data = [
            'id_ta' => $id_ta,
            'status' => 1,
        ];
        $this->ModelTahunAjaran->UpdateData($data);
        session()->setFlashdata('update', 'Tahun Ajaran Diaktifkan !!!');
        return redirect()->to('TahunAjaran');
    }
}
