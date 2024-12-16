<?php

use App\Controllers\NilaiSiswa;
?>
<div class="col-md-12">
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">
                    <?= $subjudul ?>    
                </h3>
                <div class="card-tools">
                    <a href="<?= base_url('NilaiSiswa/PrintNilai') ?>" target="_blank" class="btn btn-success btn-sm">
                        <i class="fas fa-print"></i> Print Nilai
                    </a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-borderless table-sm">
                    <tr>
                        <th width='150px'>NIPD</th>
                        <td>:</td>
                        <td><?= $data_siswa['nipd'] ?></td>   
                    </tr>
                    <tr>
                        <th width='150px'>NISN</th>
                        <td>:</td>
                        <td><?= $data_siswa['nisn'] ?></td>   
                    </tr>
                    <tr>
                        <th  width='150px'>Nama Siswa</th>
                        <td>:</td>
                        <td><?= $data_siswa['nama_siswa'] ?></td>
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
                    <tr>
                        <th  width='150px'>Tahun Ajaran</th>
                        <td>:</td>
                        <td><?= $ta_aktif['ta'] ?>-<?= $ta_aktif['semester'] ?></td>
                    </tr> 
                </table><br>
              </div>
              <!-- /.card-body -->
               <div class="card-body table-responsive">
                <?php

                                    use CodeIgniter\Database\BaseUtils;
                                    use Kint\Parser\ToStringPlugin;

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
                <table class="table table-hover text-nowrap table-bordered table-striped">
                    <thead>
                        <tr class="text-center bg-success">
                        <th width="30px">NO</th>
                        <th width="30px">Semester</th>
                        <th width="100px">Kode Mapel</th>
                        <th>Mata Pelajaran</th>
                        <th width="100px">Angka</th>
                        <th width="100px">Huruf</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; 
                            $db = \Config\Database::connect();
                            $nilai = $db->table('tbl_nilai')
                                ->join('tbl_mapel', 'tbl_mapel.id_mapel=tbl_nilai.id_mapel', 'LEFT')
                                ->join('tbl_siswa', 'tbl_siswa.id_siswa=tbl_nilai.id_siswa', 'LEFT')
                                ->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_nilai.id_kelas', 'LEFT')
                                ->join('tbl_ta', 'tbl_ta.id_ta=tbl_nilai.id_ta', 'LEFT')
                                ->join('tbl_jadwal_pelajaran', 'tbl_jadwal_pelajaran.id_jadwal=tbl_nilai.id_jadwal', 'LEFT')
                                ->where('tbl_nilai.id_siswa', $data_siswa['id_siswa'])
                                ->where('tbl_nilai.id_ta', $ta_aktif['id_ta'])
                                ->get()->getResultArray();
                            $jmlh = 0;
                            $jmlh_nilai = 0;
                        foreach($nilai as $key => $d){ 
                            echo form_hidden($d['id_nilai'] . 'id_nilai', $d['id_nilai']);
                            $jmlh = $jmlh + $d['na'];
                            $jmlh_nilai = $jmlh_nilai + $d['na'] / $d['na'];
                            $r = $jmlh / $jmlh_nilai;
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td class="text-center"><?= $d['smt'] ?>/<?= $d['semester'] ?></td>
                                <td class="text-center"><?= $d['kode_mapel'] ?></td>
                                <td><?= $d['mapel'] ?></td>
                                <td class="text-center"><?= $d['na'] ?></td>
                                <td class="text-center"><?= $d['huruf'] ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="4" class="text-center"><b>Rata-Rata</b></td>
                            <td colspan="2" class="text-center">
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
                        </tr>
                    </tbody>
                </table>
               </div>
               <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

          


          
        

          
       

      

          

      