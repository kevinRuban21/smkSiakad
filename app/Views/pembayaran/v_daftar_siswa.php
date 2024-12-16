<div class="col-md-12">
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title"> <?= $subjudul ?></h3>

                <div class="card-tools">
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#add">
                        <i class="fas fa-plus"></i> Input Siswa
                    </button>
                </div>
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
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                    <tr class="text-center bg-success">
                      <th width="50px">No</th>
                      <th width="100px">NIPD</th>
                      <th width="100px">NISN</th>
                      <th>Siswa</th>
                      <th>Jurusan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; 
                    $db = \Config\Database::connect();
                    $pemb_siswa = $db->table('tbl_pemb_siswa')
                      ->join('tbl_siswa', 'tbl_siswa.id_siswa=tbl_pemb_siswa.id_siswa', 'LEFT')
                      ->join('tbl_jurusan', 'tbl_jurusan.id_jurusan=tbl_pemb_siswa.id_jurusan', 'LEFT')
                      ->where('tbl_pemb_siswa.id_jurusan', $jurusan['id_jurusan'])
                      ->get()->getResultArray();
                      foreach($pemb_siswa as $key => $d){ 
                        echo form_hidden($d['id_siswa'] . 'id_siswa', $d['id_siswa']);
                        ?> 
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $d['nipd'] ?></td>
                            <td><?= $d['nisn'] ?></td>
                            <td><?= $d['nama_siswa'] ?></td>
                            <td><?= $d['jurusan'] ?></td>
                            <td class="text-center">
                                    <div class="btn-group">
                                        <a href="<?= base_url('Pembayaran/DaftarBayar/' . $d['id_pemb_siswa'] . '/' . $d['id_siswa'] . '/' . $d['id_jurusan']) ?>" class="btn btn-warning btn-sm mr-2 ml-2"><i class="fas fa-table"></i>Pembayaran</a>
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
                          <th width="50px">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; 
                        $db = \Config\Database::connect();
                        $data_siswa = $db->table('tbl_siswa')
                          ->join('tbl_jurusan', 'tbl_jurusan.id_jurusan=tbl_siswa.id_jurusan', 'LEFT')
                          ->where('tbl_siswa.id_jurusan', $jurusan['id_jurusan'])
                          ->get()->getResultArray();
                          foreach($data_siswa as $key => $d){ 
                            echo form_hidden($d['id_siswa'] . 'id_siswa', $d['id_siswa']);
                          ?>
                            <tr>
                              <td><?= $no++ ?></td>
                              <td><?= $d['nipd'] ?></td>
                              <td><?= $d['nisn'] ?></td>
                              <td><?= $d['nama_siswa'] ?></td>
                              <td><?= $d['jurusan'] ?></td>
                              <td class="text-center">
                                <div class="btn-group">
                                    <a href="<?= base_url('Pembayaran/TmbhSiswa/' . $d['id_siswa'] .'/'. $d['id_jurusan']) ?>" class="btn btn-success btn-sm mr-2 ml-2"><i class="fas fa-plus"></i></a>
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