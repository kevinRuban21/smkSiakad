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
                            <th width="50px">Tahun Ajaran</th>
                            <th width="50px">Hari/Waktu</th>
                            <th width="200px">Mata Pelajaran</th>
                            <th width="150px">Kelas</th>
                            <th>Guru</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($jadwal as $key => $d){ ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td class="text-center"><?= $d['ta'] ?></td>
                                <td class="text-center"><?= $d['hari'] ?>/<?= $d['waktu'] ?></td>
                                <td><?= $d['mapel'] ?>/<?= $d['jurusan'] ?></td>
                                <td><?= $d['kelas'] ?>/<?= $d['tahun_angkatan'] ?></td>
                                <td><?= $d['nama_guru'] ?></td>
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
       

      

          

      