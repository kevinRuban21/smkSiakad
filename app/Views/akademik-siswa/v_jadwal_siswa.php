<?php

use App\Controllers\JadwalSiswa;
?>
<div class="col-md-12">
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">
                    <?= $subjudul ?>    
                </h3>
                <div class="card-tools">
                    <a href="<?= base_url('JadwalSiswa/PrintJadwal') ?>" target="_blank" class="btn btn-success btn-sm">
                        <i class="fas fa-print"></i> Print Jadwal
                    </a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-borderless table-sm">
                    <tr>
                        <th  width='150px'>Tahun Ajaran</th>
                        <td>:</td>
                        <td><?= $ta_aktif['ta'] ?>-<?= $ta_aktif['semester'] ?></td>
                    </tr>
                    <tr>
                        <th  width='150px'>Nama Siswa</th>
                        <td>:</td>
                        <td><?= $data_siswa['nama_siswa'] ?></td>
                    </tr>
                    <tr>
                        <th width='150px'>NISN</th>
                        <td>:</td>
                        <td><?= $data_siswa['nisn'] ?></td>   
                    </tr>
                    <tr>
                        <th width='150px'>Jurusan</th>
                        <td>:</td>
                        <td><?= $data_siswa['jurusan'] ?></td>   
                    </tr>
                    <tr>
                        <th width='150px'>Kelas</th>
                        <td>:</td>
                        <td><?= $data_siswa['kelas'] ?>/<?= $data_siswa['tahun_angkatan'] ?></td> 
                    </tr>   
                </table><br>
                <?php

                                use CodeIgniter\Database\BaseUtils;

                    if(session()->get('insert')){
                        echo '<div class="alert alert-success">';
                        echo session()->get('insert');
                        echo '</div>';
                    }
                    if(session()->get('eror')){
                        echo '<div class="alert alert-danger">';
                        echo session()->get('eror');
                        echo '</div>';
                    }
                    if(session()->get('delete')){
                        echo '<div class="alert alert-danger">';
                        echo session()->get('delete');
                        echo '</div>';
                    }
                ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center bg-success">
                            <th width="30px">NO</th>
                            <th width="30px">Semester</th>
                            <th width="100px">Kode Mapel</th>
                            <th width="200px">Mata Pelajaran</th>
                            <th>Guru</th>
                            <th width="50px">Hari/Waktu</th>
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
                            ->join('tbl_ta', 'tbl_ta.id_ta=tbl_jadwal_pelajaran.id_ta', 'LEFT')
                            ->where('tbl_jadwal_pelajaran.id_jurusan', $data_siswa['id_jurusan'])
                            ->where('tbl_jadwal_pelajaran.id_kelas', $data_siswa['id_kelas'])
                            ->where('tbl_jadwal_pelajaran.id_ta', $ta_aktif['id_ta'])
                            ->get()->getResultArray();
                        foreach($jadwal as $key => $d){ ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td class="text-center"><?= $d['smt'] ?>|<?= $d['ta'] ?></td>
                                <td class="text-center"><?= $d['kode_mapel'] ?></td>
                                <td><?= $d['mapel'] ?>/<?= $d['jurusan'] ?></td>
                                <td><?= $d['nama_guru'] ?></td>
                                <td class="text-center"><?= $d['hari'] ?>/<?= $d['waktu'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>


          
        

          <script>
            $(function () {
                $("#example1").DataTable({
                "paging": true,
                "searching": true,
                "responsive": true, 
                "lengthChange": true, 
                "autoWidth": false,
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            });
        </script>
       

      

          

      