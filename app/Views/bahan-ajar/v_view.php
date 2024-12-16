<div class="col-md-12">
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-newspaper"></i> <?= $subjudul ?></h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <h3><?= $ba['nama_ba'] ?></h3>
                <iframe src="<?= base_url('bahan_ajar/' . $ba['file_ba']) ?>" style="border: none;" height="800px" width="100%" title="Iframe Example"></iframe>
                
              </div>
              <!-- /.card-body -->
                <div class="card-footer">
                    <a href="<?= base_url('Berita') ?>" class="btn btn-danger"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                </div>
            </div>
          </div>
          <!-- /.col -->
