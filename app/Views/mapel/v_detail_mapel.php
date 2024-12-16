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
                <table class="table table-bordered table-sm">
                    <tr class="text-center bg-success">
                        <th>NO</th>
                        <th>Kode</th>
                        <th>Mata Pelajaran</th>
                        <th>Semester</th>
                        <th>Aksi</th>
                    </tr>
                    <?php $no=1; foreach($mapel as $key => $d){ ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center"><?= $d['kode_mapel'] ?></td>
                            <td><?= $d['mapel'] ?></td>
                            <td><?= $d['smt'] ?>(<?= $d['semester'] ?>)</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="<?= base_url('Mapel/DeleteData/' . $jurusan['id_jurusan'].'/'. $d['id_mapel']) ?>" onclick="return confirm('Yakin Ingin Menghapus Data Ini')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
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
                <?php echo form_open('Mapel/InsertData/'. $jurusan['id_jurusan']) ?>
                <div class="modal-body">

                <div class="form-group">
                    <label>Kode Mata Pelajaran</label>
                    <input name="kode_mapel" class="form-control" placeholder="Kode Mata Pelajaran" required>
                </div>
                <div class="form-group">
                    <label>Mata Pelajaran</label>
                    <input name="mapel" class="form-control" placeholder="Mata Pelajaran" required>
                </div>
                <div class="form-group">
                    <label>KKM</label>
                    <input name="kkm" class="form-control" placeholder="KKM" required>
                </div>
                <div class="form-group">
                    <label>Deskripsi Pengetahuan</label>
                    <textarea name="desk"  class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Deskripsi Keterampilan</label>
                    <textarea name="k_desk"  class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Semester</label>
                    <select name="smt" class="form-control">
                        <option value="">--Pilih Semester--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </div>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Simpan</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
            </div>
        <!-- /.modal-dialog -->
      </div>

      

          

      