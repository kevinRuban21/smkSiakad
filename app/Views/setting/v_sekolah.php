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

            <?php echo form_open_multipart('Setting/UpdateSekolah') ?>
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
                    <label>Nama Sekolah</label>
                    <input name="nama_sekolah" value="<?= $sekolah['nama_sekolah'] ?>" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('nama_sekolah') ?></p>
                </div>
                <div class="form-group">
                    <label>Alamat Sekolah</label>
                    <input name="alamat_sekolah" value="<?= $sekolah['alamat_sekolah'] ?>" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('nama_sekolah') ?></p>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input name="email_sekolah" value="<?= $sekolah['email_sekolah'] ?>" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('email_sekolah') ?></p>
                </div>
                <div class="form-group">
                    <label>Telepon</label>
                    <input name="telepon_sekolah" value="<?= $sekolah['telepon_sekolah'] ?>" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('telepon_sekolah') ?></p>
                </div>
                <div class="form-group">
                    <label>Visi dan Misi</label>
                    <textarea id="summernote" name="visi_misi_sekolah"><?= $sekolah['visi_misi_sekolah'] ?></textarea>
                    <p class="text-danger"><?= $validasi->getError('visi_misi_sekolah') ?></p>
                </div>
                <div class="form-group">
                    <label>Sejarah Sekolah</label>
                    <textarea id="summernote2" name="sejarah_sekolah"><?= $sekolah['sejarah_sekolah'] ?></textarea>
                    <p class="text-danger"><?= $validasi->getError('sejarah_sekolah') ?></p>
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

                $('#summernote2').summernote({
                    height: 300,
                })

                // CodeMirror
                CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
                });
            })
        </script>