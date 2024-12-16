<?php

use App\Controllers\Auth;
use CodeIgniter\Database\BaseUtils;

?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>

<?php 
        $db = \Config\Database::connect();
        $web = $db->table('tbl_sekolah')->where('id', 1)->get()->getRowArray();
        $jurusan = $db->table('tbl_jurusan')->get()->getResultArray();
        $siswa = $db->table('tbl_siswa')->get()->getRowArray();
?>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIAKAD | <?= $judul?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=base_url('AdminLTE')?>/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url('AdminLTE')?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url('AdminLTE')?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url('AdminLTE')?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('AdminLTE')?>/dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?=base_url('AdminLTE')?>/plugins/summernote/summernote-bs4.min.css">
  <!-- Favicon -->
  <link rel="icon" href="<?= base_url('assets') ?>/<?= $web['logo_sekolah'] ?>" type="image/gif">

  <!-- jQuery -->
<script src="<?=base_url('AdminLTE')?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('AdminLTE')?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?=base_url('AdminLTE')?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url('AdminLTE')?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url('AdminLTE')?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url('AdminLTE')?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=base_url('AdminLTE')?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url('AdminLTE')?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url('AdminLTE')?>/plugins/jszip/jszip.min.js"></script>
<script src="<?=base_url('AdminLTE')?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=base_url('AdminLTE')?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=base_url('AdminLTE')?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url('AdminLTE')?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url('AdminLTE')?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('AdminLTE')?>/dist/js/adminlte.min.js"></script>
<!-- Summernote -->
<script src="<?=base_url('AdminLTE')?>/plugins/summernote/summernote-bs4.min.js"></script>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url() ?>" class="nav-link text-success text-uppercase text-bold h5" ><?= $web['nama_sekolah'] ?></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Auth/Logout') ?>">
        <i class="fas fa-sign-out-alt"></i>Logout
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-success elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?= base_url('assets') ?>/<?= $web['logo_sekolah'] ?>" alt="SMK Kasih Theresia" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-light">SIAKAD</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('fotosiswa') ?>/<?= session()->get('foto_siswa') ?>" class="img-circle elevation-2" alt="Admin" style="opacity: .8">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= session()->get('nama_siswa') ?></a>
          <span class="badge bg-success">Online</span>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="<?= base_url('DashboardAdmin') ?>" class="nav-link <?= $menu == 'dashboard' ? 'active' : ''  ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dasboard</p>
                </a>
            </li>
          <li class="nav-item <?= $menu == 'akademik' ? 'menu-open' : ''  ?>">
            <a href="#" class="nav-link <?= $menu == 'akademik' ? 'active' : ''  ?>">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Akademik
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('JadwalSiswa') ?>" class="nav-link <?= $submenu == 'jadwal' ? 'active' : ''  ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jadwal Siswa</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="<?= base_url('NilaiSiswa') ?>" class="nav-link <?= $submenu == 'nilai' ? 'active' : ''  ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nilai</p>
                </a>
              </li> 
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('Tagihan') ?>" class="nav-link <?= $menu == 'tagihan' ? 'active' : ''  ?>"> 
            <i class="nav-icon fas fa-wallet"></i>
              <p>
                Tagihan
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $subjudul ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><?= $judul ?></a></li>
              <li class="breadcrumb-item active"><?= $subjudul ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <?php if ($page){
                echo view($page);
            }?>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2024 <a href="<?= base_url() ?>" class="text-reset" style="color: #28a745 !important;">SMK Kasih Theresia</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
</body>
</html>
