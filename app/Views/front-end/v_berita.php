<!--====== PAGE BANNER PART START ======-->
    
<section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8" style="background-image: url(<?= base_url('edubin') ?>/images/page-banner-2.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2><?= $judul ?></h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $judul ?></li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== BLOG PART START ======-->
    
    <section id="blog-page" class="pt-90 pb-120 gray-bg">
        <div class="container">
           <div class="row">
               <div class="col-lg-8">

                <?php 
                    $db = \Config\Database::connect();
                    foreach ($berita as $key => $value){
                        $user = $db->table('tbl_user')
                            ->where('id_user', $value['id_user'])
                            ->get()->getRowArray();
                ?> 
                   <div class="singel-blog mt-30">
                       <div class="blog-thum">
                           <img src="<?= base_url('gambar/' . $value['gambar']) ?>" alt="Blog">
                       </div>
                       <div class="blog-cont">
                           <a href="<?= base_url('Home/ViewBerita/' . $value['slug_berita']) ?>"><h3 class="hijau_hvr"><?= $value['judul_berita'] ?></h3></a>
                           <ul>
                               <li><a href="#"><i class="fa fa-calendar text-success"></i><?= date('d M Y', strtotime($value['tgl_berita'])) ?></a></li>
                               <li><a href="#"><i class="fas fa-clock text-success"></i><?= $value['jam_berita'] ?></a></li>
                           </ul>
                       </div>
                   </div> 
                <?php } ?>

                <?= $pager->links('berita', 'custom_pager') ?>
                   
                   
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
                                                       <h6 class="hijau_hvr"><?= $b['judul_berita'] ?></h6>
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