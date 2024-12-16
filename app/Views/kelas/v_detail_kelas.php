<div class="col-md-12">
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">
                    <?= $subjudul ?><br>
                    <small><span class="text-bold">Jurusan</span> : <?= $jurusan['jurusan'] ?></small>
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
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center bg-success">
                            <th>NO</th>
                            <th>Kelas</th>
                            <th>Angkatan</th> 
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $db = \Config\Database::connect(); 
                        $no=1; 
                        foreach($kelas as $key => $d){ 
                            $jmlh = $db->table('tbl_siswa')
                                ->where('id_kelas', $d['id_kelas'])
                                ->countAllResults();
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td class="text-center"><?= $d['kelas'] ?></td>
                                <td class="text-center"><?= $d['tahun_angkatan'] ?></td>
                                <td class="text-center">
                                    <span class="badge bg-success"><?= $jmlh ?></span><br>
                                    <small><a href="<?= base_url('Kelas/RincianKelas/' . $d['id_kelas']) ?>" class="text-reset">Siswa</a></small>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-warning btn-sm mr-2" data-toggle="modal" data-target="#edit<?= $d['id_kelas'] ?>"><i class="fas fa-pencil-alt"></i></button>
                                        <a href="<?= base_url('Kelas/DeleteData/' . $jurusan['id_jurusan'].'/'. $d['id_kelas']) ?>" onclick="return confirm('Yakin Ingin Menghapus Data Ini')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
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
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Tambah <?= $subjudul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <?php echo form_open('Kelas/InsertData/'. $jurusan['id_jurusan']) ?>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Kelas</label>
                        <input name="kelas" class="form-control" placeholder="Kelas" required>
                    </div>   
                    <div class="form-group">
                        <label>Tahun Angkatan</label>
                        <select name="tahun_angkatan" class="form-control">
                            <option value="">-- Pilih Tahun Angkatan --</option>
                            <?php for ($i=date('Y'); $i>=date('Y')-5  ; $i--) { ?> 
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php }?>
                        </select>
                    </div>       
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Simpan</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
            </div>
        <!-- /.modal-dialog -->
      </div>

    <!--edit Data -->
    <?php foreach($kelas as $key => $d){ ?>
        <div class="modal fade" id="edit<?=$d['id_kelas'] ?>">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Edit <?= $subjudul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <?php echo form_open('Kelas/UpdateData/' . $jurusan['id_jurusan'].'/'. $d['id_kelas'] ) ?>
                <div class="modal-body">

                <div class="form-group">
                    <label>Kelas</label>
                    <input name="kelas" value="<?= $d['kelas'] ?>" class="form-control" placeholder="Kelas" required>
                </div>
                <div class="form-group">
                        <label>Tahun Angkatan</label>
                        <select name="tahun_angkatan" class="form-control">
                            <?php for ($i=date('Y'); $i>=date('Y')-5  ; $i--) { ?> 
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php }?>
                        </select>
                    </div> 
                
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Simpan</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
            </div>
        <!-- /.modal-dialog -->
      </div>
                        

    <?php } ?>


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
        