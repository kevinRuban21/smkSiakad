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

                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-borderless table-sm">
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
                            <th width="30px">Jenis Pembayaran</th>
                            <th width="100px">Jumlah Bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; 
                        $db = \Config\Database::connect();
                        $tagihan = $db->table('tbl_keuangan')
                            ->where('id_keuangan', 1)
                            ->get()->getRowArray();
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center">SPP</td>
                                <td class="text-center">Rp <?= rupiah($tagihan['spp']) ?> /bulan</td>  
                            </tr>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center">Raport</td>
                                <td class="text-center">Rp <?= rupiah($tagihan['raport']) ?> /bulan</td>  
                            </tr>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center">ID Card</td>
                                <td class="text-center">Rp <?= rupiah($tagihan['card']) ?> /bulan</td>  
                            </tr>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center">Batik</td>
                                <td class="text-center">Rp <?= rupiah($tagihan['batik']) ?> /bulan</td>  
                            </tr>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center">Training</td>
                                <td class="text-center">Rp <?= rupiah($tagihan['training']) ?> /bulan</td>  
                            </tr>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center">Pakaian Jurusan</td>
                                <td class="text-center">Rp <?= rupiah($tagihan['pj']) ?> /bulan</td>  
                            </tr>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center">UKK</td>
                                <td class="text-center">Rp <?= rupiah($tagihan['ukk']) ?> /bulan</td>  
                            </tr>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center">ANBK</td>
                                <td class="text-center">Rp <?= rupiah($tagihan['anbk']) ?> /bulan</td>  
                            </tr>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center">UAS</td>
                                <td class="text-center">Rp <?= rupiah($tagihan['uas']) ?> /bulan</td>  
                            </tr>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center">US</td>
                                <td class="text-center">Rp <?= rupiah($tagihan['us']) ?> /bulan</td>  
                            </tr>
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
       

      

          

      