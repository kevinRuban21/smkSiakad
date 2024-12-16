
<!doctype html>
<html lang="en">

<head>

    <?php 
        $db = \Config\Database::connect();
        $web = $db->table('tbl_sekolah')->where('id', 1)->get()->getRowArray();
        $jurusan = $db->table('tbl_jurusan')->get()->getResultArray();
        $mitra = $db->table('tbl_mitra')->get()->getResultArray();

      ?>
   
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--====== Title ======-->
    <title><?= $web['nama_sekolah'] ?> | <?= $judul ?></title>
    
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="<?= base_url('assets') ?>/<?= $web['logo_sekolah'] ?>" type="image/png">

    <!--====== Fonawesome ======-->
    <link rel="stylesheet" href="<?= base_url('edubin') ?>/fontawesome/css/all.min.css">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="<?= base_url('edubin') ?>/css/slick.css">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="<?= base_url('edubin') ?>/css/animate.css">
    
    <!--====== Nice Select css ======-->
    <link rel="stylesheet" href="<?= base_url('edubin') ?>/css/nice-select.css">
    
    <!--====== Nice Number css ======-->
    <link rel="stylesheet" href="<?= base_url('edubin') ?>/css/jquery.nice-number.min.css">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="<?= base_url('edubin') ?>/css/magnific-popup.css">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="<?= base_url('edubin') ?>/css/bootstrap.min.css">
    
    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="<?= base_url('edubin') ?>/css/font-awesome.min.css">
    
    <!--====== Default css ======-->
    <link rel="stylesheet" href="<?= base_url('edubin') ?>/css/default.css">
    
    <!--====== Style css ======-->
    <link rel="stylesheet" href="<?= base_url('edubin') ?>/css/style.css">
    
    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="<?= base_url('edubin') ?>/css/responsive.css">

    <style>
      .lgn{
        background-color: #198754 !important;
        color: #fff !important;
      }
      .bg-kategori{
        background-color: #198754 !important;
      }

      .lgn:hover{
        color: #ffc600 !important;
      }

      .hijau_hvr:hover{
        color: #28a745 !important;
      }

      .kuning_hvr{
        background-color: #198754 !important;
        color: #fff !important;
      }

      .kuning_hvr:hover{
        background-color: #ffc600 !important;
        color: #fff !important;
      }

      .kuning{
        color: #fff !important;
        font-size: 3vh;
      }

      .kuning:hover{
        color:#ffc600 !important;
      }

      .kmbl:hover{
        background-color: #198754;
        color: #fff;
      }

      span .icon-bar{
        color: #198754 !important;
      }
    </style>
  
  
</head>

