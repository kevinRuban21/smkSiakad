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
                <table class="table table-bordered table-sm">
                    <tr class="text-center bg-success">
                        <th>NO</th>
                        <th>Tahun Ajaran</th>
                        <th>Semester</th>
                        <th>Status</th>
                        <th>Setting</th>
                        <th>Aksi</th>
                    </tr>
                    <?php $no=1; foreach($ta as $key => $ta){ ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center"><?= $ta['ta'] ?></td>
                            <td class="text-center"><?= $ta['semester'] ?></td>
                            <td class="text-center">
                                <?php if ($ta['status'] == 0) {
                                    echo '<span class="badge bg-danger">Non-Aktif</span>';
                                }else{
                                    echo '<span class="badge bg-success">Aktif</span>';
                                } ?>
                            </td>
                            <td class="text-center">
                               <?php if ($ta['status'] == 0) { ?>
                                    <a href="<?= base_url('TahunAjaran/set_status_ta/' . $ta['id_ta']) ?>" class="btn btn-warning btn-sm"><i class="fas fa-check"></i> Aktifkan</a>
                               <?php } ?>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="<?= base_url('TahunAjaran/DeleteData/' . $ta['id_ta']) ?>" onclick="return confirm('Yakin Ingin Menghapus Data Ini')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
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
                <?php echo form_open('TahunAjaran/InsertData') ?>
                <div class="modal-body">

                <div class="form-group">
                    <label>Tahun Ajaran</label>
                    <input name="ta" class="form-control" placeholder="2023/2024" required>
                </div>
                <div class="form-group">
                    <label>Semester</label>
                    <select name="semester" class="form-control">
                      <option value="">--- Semester ---</option>
                      <option value="Ganjil">Ganjil</option>
                      <option value="Genap">Genap</option>
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


      


      