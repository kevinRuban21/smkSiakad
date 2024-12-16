<div class="col-md-12">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?></h3>
                <div class="card-tools"></div><!-- /.card-tools -->
        </div><!-- /.card-header -->
            <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                     <!-- Profile Image -->
                    <div class="card card-success card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                        <h5 class="text-bold">PROFIL SISWA</h5>
                        <img class="profile-user-img img-fluid img-circle"
                            src="<?= base_url('fotosiswa') ?>/<?= session()->get('foto_siswa') ?>"
                            alt="User profile picture">
                        </div>

                        <h5 class="profile-username text-center"><?= session()->get('nama_siswa') ?></h5>

                        <p class="text-muted text-center">
                            
                        </p>
                        <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>NIPD</b> <a class="float-right text-success"><?= SiswaLogin()->nipd ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>NINS</b> <a class="float-right text-success"><?= SiswaLogin()->nisn ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>TTL</b> <a class="float-right text-success"><?= SiswaLogin()->tempat_lahir ?>, <?= SiswaLogin()->tgl_lahir ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Jenis Kelamin</b> <a class="float-right text-success"><?= SiswaLogin()->jk== 'L' ? 'Laki-Laki' : 'Perempuan' ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Angkatan</b> <a class="float-right text-success"><?= SiswaLogin()->tahun_angkatan ?></a>
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
