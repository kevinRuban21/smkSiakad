
<!DOCTYPE html>
<html lang="en">
<?php 
    $db = \Config\Database::connect();
    $web = $db->table('tbl_sekolah')->where('id', 1)->get()->getRowArray();
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIAKAD | Print Raport Siswa</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/dist/css/adminlte.min.css">
  <!-- Favicon -->
  <link rel="icon" href="<?= base_url('assets') ?>/<?= $web['logo_sekolah'] ?>" type="image/gif">
</head>
<body>
    <div class="container">
    <div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
        <!-- info row -->
        <div class="row invoice-info">
        <div class="col-sm-1 invoice-col"></div>
            <div class="col-sm-2 invoice-col">
                <img src="<?= base_url('assets') ?>/<?= $sekolah['logo_sekolah'] ?>" width="120px">
            </div>
            <div class="col-sm-6 invoice-col">
            <table>
                <thead>
                    <tr>
                        <td rowspan="4"></td>
                        <td class="text-uppercase text-bold text-center" style="font-family: Arial, sans-serif; font-size: 18px">YAYASAN KASIH ANTONIUS MALUKU TENGGARA</td>
                        <td rowspan="4"></td>
                    </tr>
                    <tr>
                        <td class="text-uppercase text-bold text-center" style="font-family: Cambria; font-size: 20px"><?= $sekolah['nama_sekolah'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-uppercase text-center" style="font-family: Arial; font-size: 12px">Alamat : <?= $sekolah['alamat_sekolah'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center" style="font-family: Arial; font-size: 12px"> Tlp : <?= $sekolah['telepon_sekolah'] ?>; Email : <a href=""><u><?= $sekolah['email_sekolah'] ?></u></a></td>
                    </tr>
                </thead>
                </table>
            </div>
            <div class="col-sm-2 invoice-col mt-5">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td class="text-bold">NPSN : 70011890</td>
                    </tr>
                </thead>
            </table>
            </div>
            <div class="col-sm-1 invoice-col mt-5 pt-5"></div>

        </div><hr>
        <!-- /.row -->

        <div class="row">
            <div class="col-12 text-bold text-uppercase text-center h4">
                Raport Siswa
            </div>
        </div>
        <div class="row">
                <div class="col-1"></div>
                <div class="col-5">
                    <table>
                        <tr>
                            <td width="100px">Nama Siswa </td>
                            <td width="30px">:</td>
                            <td class="text-uppercase"><?= $data_siswa['nama_siswa'] ?></td>
                        </tr>
                        <tr>
                            <td>NISN </td>
                            <td>:</td>
                            <td><?= $data_siswa['nisn'] ?></td>
                        </tr>
                        <tr>
                            <td>Kelas </td>
                            <td>:</td>
                            <td><?= $data_siswa['kelas'] ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-5">
                <table>
                        <tr>
                            <td width="100px">Tahun Ajaran</td>
                            <td width="30px">:</td>
                            <td class="text-uppercase"><?= $ta_aktif['ta'] ?>-<?= $ta_aktif['semester'] ?></td>
                        </tr>
                        <tr>
                            <td>Jurusan </td>
                            <td>:</td>
                            <td><?= $data_siswa['jurusan'] ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td><?= date('d M Y') ?></td>
                        </tr>
                </table>
                </div>
                <div class="col-1"></div>
            </div><br>

        <!-- Table row -->
        <div class="row">
        <div class="col-12 table-responsive">
        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center bg-success">
                                <th rowspan="2" width="30px">NO</th>
                                <th rowspan="2">Mata Pelajaran</th>
                                <th colspan="4">Pengetahuan</th>
                                <th colspan="4">Keterampilan</th>
                            </tr>
                            <tr class="text-center bg-success">
                                <th width="50px">KKM</th>
                                <th width="50px">Angka</th>
                                <th width="50px">Predikat</th>
                                <th>Deskripsi</th>
                                <th width="50px">KKM</th>
                                <th width="50px">Angka</th>
                                <th width="50px">Predikat</th>
                                <th>Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; 
                            $db = \Config\Database::connect();
                            $nilai = $db->table('tbl_nilai')
                            ->join('tbl_mapel', 'tbl_mapel.id_mapel=tbl_nilai.id_mapel', 'LEFT')
                            ->join('tbl_siswa', 'tbl_siswa.id_siswa=tbl_nilai.id_siswa', 'LEFT')
                            ->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_nilai.id_kelas', 'LEFT')
                            ->join('tbl_jadwal_pelajaran', 'tbl_jadwal_pelajaran.id_jadwal=tbl_nilai.id_jadwal', 'LEFT')
                            ->where('tbl_nilai.id_siswa', $data_siswa['id_siswa'])
                            ->get()->getResultArray();
                            $jmlh = 0;
                            $jmlh_nilai = 0;
                            $k_jmlh = 0;
                            $k_jmlh_nilai = 0;
                            foreach($nilai as $key => $d){ 
                                echo form_hidden($d['id_nilai'] . 'id_nilai', $d['id_nilai']);
                                $jmlh = $jmlh + $d['na'];
                                $jmlh_nilai = $jmlh_nilai + $d['na'] / $d['na'];
                                $r = $jmlh / $jmlh_nilai;

                                $k_jmlh = $k_jmlh + $d['k_nilai'];
                                $k_jmlh_nilai = $k_jmlh_nilai + $d['na'] / $d['na'];
                                $kr = $k_jmlh / $k_jmlh_nilai;
                            ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td><?= $d['mapel'] ?></td>
                                    <td class="text-center"><?= $d['kkm'] ?></td>
                                    <td class="text-center"><?= $d['na'] ?></td>
                                    <td class="text-center"><?= $d['huruf'] ?></td>
                                    <td><?= $d['desk'] ?></td>
                                    <td class="text-center"><?= $d['kkm'] ?></td>
                                    <td class="text-center"><?= $d['k_nilai'] ?></td>
                                    <td class="text-center"><?= $d['k_huruf'] ?></td>
                                    <td><?= $d['desk'] ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                            <td colspan="2" class="text-center"><b>Rata-Rata</b></td>
                            <td colspan="4" class="text-center">
                                <b>
                                    <?php 
                                        if (empty($nilai)) {
                                            echo 0;
                                        }else{
                                            echo number_format($r, 2);
                                        }
                                    ?>
                                </b>
                            </td>
                            <td colspan="2" class="text-center"><b>Rata-Rata</b></td>
                            <td colspan="4" class="text-center">
                                <b>
                                    <?php 
                                        if (empty($nilai)) {
                                            echo 0;
                                        }else{
                                            echo number_format($kr, 2);
                                        }
                                    ?>
                                </b>
                            </td>
                        </tr>
                        </tbody>
                    </table>
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
        <?php if ($ta_aktif['semester'] == 'Genap') { ?>
        <div class="col-1">

        </div>
        <div class="col-4">
            <table>
                <tr>
                    <td class="text_center">Mengetahui</td>
                </tr>
                <tr>
                    <td class="text_center">Orang Tua/Wali</td>
                </tr>
                <tr>
                    <td><br><br><br><br></td>
                </tr>
                <tr>
                    <td class="text_center">( __________________ )</td>
                </tr>
                <tr>
                    <td class="text_center"><?= $data_siswa['nama_ortu'] ?></td>
                </tr>
            </table>
        </div>
        
            <div class="col-4 pt-5 mt-5">
            <table>
                <tr>
                    <td class="text_center">Mengetahui</td>
                </tr>
                <tr>
                    <td class="text_center">Kepala Sekolah</td>
                </tr>
                <tr>
                    <td><br><br><br><br></td>
                </tr>
                <tr>
                    <td class="text_center">( __________________ )</td>
                </tr>
                <tr>
                    <td class="text_center"><?= $web['kepsek'] ?></td>
                </tr>
            </table>
        </div>
        
        <!-- /.col -->
        <div class="col-3">
            <table>
                <tr>
                    <td class="text_center">Bombay, <?= date('d M Y') ?></td>
                </tr>
                <tr>
                    <td class="text_center">Siswa</td>
                </tr>
                <tr>
                    <td><br><br><br><br></td>
                </tr>
                <tr>
                    <td class="text_center">( __________________ )</td>
                </tr>
                <tr>
                    <td class="text_center"><?= $data_siswa['nama_siswa'] ?></td>
                </tr>
            </table>
        </div>
        <?php } ?>
        <!-- /.col -->
        <?php if ($ta_aktif['semester'] == 'Ganjil') { ?>
            <div class="col-1">

        </div>
        <div class="col-8">
            <table>
                <tr>
                    <td class="text_center">Mengetahui</td>
                </tr>
                <tr>
                    <td class="text_center">Orang Tua/Wali</td>
                </tr>
                <tr>
                    <td><br><br><br><br></td>
                </tr>
                <tr>
                    <td class="text_center">( __________________ )</td>
                </tr>
                <tr>
                    <td class="text_center"><?= $data_siswa['nama_ortu'] ?></td>
                </tr>
            </table>
        </div>
        
        <!-- /.col -->
        <div class="col-3">
            <table>
                <tr>
                    <td class="text_center">Bombay, <?= date('d M Y') ?></td>
                </tr>
                <tr>
                    <td class="text_center">Siswa</td>
                </tr>
                <tr>
                    <td><br><br><br><br></td>
                </tr>
                <tr>
                    <td class="text_center">( __________________ )</td>
                </tr>
                <tr>
                    <td class="text_center"><?= $data_siswa['nama_siswa'] ?></td>
                </tr>
            </table>
        </div>
        <?php } ?>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
    window.addEventListener("load", window.print());
    </script>
    </div>
</body>
</html>
