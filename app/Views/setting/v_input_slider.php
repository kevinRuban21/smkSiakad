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

            <?php echo form_open_multipart('Setting/InsertDataSlider') ?>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group">
                    <label>Judul Slider</label>
                    <input name="judul_slider" class="form-control" placeholder="Judul Slider">
                    <p class="text-danger"><?= $validasi->getError('judul_slider') ?></p>
                </div>
                <div class="form-group">
                    <label>Deskripsi Slider</label>
                    <input name="deskripsi_slider" class="form-control" placeholder="Deskripsi">
                    <p class="text-danger"><?= $validasi->getError('deskripsi_slider') ?></p>
                </div>
                <div class="form-group">
                    <label>Gambar Slider</label>
                    <input type="file" accept="image/*" name="gambar_slider" id="preview_gambar" class="form-control">
                    <p class="text-danger">*Gunakan Resolusi Gambar 1800 x 1006*</p>
                    <p class="text-danger"><?= $validasi->getError('gambar_slider') ?></p>
                </div>
                <div class="form-group">
                    <label>Preview Gambar</label><br>
                    <img src="" id="gambar_load" width="100vw">
                </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
              <a href="<?= base_url('Setting/Slider') ?>" class="btn btn-danger"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
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