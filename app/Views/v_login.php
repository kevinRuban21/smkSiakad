
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIAKAD | <?= $judul?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('AdminLTE')?>/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url('AdminLTE')?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('AdminLTE')?>/dist/css/adminlte.min.css">
  <!-- Favicon -->
  <link rel="icon" href="<?= base_url('assets') ?>/<?= $web['logo_sekolah'] ?>" type="image/gif">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-success">
    <div class="card-header text-center">
      <img src="<?= base_url('assets/'. $web['logo_sekolah']) ?>" alt="Logo SMK Kasih Theresia" width="190px">
      <a href="<?= base_url()?>" class="h1 text-reset text-success"><b>SIAKAD</b></a>
    </div>
    <div class="card-body">

      <?php
      session();
      $validasi = \Config\Services::validation();
      if(session()->get('pesan')){
        echo '<div class="alert alert-danger">';
        echo session()->get('pesan');
        echo '</div>';
      }
      ?>

      <?php echo form_open('Auth/CekLogin') ?>
        <div class="input-group mb-3">
          <input name="username" class="form-control" placeholder="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          <p class="text-danger"><?= $validasi->getError('username') ?></p>
        </div>
        <div class="input-group mb-3">
        <select name="level" class="form-control">
            <option value="">--Level--</option>
            <option value="1">Admin</option>
            <option value="2">Guru</option>
            <option value="3">Siswa</option>
          </select>
          <p class="text-danger"><?= $validasi->getError('level') ?></p>
        </div>
        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <p class="text-danger"><?= $validasi->getError('password') ?></p>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-6">
            <a href="<?= base_url() ?>" class="btn btn-danger btn-block"><i class="fas fa-globe"></i> Website</a>
          </div>
          <div class="col-6">
            <button type="submit" class="btn btn-success btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
        <?php echo form_close() ?>
  </div>
  <!-- /.card -->
  <div class="card-footer">
    <div class="row">
      <!-- /.col -->
      <div class="col-12 text-center text-secondary">
        <strong>Copyright &copy; 2024 <a href="<?= base_url() ?>" class="text-reset" style="color: #28a745 !important;">SMK Kasih Theresia</a>.</strong> All rights reserved.
      </div>
      <!-- /.col -->
    </div>
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=base_url('AdminLTE')?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('AdminLTE')?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('AdminLTE')?>/dist/js/adminlte.min.js"></script>
</body>
</html>
