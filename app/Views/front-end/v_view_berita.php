<!--====== PAGE BANNER PART START ======-->
    
<section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8" style="background-image: url(<?= base_url('edubin') ?>/images/page-banner-2.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2><?= $judul ?></h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><?= $judul ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $berita['judul_berita'] ?></li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== PAGE BANNER PART ENDS ======-->

   <!--====== BLOG PART START ======-->
    
   <section id="blog-singel" class="pt-90 pb-120 gray-bg">
        <div class="container">
           <div class="row">
              <div class="col-lg-8">
                  <div class="blog-details mt-30">
                      <div class="thum">
                          <img src="<?= base_url('gambar/' . $berita['gambar']) ?>" alt="Blog Details">
                      </div>
                      <div class="cont">
                          <h3><?= $berita['judul_berita'] ?></h3>
                          <ul>
                               <li><a href="#"><i class="fa fa-calendar text-success"></i><?= date('d M Y', strtotime($berita['tgl_berita'])) ?></a></li>
                               <li><a href="#"><i class="fas fa-clock text-success"></i><?= $berita['jam_berita'] ?></a></li>
                           </ul>
                           <p><?= $berita['isi_berita'] ?></p>
                           <ul class="share">
                               <li class="title">Share :</li>
                               <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                               <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                               <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                               <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                               <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                           </ul>
                      </div> <!-- cont -->
                  </div> <!-- blog details -->
              </div>
               <div class="col-lg-4">
                   <div class="saidbar">
                       <div class="row">
                           <div class="col-lg-12 col-md-6">
                           <div class="saidbar-post mt-30">
                                   <h4>Berita Terbaru</h4>
                                   <ul>
                                    <?php foreach ($beritabaru as $key => $b) { ?>
                                        <li>
                                            <a href="<?= base_url('Home/ViewBerita/' . $b['slug_berita']) ?>">
                                                <div class="singel-post">
                                                   <div class="thum">
                                                       <img src="<?= base_url('gambar/' . $b['gambar']) ?>" alt="Blog">
                                                   </div>
                                                   <div class="cont">
                                                       <h6><?= $b['judul_berita'] ?></h6>
                                                       <span><?= date('d M Y', strtotime($b['tgl_berita'])) ?></span>
                                                   </div>
                                               </div> <!-- singel post -->
                                            </a>
                                       </li>
                                    <?php } ?>
                                         
                                   </ul>
                               </div> <!-- saidbar post -->
                           </div>
                       </div> <!-- row -->
                   </div> <!-- saidbar -->
               </div>
           </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== BLOG PART ENDS ======-->