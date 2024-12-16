<div class="col-md-12">
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">
                    <?= $subjudul ?><br>
                </h3>
      
                <div class="card-tools">
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#add">
                        <i class="fas fa-plus"></i> Input Siswa
                    </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">

              <table class="table table-borderless table-sm">
                    <tr>
                        <th width='150px'>Jurusan</th>
                        <td>:</td>
                        <td><?= $jadwal['jurusan'] ?></td>   
                    </tr>
                    <tr>
                        <th  width='150px'>Kelas</th>
                        <td>:</td>
                        <td><?= $jadwal['kelas'] ?></td>
                    </tr>
                    <tr>
                        <th  width='150px'>Mata Pelajaran</th>
                        <td>:</td>
                        <td><?= $jadwal['mapel'] ?></td>
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
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                    <tr class="text-center bg-success">
                      <th width="50px">No</th>
                      <th width="100px">NIPD</th>
                      <th width="100px">NISN</th>
                      <th>Siswa</th>
                      <th>Kelas</th>
                      <th width="100px">Nilai</th>
                      <th width="100px">Aksi</th>
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
                      ->where('tbl_nilai.id_jadwal', $jadwal['id_jadwal'])
                      ->get()->getResultArray();
                        foreach($nilai as $key => $d){ 
                          echo form_hidden($d['id_nilai'] . 'id_nilai', $d['id_nilai']);
                        ?> 
                          <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $d['nipd'] ?></td>
                            <td><?= $d['nisn'] ?></td>
                            <td><?= $d['nama_siswa'] ?></td>
                            <td><?= $d['kelas'] ?></td>
                            <td class="text-center">
                                    <div class="btn-group">
                                        <a href="<?= base_url('InputNilai/NilaiSiswa/' . $d['id_nilai']) . '/' . $d['id_siswa'] ?>" class="btn btn-warning btn-sm mr-2 ml-2"><i class="fas fa-table"></i> Input Nilai</a>
                                    </div>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="<?= base_url('InputNilai/HpsSiswa/' . $d['id_nilai']) . '/' . $d['id_jadwal'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                </div>
                            </td>
                          </tr>
                        <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->


           <!--tmbah Data -->
        <div class="modal fade" id="add">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Siswa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <?php echo form_open() ?>
                <div class="modal-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr class="text-center bg-success">
                          <th width="50px">NO</th>
                          <th width="50px">NIPD</th>
                          <th width="50px">NIDN</th>
                          <th width="50px">Siswa</th>
                          <th width="50px">Jurusan</th>
                          <th width="50px">Kelas</th>
                          <th width="50px">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; 
                        $db = \Config\Database::connect();
                        $siswa = $db->table('tbl_siswa')
                          ->join('tbl_jurusan', 'tbl_jurusan.id_jurusan=tbl_siswa.id_jurusan', 'LEFT')
                          ->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_siswa.id_kelas', 'LEFT')
                          ->where('tbl_siswa.id_kelas', $jadwal['id_kelas'])
                          ->get()->getResultArray();
                          foreach($siswa as $key => $d){ 
                            echo form_hidden($d['id_siswa'] . 'id_siswa', $d['id_siswa']);
                          ?>
                              
                              <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td class="text-center"><?= $d['nipd'] ?></td>
                                    <td class="text-center"> <?= $d['nisn'] ?></td>
                                    <td><?= $d['nama_siswa'] ?></td>
                                    <td><?= $d['jurusan'] ?></td>
                                    <td><?= $d['kelas'] ?></td>
                                    <td class="text-center">
                                      <div class="btn-group">
                                          <a href="<?= base_url('InputNilai/TmbhSiswa/' . $d['id_siswa'] .'/'. $d['id_kelas'] .'/'. $jadwal['id_mapel'] .'/'. $jadwal['id_jadwal'] .'/'. $ta_aktif['id_ta']) ?>" class="btn btn-success btn-sm mr-2 ml-2"><i class="fas fa-plus"></i></a>
                                      </div>
                                    </td>

                              </tr>
                              
                          <?php } ?>
                        </tbody>
                    </table>   
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
            </div>
        <!-- /.modal-dialog -->
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
        <script>
            $(function () {
                $("#example2").DataTable({
                "paging": true,
                "searching": true,
                "responsive": true, 
                "lengthChange": true, 
                "autoWidth": false,
                }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
            });
        </script>
        

    