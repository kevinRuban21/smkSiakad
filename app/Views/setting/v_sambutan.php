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

            <?php echo form_open_multipart('Setting/UpdateSambutan') ?>
            <!-- /.card-header -->
            <div class="card-body">
            <?php

                use CodeIgniter\Database\BaseUtils;

                if(session()->get('pesan')){
                echo '<div class="alert alert-success">';
                echo session()->get('pesan');
                echo '</div>';
                }

            ?>
                <div class="form-group">
                    <label>Nama Kepala Sekolah</label>
                    <input name="kepsek" value="<?= $sekolah['kepsek'] ?>" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('kepsek') ?></p>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>Foto Kepala Sekolah</label><br>
                        <img src="<?= base_url('foto/' . $sekolah['foto_kepsek']) ?>" class="mb-4" width="270vh">
                        <div class="form-group">
                            <label>Ganti Foto Kepala Sekolah</label>
                            <input type="file" accept="image/*" name="foto_kepsek" class="form-control">
                            <p class="text-danger"><?= $validasi->getError('foto_kepsek') ?></p>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Isi Sambutan</label>
                            <textarea id="summernote" name="sambutan"><?= $sekolah['sambutan'] ?></textarea>
                            <p class="text-danger"><?= $validasi->getError('sambutan') ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
            </div>
            <?php echo form_close() ?>
          </div>
        </div>
        <!-- /.col-->

        <script>
            $(function () {
                // Summernote
                $('#summernote').summernote({
                    height: 300,
                })

                // CodeMirror
                CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
                });
            })
        </script>