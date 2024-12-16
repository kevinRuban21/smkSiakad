<div class="col-md-12">
          <div class="card card-outline card-success">
            <div class="card-header">
              <h3 class="card-title">
                <?= $subjudul ?>
              </h3>
            </div>

            <?php
                session();
                $validasi = \Config\Services::validation(); 
            ?>

            <?php echo form_open_multipart('Siswa/InsertData') ?>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group">
                    <label>NIPD</label>
                    <input name="nipd" class="form-control" placeholder="NIPD">
                    <p class="text-danger"><?= $validasi->getError('nipd') ?></p>
                </div>
                <div class="form-group">
                    <label>NISN</label>
                    <input name="nisn" class="form-control" placeholder="NISN">
                    <p class="text-danger"><?= $validasi->getError('nisn') ?></p>
                </div>
                <div class="form-group">
                    <label>Nama Siswa</label>
                    <input name="nama_siswa" class="form-control" placeholder="Nama Siswa">
                    <p class="text-danger"><?= $validasi->getError('nama_siswa') ?></p>
                </div>
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
                    <p class="text-danger"><?= $validasi->getError('tempat_lahir') ?></p>
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input name="tgl_lahir" type="date" class="form-control" placeholder="Tanggal Lahir">
                    <p class="text-danger"><?= $validasi->getError('tgl_lahir') ?></p>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jk" class="form-control">
                      <option value="">--- Jenis Kelamin ---</option>
                      <option value="L">Laki-Laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                    <p class="text-danger"><?= $validasi->getError('jk') ?></p>
                </div>
                <div class="form-group">
                        <label>Jurusan</label>
                        <select name="id_jurusan" class="form-control">
                            <option value="">--Pilih jurusan--</option>
                            <?php foreach ($jurusan as $key => $k) { ?>
                                <option value="<?= $k['id_jurusan'] ?>"><?= $k['jurusan'] ?></option>
                            <?php }  ?>
                        </select>
                </div>
                <div class="form-group">
                    <label>Tahun Angkatan</label>
                    <input type="number" min="2021" maxlength="4" minlength="4" name="tahun_angkatan" class="form-control" placeholder="2021">
                    <p class="text-danger"><?= $validasi->getError('tahun_angkatan') ?></p>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                      <option value="">--- Status Siswa ---</option>
                      <option value="1">Aktif</option>
                      <option value="2">Alumni</option>
                      <option value="3">Pindah</option>
                      <option value="4">Drop Out</option>
                    </select>
                    <p class="text-danger"><?= $validasi->getError('status') ?></p>
                </div>
                <div class="form-group">
                    <label>Nama Orang Tua/Wali</label>
                    <input name="nama_ortu" class="form-control" placeholder="Nama Orang Tua/Wali">
                    <p class="text-danger"><?= $validasi->getError('nama_ortu') ?></p>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input name="password" class="form-control" placeholder="Password">
                    <p class="text-danger"><?= $validasi->getError('password') ?></p>
                </div>
                <div class="form-group">
                    <label>Foto Siswa</label>
                    <input type="file" accept="image/*" name="foto_siswa" id="preview_gambar" class="form-control">
                    <p class="text-danger">*Gunakan Resolusi Gambar 1080 x 1085*</p>
                    <p class="text-danger"><?= $validasi->getError('foto_siswa') ?></p>
                </div>
                <div class="form-group">
                    <label>Preview Foto</label><br>
                    <img src="" id="gambar_load" width="100vw">
                </div>
                <div class="form-group invisible">
                    <input name="level" class="form-control" value="3">
                </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
              <a href="<?= base_url('Siswa') ?>" class="btn btn-danger"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
            </div>
            <?php echo form_close() ?>
          </div>
        </div>
        <!-- /.col-->

        <script>
          function bacaGambar(input){
            if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function(e){
                $('#gambar_load').attr('src', e.target.result);
              }
              reader.readAsDataURL(input.files[0]); 
            }
          }
          $('#preview_gambar').change(function(){
            bacaGambar(this);
          })
        </script>