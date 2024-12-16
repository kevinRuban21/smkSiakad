<div class="col-md-12">
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title"><?= $subjudul ?> Tahun Ajaran : <?= $ta_aktif['ta'] ?>-<?= $ta_aktif['semester'] ?></h3>

                
                <!-- /.card-tools -->
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
                <table class="table table-bordered table-sm">
                    <tr class="text-center bg-success">
                        <th width="50px">NO</th>
                        <th>Jurusan</th>
                        <th>Kelas</th>
                        <th>Mata Pelajaran</th>
                        <th width="150px">Data Siswa</th>
                    </tr>
                    <?php $no=1; foreach($jadwal as $key => $d){ ?>
                      <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td><?= $d['jurusan'] ?></td>
                        <td><?= $d['kelas'] ?>/<?= $d['tahun_angkatan'] ?></td>
                        <td><?= $d['mapel'] ?>/<?= $d['smt'] ?>(<?= $d['semester'] ?>)</td>
                        <td class="text-center">
                          <div class="btn-group">
                            <a href="<?= base_url('InputNilai/DataSiswa/' . $d['id_jadwal']) ?>" class="btn btn-warning btn-sm mr-2 ml-2"><i class="fas fa-table"></i> Data Siswa</a>
                          </div>
                        </td>
                      </tr>
                    <?php } ?>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->