<div class="col-md-12">
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title"><?= $subjudul ?></h3>

                
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              
                <table class="table table-borderless table-sm">
                        <tr>
                            <th width='150px'>Jurusan</th>
                            <td>:</td>
                            <td><?= $siswa['jurusan'] ?></td>
                        </tr> 
                        <tr>
                            <th width='150px'>Kelas</th>
                            <td>:</td>
                            <td><?= $siswa['kelas'] ?></td>   
                        </tr>
                        <tr>
                            <th width='150px'>Nama</th>
                            <td>:</td>
                            <td><?= $siswa['nama_siswa'] ?></td>   
                        </tr>
                        <tr>
                            <th  width='150px'>Tahun Ajaran</th>
                            <td>:</td>
                            <td><?= $ta_aktif['ta'] ?>-<?= $ta_aktif['semester'] ?></td>
                        </tr>
                    </table><br>
                    <?php

                                     use CodeIgniter\Database\BaseUtils;

                        if(session()->get('insert')){
                        echo '<div class="alert alert-success">';
                        echo session()->get('insert');
                        echo '</div>';
                        }
                        if(session()->get('update')){
                        echo '<div class="alert alert-success">';
                        echo session()->get('update');
                        echo '</div>';
                        }
                        if(session()->get('delete')){
                        echo '<div class="alert alert-danger">';
                        echo session()->get('delete');
                        echo '</div>';
                        }

                    ?>
                <?php foreach($nilai as $key => $d){ 
                    echo form_hidden($d['id_nilai'] . 'id_nilai', $d['id_nilai']);
                ?>
                <?php echo form_open_multipart('InputNilai/SimpanNilai/' . $d['id_nilai'] . '/' . $d['id_siswa']) ?>
                <table class="table table-bordered table-sm">
                    <tr class="text-center bg-success">
                        <th colspan="6">Pengetahuan</th>
                        <th colspan="2">Keterampilan</th>
                    </tr>
                    <tr class="text-center bg-success">
                      <th width="50px">Kehadiran</th>
                      <th width="50px">UAS</th>
                      <th width="50px">UTS</th>
                      <th width="50px">Tugas</th>
                      <th width="50px">Akhir</th>
                      <th width="50px">Predikat</th>
                      <th width="50px">Angka</th>
                      <th width="50px">Predikat</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="kehadiran" value="<?= $d['kehadiran'] ?>" class="form-control text-center"></td>
                        <td><input type="text" name="uas" value="<?= $d['uas'] ?>" class="form-control text-center"></td>
                        <td><input type="text" name="uts" value="<?= $d['uts'] ?>" class="form-control text-center"></td>
                        <td><input type="text" name="tugas" value="<?= $d['tugas'] ?>" class="form-control text-center"></td>
                        <td class="text-center"><?= $d['na'] ?></td>
                        <td class="text-center"><?= $d['huruf'] ?></td>
                        <td><input type="text" name="k_nilai" value="<?= $d['k_nilai'] ?>" class="form-control text-center"></td>
                        <td class="text-center"><?= $d['k_huruf'] ?></td>
                    </tr>
                </table>
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan Nilai</button>
                <?php echo form_close() ?>
                <?php } ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->