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

            <?php echo form_open_multipart('Siswa/UpdateData/' . $siswa['id_siswa']) ?>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group">
                    <label>NIPD</label>
                    <input name="nipd" value="<?= $siswa['nipd'] ?>" class="form-control" placeholder="NIPD">
                    <p class="text-danger"><?= $validasi->getError('nipd') ?></p>
                </div>
                <div class="form-group">
                    <label>NISN</label>
                    <input name="nisn" value="<?= $siswa['nisn'] ?>" class="form-control" placeholder="NISN">
                    <p class="text-danger"><?= $validasi->getError('nisn') ?></p>
                </div>
                <div class="form-group">
                    <label>Nama Siswa</label>
                    <input name="nama_siswa" value="<?= $siswa['nama_siswa'] ?>" class="form-control" placeholder="Nama Siswa">
                    <p class="text-danger"><?= $validasi->getError('nama_siswa') ?></p>
                </div>
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input name="tempat_lahir" value="<?= $siswa['tempat_lahir'] ?>" class="form-control" placeholder="Tempat Lahir">
                    <p class="text-danger"><?= $validasi->getError('tempat_lahir') ?></p>
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input name="tgl_lahir" value="<?= $siswa['tgl_lahir'] ?>" type="date" class="form-control" placeholder="Tanggal Lahir">
                    <p class="text-danger"><?= $validasi->getError('tgl_lahir') ?></p>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jk" class="form-control">
                      <option value="">--- Jenis Kelamin ---</option>
                      <option value="L" <?= $siswa['jk'] == 'L' ? 'selected' : '' ?>>Laki-Laki</option>
                      <option value="P" <?= $siswa['jk'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                    </select>
                    <p class="text-danger"><?= $validasi->getError('jk') ?></p>
                </div>
                <div class="form-group">
                    <label>Tahun Angkatan</label>
                    <input type="number" min="2021" maxlength="4" minlength="4" value="<?= $siswa['tahun_angkatan'] ?>" name="tahun_angkatan" class="form-control" placeholder="2021">
                    <p class="text-danger"><?= $validasi->getError('tahun_angkatan') ?></p>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                      <option value="">--- Status Siswa ---</option>
                      <option value="1" <?= $siswa['status'] == '1' ? 'selected' : '' ?>>Aktif</option>
                      <option value="2" <?= $siswa['status'] == '2' ? 'selected' : '' ?>>Alumni</option>
                      <option value="3" <?= $siswa['status'] == '3' ? 'selected' : '' ?>>Pindah</option>
                      <option value="4" <?= $siswa['status'] == '4' ? 'selected' : '' ?>>Drop Out</option>
                    </select>
                    <p class="text-danger"><?= $validasi->getError('status') ?></p>
                </div>
                <div class="form-group">
                    <label>Nama Orang Tua/Wali</label>
                    <input name="nama_ortu" value="<?= $siswa['nama_ortu'] ?>" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('nama_ortu') ?></p>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input name="password" value="<?= $siswa['password'] ?>" class="form-control">
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
                    <img src="<?= base_url('fotosiswa/'. $siswa['foto_siswa']) ?>" id="gambar_load" width="100vw">
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