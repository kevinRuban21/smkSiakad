<!--====== SLIDER PART START ======-->
    
<section id="slider-part" class="slider-active">
  <?php foreach ($slider as $key => $value) { ?>
        <div class="single-slider bg_cover pt-100" style="background-image: url(<?= base_url('gambarslider/' . $value['gambar_slider']) ?>" data-overlay="4">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-9">
                        <div class="slider-cont">
                            <p class="text-uppercase" style="font-size: 4vh;" data-animation="fadeInUp" data-delay="1.3s"><?= $value['deskripsi_slider'] ?></p>
                            <h1 class="text-uppercase" data-animation="bounceInLeft" data-delay="1s"><?= $value['judul_slider'] ?></h1>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- single slider -->
  <?php } ?>

    </section>
    
    <!--====== SLIDER PART ENDS ======-->
   
   
    <!--====== ABOUT PART START ======-->
    
    <section id="about-part" class="pt-65">
        <div class="container">
          <?php 
            $db = \Config\Database::connect();
            $web = $db->table('tbl_sekolah')->get()->getRowArray();

          ?>
            <div class="row">
              <div class="col-lg-6">
                  <div class="section-title mt-50">
                        <h5 class="text-success">About us</h5>
                        <h2 class="text-uppercase"><?= $web['nama_sekolah'] ?> </h2>
                    </div> <!-- section title -->
                    <div class="about-cont text-justify">
                        <p>SMK Kasih Theresia terletak di Ohoi (Desa) Bombay, Kecamatan Kei Besar, Pulau Kei Besar. Kehadiran sekolah yang bergerak di bidang pariwisata ini, menjadikannya sebagai SMK pertama di Pulau Kei Besar. SMK Kasih Theresia juga merupakan sekolah kejuruan pertama yang membuka jurusan ekonomi perbankan di Maluku Tenggara.</p>
                    </div>
              </div> <!-- about cont -->
              <div class="col-lg-5 offset-lg-1">
                    <div class="category-form">
                        <div class="form-title text-center" style="background-color: #198754 !important">
                            <h3>KEPALA SEKOLAH</h3>
                            <span class="text-uppercase"><?= $web['nama_sekolah'] ?></span>
                        </div>
                        <div class="main-form">
                          <div class="singel-form">
                            <center>
                              <img src="<?= base_url('foto/' . $web['foto_kepsek']) ?>" width="250px">
                            </center>
                          </div>
                          <div class="singel-form">
                            <center>
                              <h5><?= $web['kepsek'] ?></h5>
                            </center>
                          </div>
                    </div>
              </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== ABOUT PART ENDS ======-->

   
    <!--====== COURSE PART START ======-->
    
    <section id="course-part" class="pt-115 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title pb-45">
                        <h5 class="text-success">Berita</h5>
                        <h2>Berita Terbaru </h2>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row course-slied mt-30">
              <?php foreach ($beritabaru as $key => $b) { ?>
                <div class="col-lg-4">
                    <div class="singel-course"> 
                        <div class="thum">
                            <div class="image">
                              <img src="<?= base_url('gambar/' . $b['gambar']) ?>" alt="Blog">
                            </div>
                        </div>
                        <div class="cont">
                            <a href="<?= base_url('Home/ViewBerita/' . $b['slug_berita']) ?>"><h4 class="hijau_hvr"><?= $b['judul_berita'] ?></h4></a>
                            <div class="course-teacher">
                                <div class="name">
                                  <h6><span class="text-success"><i class="fa fa-calendar"></i> <?= date('d M Y', strtotime($b['tgl_berita'])) ?></span></h6>
                                </div>
                            </div>
                        </div>
                    </div> <!-- singel course -->
                </div>
              <?php } ?> 
                
            </div> <!-- course slied -->
        </div> <!-- container -->
    </section>
    
    <!--====== COURSE PART ENDS ======-->

    <!--====== COUNTER PART START ======-->
    <div id="counter-part" class="bg_cover pt-50 pb-50 gray-bg" data-overlay="4" style="background-attachment: fixed; background-image: url(<?= base_url('bg/bg1.jpeg') ?>)">
        <div class="container">
        <?php 
            $db = \Config\Database::connect();
            $jurusan = $db->table('tbl_jurusan')->countAll();
            $guru = $db->table('tbl_guru')->countAll();
            $siswa = $db->table('tbl_siswa')->countAll();
          ?>
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="singel-counter text-center mt-40">
                        <span><span class="counter"><?= $jurusan ?></span></span>
                        <p>Jurusan</p>
                    </div> <!-- singel counter -->
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="singel-counter text-center mt-40">
                      <span><span class="counter"><?= $guru ?></span></span>
                      <p>Guru</p>
                    </div> <!-- singel counter -->
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="singel-counter text-center mt-40">
                      <span><span class="counter"><?= $siswa ?></span></span>
                        <p>Siswa</p>
                    </div> <!-- singel counter -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div>
    
    <!--====== COUNTER PART ENDS ======-->
  