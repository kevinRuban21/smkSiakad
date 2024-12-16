
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIAKAD | Print Jadwal Siswa</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/dist/css/adminlte.min.css">
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
                Jadwal Pelajaran
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
                                <th width="30px">NO</th>
                                <th width="30px">Semester</th>
                                <th width="150px">Kode Mapel</th>
                                <th width="200px">Mata Pelajaran</th>
                                <th>Guru</th>
                                <th width="200px">Hari/Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; 
                            $db = \Config\Database::connect();
                            $jadwal = $db->table('tbl_jadwal_pelajaran')
                                ->join('tbl_mapel', 'tbl_mapel.id_mapel=tbl_jadwal_pelajaran.id_mapel', 'LEFT')
                                ->join('tbl_guru', 'tbl_guru.id_guru=tbl_jadwal_pelajaran.id_guru', 'LEFT')
                                ->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_jadwal_pelajaran.id_kelas', 'LEFT')
                                ->join('tbl_jurusan', 'tbl_jurusan.id_jurusan=tbl_jadwal_pelajaran.id_jurusan', 'LEFT')
                                ->where('tbl_jadwal_pelajaran.id_jurusan', $data_siswa['id_jurusan'])
                                ->where('tbl_jadwal_pelajaran.id_kelas', $data_siswa['id_kelas'])
                                ->get()->getResultArray();
                            foreach($jadwal as $key => $d){ ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td class="text-center"><?= $d['smt'] ?></td>
                                    <td class="text-center"><?= $d['kode_mapel'] ?></td>
                                    <td><?= $d['mapel'] ?></td>
                                    <td><?= $d['nama_guru'] ?></td>
                                    <td class="text-center"><?= $d['hari'] ?>/<?= $d['waktu'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
        <div class="col-9">
           
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
        <!-- /.col -->
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
