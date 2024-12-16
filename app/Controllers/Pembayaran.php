<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelKeuangan;
use App\Models\ModelSiswa;
use App\Models\ModelPembayaran;
use App\Models\ModelJurusan;

class Pembayaran extends BaseController
{
    public function __construct() {
        $this->ModelKeuangan = new ModelKeuangan();
        $this->ModelSiswa = new ModelSiswa();
        $this->ModelPembayaran = new ModelPembayaran();
        $this->ModelJurusan = new ModelJurusan();
    }


    public function index()
    {
        $data = [
            'judul' => 'Pembayaran',
            'subjudul' => 'Pembayaran',
            'menu' => 'pembayaran',
            'submenu' => '',
            'page' => 'pembayaran/v_index',
            'keuangan' => $this->ModelKeuangan->AllData(),
            'siswa' => $this->ModelSiswa->AllData(),
            'jurusan' => $this->ModelJurusan->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function DaftarSiswa($id_jurusan)
    {
        $data = [
            'judul' => 'Pembayaran',
            'subjudul' => 'Pembayaran',
            'menu' => 'pembayaran',
            'submenu' => '',
            'page' => 'pembayaran/v_daftar_siswa',
            'pemb' => $this->ModelPembayaran->AllData(),
            'jurusan' => $this->ModelJurusan->DetailData($id_jurusan),
        ];
        return view('v_template_admin', $data);
    }

    public function TmbhSiswa($id_siswa, $id_jurusan){
        $data = [
            'id_siswa' => $id_siswa,
            'id_jurusan' => $id_jurusan,
        ];
        $this->ModelPembayaran->TmbhSiswa($data);
        session()->setFlashdata('update', 'Siswa Berhasil Ditambahkan !!!');
        return redirect()->to('Pembayaran/DaftarSiswa/' . $id_jurusan);

    }

    public function Inputid($id_pemb_siswa, $id_siswa)
    {   
        $data = [
            'id_pemb_siswa' => $id_pemb_siswa,
            'id_siswa' => $id_siswa,
        ];
        $this->ModelPembayaran->SimpanPemb($data);
        session()->setFlashdata('update', 'Data Berhasil DiUbah');
        return redirect()->to('Pembayaran/Daftar' . $id_siswa);
    }

    public function DaftarBayar($id_pemb_siswa, $id_siswa, $id_jurusan)
    {
        $db = \Config\Database::connect();
        $ps = $db->table('tbl_pemb_siswa')
            ->join('tbl_siswa', 'tbl_siswa.id_siswa=tbl_pemb_siswa.id_siswa', 'LEFT')
            ->join('tbl_jurusan', 'tbl_jurusan.id_jurusan=tbl_pemb_siswa.id_jurusan', 'LEFT')
            ->where('id_pemb_siswa', $id_pemb_siswa)
            ->where('tbl_pemb_siswa.id_siswa', $id_siswa)
            ->where('tbl_pemb_siswa.id_jurusan', $id_jurusan)
            ->get()->getResultArray();
        $data = [
            'judul' => 'Pembayaran',
            'subjudul' => 'Pembayaran',
            'menu' => 'pembayaran',
            'submenu' => '',
            'page' => 'pembayaran/v_daftar',
            'pemb' => $ps,
        ];
        return view('v_template_admin', $data);
    }

    public function Bayar($id_pemb_siswa, $id_siswa, $id_jurusan)
    {   
        $pemb_raport = $this->request->getPost('pemb_raport');
        $pemb_batik = $this->request->getPost('pemb_batik');
        $pemb_training = $this->request->getPost('pemb_training');
        $pemb_uas = $this->request->getPost('pemb_uas');
        $pemb_jurusan = $this->request->getPost('pemb_jurusan');
        $pemb_us = $this->request->getPost('pemb_us');
        $pemb_anbk = $this->request->getPost('pemb_anbk');
        $pemb_ukk = $this->request->getPost('pemb_ukk');
        $pemb_card = $this->request->getPost('pemb_card');
        $data = [
            'id_pemb_siswa' => $id_pemb_siswa,
            'id_siswa' => $id_siswa,
            'id_jurusan' => $id_jurusan,
            'pemb_raport' => $pemb_raport,
            'pemb_batik' => $pemb_batik,
            'pemb_card' => $pemb_card,
            'pemb_anbk' => $pemb_anbk,
            'pemb_ukk' => $pemb_ukk,
            'pemb_uas' => $pemb_uas,
            'pemb_us' => $pemb_us,
            'pemb_jurusan' => $pemb_jurusan,
            'pemb_training' => $pemb_training,
        ];
        $this->ModelPembayaran->SimpanPemb($data);
        session()->setFlashdata('update', 'Data Berhasil DiUbah');
        return redirect()->to('Pembayaran/DaftarBayar/' . $id_pemb_siswa .'/'. $id_siswa .'/'. $id_jurusan);
    }

    public function BayarSPP($id_pemb_siswa, $id_siswa, $id_jurusan)
    {
        $db = \Config\Database::connect();
        $ps = $db->table('tbl_pemb_siswa')
            ->join('tbl_siswa', 'tbl_siswa.id_siswa=tbl_pemb_siswa.id_siswa', 'LEFT')
            ->join('tbl_jurusan', 'tbl_jurusan.id_jurusan=tbl_pemb_siswa.id_jurusan', 'LEFT')
            ->where('id_pemb_siswa', $id_pemb_siswa)
            ->where('tbl_pemb_siswa.id_siswa', $id_siswa)
            ->where('tbl_pemb_siswa.id_jurusan', $id_jurusan)
            ->get()->getResultArray();
        $data = [
            'judul' => 'Pembayaran',
            'subjudul' => 'Pembayaran',
            'menu' => 'pembayaran',
            'submenu' => '',
            'page' => 'pembayaran/v_bayar_spp',
            'pemb' => $ps,
        ];
        return view('v_template_admin', $data);
    }

    public function PembSPP1($id_pemb_siswa, $id_siswa, $id_jurusan)
    {   
        $sem1_bulan1 = $this->request->getPost('sem1_bulan1');
        $sem1_bulan2 = $this->request->getPost('sem1_bulan2');
        $sem1_bulan3 = $this->request->getPost('sem1_bulan3');
        $sem1_bulan4 = $this->request->getPost('sem1_bulan4');
        $sem1_bulan5 = $this->request->getPost('sem1_bulan5');
        $sem1_bulan6 = $this->request->getPost('sem1_bulan6');
        $data = [
            'id_pemb_siswa' => $id_pemb_siswa,
            'id_siswa' => $id_siswa,
            'id_jurusan' => $id_jurusan,
            'sem1_bulan1' => $sem1_bulan1,
            'sem1_bulan2' => $sem1_bulan2,
            'sem1_bulan3' => $sem1_bulan3,
            'sem1_bulan4' => $sem1_bulan4,
            'sem1_bulan5' => $sem1_bulan5,
            'sem1_bulan6' => $sem1_bulan6,
        ];
        $this->ModelPembayaran->SimpanPemb($data);
        session()->setFlashdata('update', 'Data Berhasil DiUbah');
        return redirect()->to('Pembayaran/BayarSPP/' . $id_pemb_siswa .'/'. $id_siswa .'/'. $id_jurusan);
    }


    public function PembSPP2($id_pemb_siswa, $id_siswa, $id_jurusan)
    {   
        $sem2_bulan1 = $this->request->getPost('sem2_bulan1');
        $sem2_bulan2 = $this->request->getPost('sem2_bulan2');
        $sem2_bulan3 = $this->request->getPost('sem2_bulan3');
        $sem2_bulan4 = $this->request->getPost('sem2_bulan4');
        $sem2_bulan5 = $this->request->getPost('sem2_bulan5');
        $sem2_bulan6 = $this->request->getPost('sem2_bulan6');
        $data = [
            'id_pemb_siswa' => $id_pemb_siswa,
            'id_siswa' => $id_siswa,
            'id_jurusan' => $id_jurusan,
            'sem2_bulan1' => $sem2_bulan1,
            'sem2_bulan2' => $sem2_bulan2,
            'sem2_bulan3' => $sem2_bulan3,
            'sem2_bulan4' => $sem2_bulan4,
            'sem2_bulan5' => $sem2_bulan5,
            'sem2_bulan6' => $sem2_bulan6,
        ];
        $this->ModelPembayaran->SimpanPemb($data);
        session()->setFlashdata('update', 'Data Berhasil DiUbah');
        return redirect()->to('Pembayaran/BayarSPP/' . $id_pemb_siswa .'/'. $id_siswa .'/'. $id_jurusan);
    }


    public function PembSPP3($id_pemb_siswa, $id_siswa, $id_jurusan)
    {   
        $sem3_bulan1 = $this->request->getPost('sem3_bulan1');
        $sem3_bulan2 = $this->request->getPost('sem3_bulan2');
        $sem3_bulan3 = $this->request->getPost('sem3_bulan3');
        $sem3_bulan4 = $this->request->getPost('sem3_bulan4');
        $sem3_bulan5 = $this->request->getPost('sem3_bulan5');
        $sem3_bulan6 = $this->request->getPost('sem3_bulan6');
        $data = [
            'id_pemb_siswa' => $id_pemb_siswa,
            'id_siswa' => $id_siswa,
            'id_jurusan' => $id_jurusan,
            'sem3_bulan1' => $sem3_bulan1,
            'sem3_bulan2' => $sem3_bulan2,
            'sem3_bulan3' => $sem3_bulan3,
            'sem3_bulan4' => $sem3_bulan4,
            'sem3_bulan5' => $sem3_bulan5,
            'sem3_bulan6' => $sem3_bulan6,
        ];
        $this->ModelPembayaran->SimpanPemb($data);
        session()->setFlashdata('update', 'Data Berhasil DiUbah');
        return redirect()->to('Pembayaran/BayarSPP/' . $id_pemb_siswa .'/'. $id_siswa .'/'. $id_jurusan);
    }

    public function PembSPP4($id_pemb_siswa, $id_siswa, $id_jurusan)
    {   
        $sem4_bulan1 = $this->request->getPost('sem4_bulan1');
        $sem4_bulan2 = $this->request->getPost('sem4_bulan2');
        $sem4_bulan3 = $this->request->getPost('sem4_bulan3');
        $sem4_bulan4 = $this->request->getPost('sem4_bulan4');
        $sem4_bulan5 = $this->request->getPost('sem4_bulan5');
        $sem4_bulan6 = $this->request->getPost('sem4_bulan6');
        $data = [
            'id_pemb_siswa' => $id_pemb_siswa,
            'id_siswa' => $id_siswa,
            'id_jurusan' => $id_jurusan,
            'sem4_bulan1' => $sem4_bulan1,
            'sem4_bulan2' => $sem4_bulan2,
            'sem4_bulan3' => $sem4_bulan3,
            'sem4_bulan4' => $sem4_bulan4,
            'sem4_bulan5' => $sem4_bulan5,
            'sem4_bulan6' => $sem4_bulan6,
        ];
        $this->ModelPembayaran->SimpanPemb($data);
        session()->setFlashdata('update', 'Data Berhasil DiUbah');
        return redirect()->to('Pembayaran/BayarSPP/' . $id_pemb_siswa .'/'. $id_siswa .'/'. $id_jurusan);
    }


    public function PembSPP5($id_pemb_siswa, $id_siswa, $id_jurusan)
    {   
        $sem5_bulan1 = $this->request->getPost('sem5_bulan1');
        $sem5_bulan2 = $this->request->getPost('sem5_bulan2');
        $sem5_bulan3 = $this->request->getPost('sem5_bulan3');
        $sem5_bulan4 = $this->request->getPost('sem5_bulan4');
        $sem5_bulan5 = $this->request->getPost('sem5_bulan5');
        $sem5_bulan6 = $this->request->getPost('sem5_bulan6');
        $data = [
            'id_pemb_siswa' => $id_pemb_siswa,
            'id_siswa' => $id_siswa,
            'id_jurusan' => $id_jurusan,
            'sem5_bulan1' => $sem5_bulan1,
            'sem5_bulan2' => $sem5_bulan2,
            'sem5_bulan3' => $sem5_bulan3,
            'sem5_bulan4' => $sem5_bulan4,
            'sem5_bulan5' => $sem5_bulan5,
            'sem5_bulan6' => $sem5_bulan6,
        ];
        $this->ModelPembayaran->SimpanPemb($data);
        session()->setFlashdata('update', 'Data Berhasil DiUbah');
        return redirect()->to('Pembayaran/BayarSPP/' . $id_pemb_siswa .'/'. $id_siswa .'/'. $id_jurusan);
    }


    public function PembSPP6($id_pemb_siswa, $id_siswa, $id_jurusan)
    {   
        $sem6_bulan1 = $this->request->getPost('sem6_bulan1');
        $sem6_bulan2 = $this->request->getPost('sem6_bulan2');
        $sem6_bulan3 = $this->request->getPost('sem6_bulan3');
        $sem6_bulan4 = $this->request->getPost('sem6_bulan4');
        $sem6_bulan5 = $this->request->getPost('sem6_bulan5');
        $sem6_bulan6 = $this->request->getPost('sem6_bulan6');
        $data = [
            'id_pemb_siswa' => $id_pemb_siswa,
            'id_siswa' => $id_siswa,
            'id_jurusan' => $id_jurusan,
            'sem6_bulan1' => $sem6_bulan1,
            'sem6_bulan2' => $sem6_bulan2,
            'sem6_bulan3' => $sem6_bulan3,
            'sem6_bulan4' => $sem6_bulan4,
            'sem6_bulan5' => $sem6_bulan5,
            'sem6_bulan6' => $sem6_bulan6,
        ];
        $this->ModelPembayaran->SimpanPemb($data);
        session()->setFlashdata('update', 'Data Berhasil DiUbah');
        return redirect()->to('Pembayaran/BayarSPP/' . $id_pemb_siswa .'/'. $id_siswa .'/'. $id_jurusan);
    }
}
