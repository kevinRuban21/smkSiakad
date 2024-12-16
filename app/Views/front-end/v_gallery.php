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

    <!--====== CONTACT PART START ======-->
    
    <section id="contact-page" class="pt-90 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-from mt-30">
                        <div class="section-title">
                            <h5 class="text-success"><?= $judul ?></h5>
                        </div> <!-- section title -->
                        <div class="main-form pt-45">
                           <div class="row">
                            <?php 
                                $db = \Config\Database::connect();
                                foreach ($glr as $key => $g){
                                    $user = $db->table('tbl_gallery')->get()->getRowArray();
                            ?>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="singel-teachers mt-30 text-center">
                                            <div class="image">
                                                <img src="<?= base_url('gallery/' . $g['foto']) ?>" alt=" Foto Guru">
                                            </div>
                                            <div class="cont">
                                                <span><?= $g['ket'] ?></span>
                                            </div>
                                        </div> <!-- singel teachers -->
                                </div>
                            <?php } ?>
                           </div>
                           
                        </div> <!-- main form -->
                    </div> <!--  contact from -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== CONTACT PART ENDS ======-->