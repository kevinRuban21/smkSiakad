<div class="col-md-12">
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title"><?= $subjudul ?></h3>

                <div class="card-tools">

                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                     <!-- Profile Image -->
                    <div class="card card-success card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                        <h5 class="text-bold">PROFIL GURU</h5>
                        <img class="profile-user-img img-fluid img-circle"
                            src="<?= base_url('fotoguru') ?>/<?= session()->get('foto_guru') ?>"
                            alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center"><?= session()->get('nama_guru') ?></h3>

                        <p class="text-muted text-center">
                            <?= GuruLogin()->pendidikan ?>-<?= GuruLogin()->prodi ?>
                        </p>
                        <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>NIP</b> <a class="float-right text-success"><?= GuruLogin()->nip ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>TTL</b> <a class="float-right text-success"><?= GuruLogin()->tempat_lahir ?>, <?= GuruLogin()->tgl_lahir ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Jenis Kelamin</b> <a class="float-right text-success"><?= GuruLogin()->jk== 'L' ? 'Laki-Laki' : 'Perempuan' ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>No HP</b> <a class="float-right text-success"><?= GuruLogin()->telp_guru ?></a>
                        </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                

              
              </div>
            </div>
            <!-- /.card -->
          </div>
</div>
