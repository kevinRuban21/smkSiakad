<!--====== PAGE BANNER PART START ======-->
    
<section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8" style="background-image: url(<?= base_url('edubin') ?>/images/page-banner-2.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Jurusan</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Jurusan</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $jurusan['jurusan'] ?></li>
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
                            <h5 class="text-success">Profil Jurusan</h5>
                            <h2><?= $jurusan['jurusan'] ?></h2>
                        </div> <!-- section title -->
                        <div class="main-form pt-45 text-justify">
                            <?= $jurusan['visi_misi'] ?>
                        </div> <!-- main form -->
                    </div> <!--  contact from -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== CONTACT PART ENDS ======-->