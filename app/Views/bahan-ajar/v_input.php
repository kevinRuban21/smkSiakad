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

            <?php echo form_open_multipart('BahanAjar/InsertData') ?>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group">
                    <label>Kode</label>
                    <input name="no_ba" class="form-control" placeholder="Kode Bahan Ajar">
                    <p class="text-danger"><?= $validasi->getError('no_ba') ?></p>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input name="nama_ba" class="form-control" placeholder="Nama Bahan Ajar">
                    <p class="text-danger"><?= $validasi->getError('nama_ba') ?></p>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <input name="deskripsi" class="form-control" placeholder="Deskripsi">
                    <p class="text-danger"><?= $validasi->getError('deskripsi') ?></p>
                </div>
                <div class="form-group">
                    <label>Bahan Ajar</label>
                    <input type="file" accept=".pdf" name="file_ba" class="form-control">
                    <p class="text-danger">*File Harus dalam Format .PDF*</p>
                    <p class="text-danger"><?= $validasi->getError('file_ba') ?></p>
                </div>
                <div class="form-group">
                    <label>Tanggal Upload</label>
                    <input name="tgl_upload" value="<?= date('Y-m-d') ?>" class="form-control" readonly>
                </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
              <a href="<?= base_url('BahanAjar') ?>" class="btn btn-danger"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
            </div>
            <?php echo form_close() ?>
          </div>
        </div>
        <!-- /.col-->

        <script>
            $(function () {
                // Summernote
                $('#summernote').summernote({
                    height: 200,
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