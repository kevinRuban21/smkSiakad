<div class="col-md-12">
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title"><?= $subjudul ?></h3>

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
                <b>Tahun Ajaran: <?= $ta['ta'] ?>-<?= $ta['semester'] ?></b>
                <table class="table table-bordered table-sm">
                    <tr class="text-center bg-success">
                        <th>NO</th>
                        <th>Kelas</th>
                        <th>Rombel</th>
                        <th>Aksi</th>
                    </tr>
                    <?php $no=1; foreach($romkel as $key => $d){ ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center"><?= $d['kelas'] ?></td>
                            <td class="text-center"><?= $d['nama_romkel'] ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button class="btn btn-warning btn-sm mr-2" data-toggle="modal" data-target="#edit<?= $d['id_romkel'] ?>"><i class="fas fa-pencil-alt"></i></button>
                                    <a href="<?= base_url('Romkel/DeleteData/' . $d['id_romkel']) ?>" onclick="return confirm('Yakin Ingin Menghapus Data Ini')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
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
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Tambah <?= $subjudul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <?php echo form_open('Kelas/InsertData') ?>
                <div class="modal-body">

                <div class="form-group">
                    <label>Kelas</label>
                    <input name="kelas" class="form-control" placeholder="Kelas" required>
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


    <?php foreach($romkel as $key => $d){ ?>
        <div class="modal fade" id="edit<?= $d['id_kelas'] ?>">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Edit <?= $subjudul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <?php echo form_open('Kelas/UpdateData/' . $d['id_kelas'] ) ?>
                <div class="modal-body">

                <div class="form-group">
                    <label>Kelas</label>
                    <input name="kelas" value="<?= $d['kelas'] ?>" class="form-control" placeholder="Kelas" required>
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