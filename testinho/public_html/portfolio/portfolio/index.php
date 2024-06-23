<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "./includes/header.php";
require "./vendor/autoload.php";
require "./routes/routes.php";


?>

<section id="home" class="atf-header-area atf-align-items-details atf-cover-bg atf-width-area bg-line atf-service-area">
    <div id="particles-js"></div>
    <div class="container">
       <?php include "./App/Http/views/inicio.php";?>
    </div>
    <div id="product-alert">
        <div class="product-info">
            <img src="" alt="Product Image" id="product-image" />
        </div>
        <div id="product-text"></div>
        <!-- <button id="close-btn">Close</button> -->
    </div>
</section>
<!-- <div class="container">
        <div class="cards">
            <div class="services row">
                    <div class="content bg-white col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="d-flex justify-content-center align-items-center mb-3">
                        </div>
                    </div>
            </div>
        </div>
    </div> -->
<section class="row">
    <div class="tf__brand mt_120 xs_mt_80">
        <div class="col-12">
            <div class="marquee_animi bg-line">
                <div style="width: 100000px;" class="js-marquee-wrapper">
                    <div class="js-marquee">
                        <ul>
                            <?php foreach ($whyUsData as $data) : ?>
                                <li>
                                    <img class="avatar-sm radius-100 img-fluid rounded-5 small-icon" src="dashboard/uploads/why/<?= $data['ufile'] ?>" alt="<?= $data['ufile'] ?>">
                                    <span><?= $data['title'] ?> - <?= $data['detail'] ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <section id='education' class='atf-education-area atf-section-padding atf-service-area'>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7 col-12 text-center ">
                <div class="atf-section-title wow zoomIn" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
                    <h2 class=""><?= isset($about_title) ? $about_title : 'Título não definido'; ?></h2>
                    <div class="atf-sec_icon">
                        <span></span>
                        <span class="atf-sec_radius"></span>
                        <span></span>
                    </div>
                    <p><?= isset($about_text) ? $about_text : 'Texto não definido'; ?></p>
                </div>
            </div>
        </div>
        <div class='row text-center'>
            <?php foreach ($cursos as $curso) : ?>
                <div class="col-lg-4 col-12 col-md-6 mb-4">
                    <div class="logo card-s card">
                        <h6 class='atf-time mt-2 bg-line text-white'><?= isset($curso['curso_title']) ? $curso['curso_title'] : 'Título não definido'; ?></h6>
                        <img class='card-img-top img-fluid atf_home_img2 img mt-3' src='dashboard/uploads/cursos/<?= isset($curso['ufile']) ? $curso['ufile'] : 'caminho/para/imagem/default.jpg'; ?>' alt='<?= isset($curso['ufile']) ? $curso['ufile'] : 'Imagem não definida'; ?>'>
                        <li class='atf-single-resume d-block wow fadeIn' data-wow-duration='1s' data-wow-delay='0.2s' data-wow-offset='0'>
                        <h6 class='atf-section-title mb-3 text-center mb-3 mt-3'><?= $curso['curso_detail'] ?></h6>
                        </li>
                        <div class="atf-section-title mt-2 mb-2">
                            <a class='atf-themes-btn text-center' href='cursodetail.php?id=<?= isset($curso['id']) ? $curso['id'] : ''; ?>' style='margin-left: 10px;'>Saiba mais</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section> -->

<section id='service' class='atf-service-area atf-section-padding atf-service-area'>
    <div class='container'>
       <?php include('./App/Http/views/curso.php'); ?>
    </div>
</section>

<section id='service' class='atf-service-area atf-section-padding atf-service-area'>
    <div class='container'>
    <?php include('./App/Http/views/servico.php'); ?>

    </div>
</section>

<section id="portfolio" class="atf-portfolio-area atf-section-padding color-1 atf-service-area">
    <div class="container">
        <?php include"./App/Http/views/portfolio.php";?>
    </div>
</section>


<!-- START TESTIMONIAL -->
<section id="testimonial" class="atf-testimonial-area atf-section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-7 col-12 text-center">
                <div class="atf-section-title wow zoomIn" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
                    <h2 class=""><?php print $test_title; ?></h2>
                    <div class="atf-sec_icon">
                        <span></span>
                        <span class="atf-sec_radius"></span>
                        <span></span>
                    </div>
                    <p class=""><?php print $test_text; ?></p>
                </div>
            </div>
            <!--- END COL -->
        </div>
        <!--- END ROW -->

        <div class="row align-items-center">
            <div class="col-lg-6 mb-lg-40 col-12">
                <div class="atf-testi-img carousel slide custom-carousel" data-bs-ride="carousel">
                    <?php
                    foreach ($bannerItems as $item) :
                    ?>
                        <div class='carousel-item <?= $item['activeClass'] ?> col-lg-4'>
                            <img src='dashboard/uploads/banner/<?= $item['ufile'] ?>' class='d-block' alt='' />
                            <div class='carousel-caption'>
                                <h5 mt-4><?= $item['banner_title'] ?></h5>
                                <p><?= $item['banner_text'] ?></p>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                </div>
            </div>
            <!--- END COL -->

            <!-- Testimonials section Starts--><div class="col-lg-6 col-12">
    <div id="testimonial-slider" class="atf-testimonials-slide atf-main-testimonials atf-testimonial-slider owl-carousel owl-theme">
        <?php 
        // var_dump($testimoniesArray); // Verificar o conteúdo de $testimoniesArray

        foreach ($testimoniesArray as $testimony) : 
        ?>
            <div class="atf-testimonial-item text-center">
                <!-- Single review-->
                <div class="atf-testimonial-inner">
                    <div class="atf-testimonial-text"><?= $testimony['message'] ?></div>
                </div>
                <div class="atf-testimonial-info">
                    <div class="atf-testimonial-image mb-4">
                        <img class="avatar-lg radius-100 rounded-5" src="./dashboard/uploads/testimony/<?= $testimony['ufile'] ?>" class="rounded-start img-fluid" data-aos="fade-right" data-aos-duration="1500" alt="...">
                    </div>
                    <div class="atf-testimonial-name text-uppercase">
                        <h5><?= $testimony['testimony_name'] ?></h5>
                    </div>
                    <div class="atf-testimonial-designation">
                        <p><?= $testimony['position'] ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


            <!--- END COL -->
            <!-- Testimonials section Ends -->

        </div>
        <!--- END COL -->
    </div>
    <!--- END CONTAINER -->
</section>

<!--VIDEO START-->

<!-- <section>
    <?php include "./sections/section_area_map.php"; ?>
</section>  -->


<?php include "includes/chat.php"; ?>
<?php include "includes/footer.php"; ?>