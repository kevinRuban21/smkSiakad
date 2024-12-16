<div class="col-md-12">
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">
                    <?= $subjudul ?><br>
                </h3>

                <div class="card-tools">
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#add">
                        <i class="fas fa-plus"></i> Tambah Data
                    </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">

              <table class="table table-borderless table-sm">
                    <tr>
                        <th width='150px'>Kelas</th>
                        <td>:</td>
                        <td><?= $kelas['kelas'] ?></td>   
                    </tr>
                    <tr>
                        <th  width='150px'>Angkatan</th>
                        <td>:</td>
                        <td><?= $kelas['tahun_angkatan'] ?></td>
                    </tr>
                    <tr>
                        <th  width='150px'>Jumlah Siswa</th>
                        <td>:</td>
                        <td><?= $jmlh ?></td>
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
                <table class="table table-bordered table-sm">
                    <tr class="text-center bg-success">
                        <th>NO</th>
                        <th>NIPD</th>
                        <th>NISN</th>
                        <th>Nama Siswa</th> 
                        <th>Aksi</th>
                    </tr>
                    <?php $no=1; foreach($siswa as $key => $d){ ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $d['nipd'] ?></td>
                            <td><?= $d['nisn'] ?></td>
                            <td><?= $d['nama_siswa'] ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="<?= base_url('Kelas/HpsSiswa/' . $d['id_siswa'].'/'. $kelas['id_kelas']) ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
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
                                <th>NO</th>
                                <th>NIPD</th>
                                <th>NISN</th>
                                <th>Nama Siswa</th>
                                <th>Jurusan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($siswa_blm as $key => $d){ ?>
                                <?php if ($kelas['id_jurusan'] == $d['id_jurusan']){ ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td class="text-center"><?= $d['nipd'] ?></td>
                                    <td class="text-center">
                                        <?= $d['nisn'] ?>
                                    </td>
                                    <td><?= $d['nama_siswa'] ?></td>
                                    <td><?= $d['jurusan'] ?></td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="<?= base_url('Kelas/TmbhSiswa/' . $d['id_siswa'].'/'. $kelas['id_kelas']) ?>" class="btn btn-success btn-sm mr-2 ml-2"><i class="fas fa-plus"></i></a>
                                        </div>
                                    </td>

                                </tr>
                                <?php }?>
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
        

    