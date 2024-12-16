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

            <?php echo form_open_multipart('Setting/UpdateLogo') ?>
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
                    <label>Logo Sekolah </label><br>
                    <img src="<?= base_url('assets/' . $sekolah['logo_sekolah']) ?>" width="150vh">
                </div>
                <div class="form-group">
                    <label>Ganti Logo Sekolah</label>
                    <input type="file" accept=".png" name="logo_sekolah" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('logo_sekolah') ?></p>
                </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
            </div>
            <?php echo form_close() ?>
          </div>
        </div>
        <!-- /.col-->