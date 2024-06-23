<?php
include "./includes/header.php";
require "./routes/routes.php";
?>

<!-- ***** Breadcrumb Area Start ***** -->
<section id="portfolio" class="atf-portfolio-area atf-section-padding color-1 atf-service-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12">
                <div class="atf-portfolio-nav ">
                    <div class="row justify-content-center">
                        <div class="col-lg-7 col-md-7 col-12 text-center ">
                            <div class="atf-section-title wow zoomIn" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
                                <h2 class="mt-5"><?php print $port_title ?></h2>
                                <div class="atf-sec_icon">
                                    <span></span>
                                    <span class="atf-sec_radius"></span>
                                    <span></span>
                                </div>
                                <p class="text-center text-black"><?php print $port_text ?></p>
                            </div>
                        </div>
                    </div>
                    <div class='row text-center'>
                        <?php foreach ($portfolioItems2 as $portfolioItem2) : ?>
                            <div class='col-lg-4 col-md-6 col-sm-12 mb-4'>
                                <div class='logo card-s '>
                                    <h6 class='text-white mt-3 text-center bg-line'><?= $portfolioItem2['porti_title'] ?></h6>
                                    <a class='atf-popup-img atf-single-portfolio mt-3' href='dashboard/uploads/portfolio/<?= $portfolioItem2['ufile'] ?>'>
                                        <figure>
                                            <div class='image-box'>
                                                <img class='card-img-top img-fluid atf_home_img2' src='dashboard/uploads/portfolio/<?= $portfolioItem2['ufile'] ?>' alt='Card image cap'>
                                                <div class='atf-hover-portfolio'>
                                                    <div class='atf-portfolio-content'>
                                                        <div class='atf-portfolio-icon'>
                                                            <i class='fa fa-link'></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <li class='atf-single-resume d-block wow fadeIn' data-wow-duration='1s' data-wow-delay='0.2s' data-wow-offset='0'>
                                                <h6 class='text-center mt-3'><?= $portfolioItem2['porti_desc'] ?></h6>
                                            </li>
                                        </figure>
                                    </a>
                                    <!-- <a class='atf-themes-btn btn-2 text-center mt-3' href='portdetail.php?id=<?= $portfolioItem2['id'] ?>'>Saiba mais</a> -->
                                    <a class='atf-themes-btn btn-2 text-center mt-3' href='<?= $portfolioItem2['portfolio_link'] ?>?id=<?= $portfolioItem2['id'] ?>'>Ver site</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- *****About Area End***** -->

<?php include "includes/footer.php"; ?>