<body>
   
    <!--====== PRELOADER PART START ======-->
    
    <!-- <div class="preloader">
        <div class="loader rubix-cube">
            <div class="layer layer-1 bg-success"></div>
            <div class="layer layer-2 bg-success"></div>
            <div class="layer layer-3 color-1"></div>
            <div class="layer layer-4 bg-success"></div>
            <div class="layer layer-5 bg-success"></div>
            <div class="layer layer-6 bg-success"></div>
            <div class="layer layer-7 bg-success"></div>
            <div class="layer layer-8 bg-success"></div>
        </div>
    </div> -->
    
    <!--====== PRELOADER PART START ======-->
    
    <!--====== HEADER PART START ======-->
    
    <header id="header-part">
       
        <div class="header-top d-none d-lg-block" style="background-color: #198754;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="header-contact text-lg-left text-center">
                            <ul>
                                <li><i class="fas fa-map-marker-alt" style="color: #ffc107;"></i><span class="text-white"><?= $web['alamat_sekolah'] ?></span></li>
                                <li><i class="fas fa-envelope" style="color: #ffc107;"></i><span class="text-white"><?= $web['email_sekolah'] ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="header-opening-time text-lg-right text-center">
                          <div class="row">
                            <div class="col-8"></div>
                            <div class="col-1">
                              <a href="#" class="kuning"><i class="fa fa-facebook-f"></i></a>
                            </div>
                            <div class="col-1">
                              <a href="#" class="kuning"><i class="fa fa-twitter"></i></a>
                            </div>
                            <div class="col-1">
                              <a href="#" class="kuning"><i class="fab fa-youtube"></i></a>
                            </div>
                            <div class="col-1">
                              <a href="#" class="kuning"><i class="fa fa-instagram"></i></a>
                            </div>
                          </div>
                            
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- header top -->
        
        <div class="header-logo-support pt-30 pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="logo">
                            <a href="<?= base_url() ?>">
                                <img src="<?= base_url('assets') ?>/<?= $web['logo_sekolah'] ?>" alt="Logo" width="100px">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <div class="support-button float-right d-none d-md-block">
                            <div class="support float-left">
                                <div class="icon">
                                    <img src="<?= base_url('edubin') ?>/images/all-icon/support.png" alt="icon">
                                </div>
                                <div class="cont">
                                    <p>Butuh Bantuan? Silahkan Hubungi</p>
                                    <span><?= $web['telepon_sekolah'] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- header logo support -->
        
        <div class="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-9 col-8">
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <a href="<?= base_url() ?>" class="text-success">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="text-success">Profil</a>
                                        <ul class="sub-menu" style="background-color: #198754;">
                                            <li><a href="<?= base_url('Home/Sambutan') ?>">Sambutan</a></li>
                                            <li><a href="<?= base_url('Home/Sejarah') ?>">Sejarah</a></li>
                                            <li><a href="<?= base_url('Home/VisiMisi') ?>">Visi dan Misi</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="text-success">Jurusan</a>
                                        <ul class="sub-menu">
                                          <?php foreach ($jurusan as $key => $d) { ?>
                                            <li style="background-color: #198754;"><a href="<?= base_url('Home/DetailJurusan/' . $d['id_jurusan']) ?>"><?= $d['jurusan'] ?></a></li>
                                          <?php }?>     
                                        </ul>
                                    </li> 
                                    <li class="nav-item">
                                        <a href="<?= base_url('Home/Guru') ?>" class="text-success">Guru</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('Home/Berita') ?>" class="text-success">Berita</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('Home/Mitra') ?>" class="text-success">Mitra & Dukungan</a>
                                    </li>
                                </ul>
                            </div>
                        </nav> <!-- nav -->
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-3 col-4 mt-2">
                        <div class="button float-left">
                            <a href="<?= base_url('Auth') ?>" class="main-btn lgn border border-white">LOGIN</a>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>
        
    </header>
    
    <!--====== HEADER PART ENDS ======-->

    <!--====== PAGE CONTENT ======-->

    <?php
      if($page){
        echo view($page);
      }
    
    ?>

    <!--====== END PAGE CONTENT ======-->
   
   
    
   
    <!--====== PATNAR LOGO PART START ======-->
    
    <div id="patnar-logo" class="pt-50 pb-80 gray-bg">
        <div class="container">
          <div class="row">
          <div class="col-lg-12">
                    <div class="section-title pb-20">
                        <h5 class="text-success">Mitra & Dukungan</h5>
                    </div> 
                </div>
          </div>
          <div class="row patnar-slied">
            <?php foreach ($mitra as $key => $b) { ?>
              <div class="col-lg-12">
                  <div class="singel-patnar text-center mt-40">
                    <img src="<?= base_url('logomitra/' . $b['logo_mitra']) ?>" alt="Logo" width="100px">
                  </div>
              </div>
            <?php } ?> 
          </div> <!-- row -->
        </div> <!-- container -->
    </div> 
    
    <!--====== PATNAR LOGO PART ENDS ======-->
   
    <!--====== FOOTER PART START ======-->
    
    <footer id="footer-part">
        <div class="footer-top pt-40 pb-70 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-about mt-40">
                            <div class="logo">
                                <a href="#"><img src="<?= base_url('assets/' . $web['logo_sekolah']) ?>" width="120vh" alt="Logo"></a>
                            </div>
                            <h6 class="text-uppercase text-success"><?= $web['nama_sekolah'] ?></h6>
                            <p class="text-success"><i class="fas fa-map-marker-alt text-warning"></i> <?= $web['alamat_sekolah'] ?></p>
                            <p class="text-success"><i class="fas fa-envelope text-warning"></i></i> <?= $web['email_sekolah'] ?></p>
                            <p class="text-success"><i class="fas fa-phone-alt text-warning"></i></i></i> <?= $web['telepon_sekolah'] ?></p>
                            <ul class="mt-20">
                                <li><a href="#" class="kuning_hvr"><i class="fa fa-facebook-f"></i></a></li>
                                <li><a href="#" class="kuning_hvr"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="kuning_hvr"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="#" class="kuning_hvr"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div> <!-- footer about -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-link mt-40">
                            <div class="footer-title pb-25">
                                <h6 class="text-success">Sitemap</h6>
                            </div>
                            <ul>
                                <li><a class="text-success" href="<?= base_url() ?>"><i class="fa fa-angle-right"></i>Home</a></li>
                                <li><a class="text-success" href="<?= base_url('Home/Sambutan') ?>"><i class="fa fa-angle-right"></i>Sambutan</a></li>
                                <li><a class="text-success" href="<?= base_url('Home/Sejarah') ?>"><i class="fa fa-angle-right"></i>Sejarah</a></li>
                                <li><a class="text-success" href="<?= base_url('Home/VisiMisi') ?>"><i class="fa fa-angle-right"></i>Visi Misi</a></li>
                            </ul>
                            <ul>
                                <li><a class="text-success" href="<?= base_url('Home/Guru') ?>"><i class="fa fa-angle-right"></i>Guru</a></li>
                                <li><a class="text-success" href="<?= base_url('Home/Berita') ?>"><i class="fa fa-angle-right"></i>Berita</a></li>
                                <li><a class="text-success" href="<?= base_url('Home/Mitra') ?>"><i class="fa fa-angle-right"></i>Mitra</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-6">
                        <div class="footer-link support mt-40">
                            <div class="footer-title pb-25">
                                <h6 class="text-success">Location</h6>
                            </div>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.6804423780495!2d133.01029347377133!3d-5.614120255668616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d30251ab1754b2b%3A0xa788829a928b7167!2sSMK%20KASIH%20THERESIA!5e0!3m2!1sid!2sid!4v1719085469459!5m2!1sid!2sid" width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div> <!-- support -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer top -->
        
        <div class="footer-copyright pt-10 pb-25" style="background-color: #198754 !important;">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="copyright text-md-left text-center pt-15 text-light">
                        <strong>Copyright &copy; 2024 <a href="#" class="text-reset" style="color: #ffc600 !important;">SMK Kasih Theresia</a>.</strong> All rights reserved.
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="copyright text-md-right text-center pt-15">
                           
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer copyright -->
    </footer>
    
    <!--====== FOOTER PART ENDS ======-->
   
    <!--====== BACK TO TP PART START ======-->
    
    <a href="#" class="back-to-top kmbl"><i class="fa fa-angle-up"></i></a>
    
    <!--====== BACK TO TP PART ENDS ======-->
   
    
    
    
    
    
    
    
    <!--====== jquery js ======-->
    <script src="<?= base_url('edubin') ?>/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="<?= base_url('edubin') ?>/js/vendor/jquery-1.12.4.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="<?= base_url('edubin') ?>/js/bootstrap.min.js"></script>
    
    <!--====== Slick js ======-->
    <script src="<?= base_url('edubin') ?>/js/slick.min.js"></script>
    
    <!--====== Magnific Popup js ======-->
    <script src="<?= base_url('edubin') ?>/js/jquery.magnific-popup.min.js"></script>
    
    <!--====== Counter Up js ======-->
    <script src="<?= base_url('edubin') ?>/js/waypoints.min.js"></script>
    <script src="<?= base_url('edubin') ?>/js/jquery.counterup.min.js"></script>
    
    <!--====== Nice Select js ======-->
    <script src="<?= base_url('edubin') ?>/js/jquery.nice-select.min.js"></script>
    
    <!--====== Nice Number js ======-->
    <script src="<?= base_url('edubin') ?>/js/jquery.nice-number.min.js"></script>
    
    <!--====== Count Down js ======-->
    <script src="<?= base_url('edubin') ?>/js/jquery.countdown.min.js"></script>
    
    <!--====== Validator js ======-->
    <script src="<?= base_url('edubin') ?>/js/validator.min.js"></script>
    
    <!--====== Ajax Contact js ======-->
    <script src="<?= base_url('edubin') ?>/js/ajax-contact.js"></script>
    
    <!--====== Main js ======-->
    <script src="<?= base_url('edubin') ?>/js/main.js"></script>
    
    <!--====== Map js ======-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
    <script src="<?= base_url('edubin') ?>/js/map-script.js"></script>

</body>

</html>
