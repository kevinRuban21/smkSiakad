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

            <?php echo form_open_multipart('Berita/UpdateData/' . $berita['id_berita']) ?>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group">
                    <label>Judul Berita</label>
                    <input name="judul_lama" value="<?= $berita['judul_berita'] ?>" hidden>
                    <input name="judul_berita" value="<?= $berita['judul_berita'] ?>" class="form-control" placeholder="Judul Berita">
                    <p class="text-danger"><?= $validasi->getError('judul_berita') ?></p>
                </div>
                <div class="form-group">
                    <label>isi Berita</label>
                    <textarea id="summernote" name="isi_berita"><?= $berita['isi_berita'] ?></textarea>
                    <p class="text-danger"><?= $validasi->getError('isi_berita') ?></p>
                </div>
                <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" accept="image/*" name="gambar" id="preview_gambar" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('gambar') ?></p>
                    <p class="text-danger">*Gunakan Resolusi Gambar 870 x 489*</p>
                </div>
                <div class="form-group">
                    <label>Preview Gambar</label><br>
                    <img src="<?= base_url('gambar/' . $berita['gambar']) ?>" id="gambar_load" width="250vh">
                </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
              <a href="<?= base_url('Berita') ?>" class="btn btn-danger"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
            </div>
            <?php echo form_close() ?>
          </div>
        </div>
        <!-- /.col-->

        <script>
            $(function () {
                // Summernote
                $('#summernote').summernote({
                    height: 400,
                })

                // CodeMirror
                CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
                });
            })
        </script>

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