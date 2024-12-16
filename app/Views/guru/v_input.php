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

            <?php echo form_open_multipart('Guru/InsertData') ?>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group">
                    <label>Kode Guru</label>
                    <input name="kode_guru" class="form-control" placeholder="Kode Guru">
                    <p class="text-danger"><?= $validasi->getError('kode_guru') ?></p>
                </div>
                <div class="form-group">
                    <label>NIP</label>
                    <input name="nip" class="form-control" placeholder="NIP">
                    <p class="text-danger"><?= $validasi->getError('nip') ?></p>
                </div>
                <div class="form-group">
                    <label>Nama Guru</label>
                    <input name="nama_guru" class="form-control" placeholder="Nama Guru">
                    <p class="text-danger"><?= $validasi->getError('nama_guru') ?></p>
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
                    <label>Pendidikan</label>
                    <select name="pendidikan" class="form-control">
                      <option value="">--- Pendidikan ---</option>
                      <option value="D3">D3-Diploma</option>
                      <option value="S1">S1-Sarjana</option>
                      <option value="S2">S2-Magister</option>
                      <option value="S3">S3-Doktor</option>
                    </select>
                    <p class="text-danger"><?= $validasi->getError('jk') ?></p>
                </div>
                <div class="form-group">
                    <label>Program Studi</label>
                    <input name="prodi" class="form-control" placeholder="Program Studi">
                    <p class="text-danger"><?= $validasi->getError('prodi') ?></p>
                </div>
                <div class="form-group">
                    <label>No Telpon</label>
                    <input name="telp_guru" class="form-control" placeholder="No Telpon">
                    <p class="text-danger"><?= $validasi->getError('telp_guru') ?></p>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input name="password" class="form-control" placeholder="Password">
                    <p class="text-danger"><?= $validasi->getError('password') ?></p>
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" accept="image/*" name="foto_guru" id="preview_gambar" class="form-control">
                    <p class="text-danger">*Gunakan Resolusi Gambar 1080 x 1085*</p>
                    <p class="text-danger"><?= $validasi->getError('foto_guru') ?></p>
                </div>
                <div class="form-group">
                    <label>Preview Foto</label><br>
                    <img src="" id="gambar_load" width="100vw">
                </div>
                <div class="form-group invisible">
                    <input name="level" class="form-control" value="2">
                </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
              <a href="<?= base_url('Guru') ?>" class="btn btn-danger"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
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