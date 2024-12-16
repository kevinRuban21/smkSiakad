<div class="col-md-12">
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">
                    <?= $subjudul ?>    
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
                        <th width='150px'>Jurusan</th>
                        <td>:</td>
                        <td><?= $jurusan['jurusan'] ?></td>   
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
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center bg-success">
                            <th>NO</th>
                            <th>Semester</th>
                            <th>Kelas</th>
                            <th>Kode Mapel</th>
                            <th>Mapel</th>
                            <th>Guru</th>
                            <th>Hari</th>
                            <th>Waktu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($jadwal as $key => $d){ ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td class="text-center"><?= $d['smt'] ?>/<?= $d['ta'] ?></td>
                                <td class="text-center"><?= $d['kelas'] ?>/<?= $d['tahun_angkatan'] ?></td>
                                <td class="text-center"><?= $d['kode_mapel'] ?></td>
                                <td><?= $d['mapel'] ?></td>
                                <td><?= $d['nama_guru'] ?></td>
                                <td class="text-center"><?= $d['hari'] ?></td>
                                <td class="text-center"><?= $d['waktu'] ?></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="<?= base_url('JadwalPelajaran/DeleteData/' . $d['id_jadwal'].'/'. $jurusan['id_jurusan']) ?>" onclick="return confirm('Yakin Ingin Menghapus Data Ini')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
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
                <?php echo form_open('JadwalPelajaran/InsertData/'. $jurusan['id_jurusan']) ?>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Mata Pelajaran</label>
                        <select name="id_mapel" class="form-control">
                            <option value="">--Pilih Mapel--</option>
                            <?php foreach ($mapel as $key => $m) { ?>
                                <option value="<?= $m['id_mapel'] ?>"><?= $m['smt'] ?> | <?= $m['kode_mapel'] ?> | <?= $m['mapel'] ?></option>
                            <?php }  ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Guru</label>
                        <select name="id_guru" class="form-control">
                            <option value="">--Pilih Guru--</option>
                            <?php foreach ($guru as $key => $g) { ?>
                                <option value="<?= $g['id_guru'] ?>"><?= $g['nama_guru'] ?></option>
                            <?php }  ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <select name="id_kelas" class="form-control">
                            <option value="">--Pilih Kelas--</option>
                            <?php foreach ($kelas as $key => $k) { ?>
                                <option value="<?= $k['id_kelas'] ?>"><?= $k['kelas'] ?>/<?= $k['tahun_angkatan'] ?></option>
                            <?php }  ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Hari</label>
                        <select name="hari" class="form-control">
                            <option value="">--Pilih Hari--</option>
                            <option value="Senin">Senin</option>
                            <option value="Selesa">Selesa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Waktu</label>
                        <input name="waktu" class="form-control" placeholder="Ex: 08:00-10:00" required>
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
       

      

          

      