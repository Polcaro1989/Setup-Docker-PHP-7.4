<?php
include "./includes/header.php";
require "./routes/routes.php";
?>


<!-- START ABOUT -->
<section id="about" class="atf-section-padding ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-7 col-12 text-center">
                <div class='atf-section-title wow zoomIn' data-wow-duration='1s' data-wow-delay='0.3s' data-wow-offset='0'>
                    <h2 class=''><?php print $why_title ?></h2>
                    <div class='atf-sec_icon'>
                        <span></span>
                        <span class='atf-sec_radius'></span>
                        <span></span>
                    </div>
                    <p><?php print $why_text ?></p>
                </div>
            </div>
            <!--- END COL -->
        </div>
        <div class="row align-items-center">
            <div class="col-xl-6 col-12 mb-xl-40">
                <div class="atf-feature-img text-center">
                    <?php if (!empty($sobre)) : ?>
                        <img src="dashboard/uploads/sobre/<?= $sobre[0]['ufile'] ?>" alt="<?= $sobre[0]['ufile'] ?>" class="img-fluid card-s bg-line" style="background-color: var(--thm-color);" alt="...">
                    <?php endif; ?>
                </div>
            </div>
            <!--- END COL -->

            <div class="col-xl-6 col-12 ps-lg-5">
                <div class="about-single-content wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0">
                    <?php if (!empty($sobre)) : ?>
                        <h2 class="mt-5 bg-line text-white text-center"><?= $sobre[0]['sobre_stitle'] ?></h2>
                        <p class="mb-2"><?= $sobre[0]['sobre_stext'] ?></p>
                    <?php endif; ?>
                </div>

                <div class="row mt-4">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="atf-about-info about">
                            <ul class="atf-about-list list-unstyled">
                                <?php if (!empty($sobre)) : ?>
                                    <li>
                                        <span class="title">Nome:</span>
                                        <span class="value d-sm-inline-block d-lg-block d-xl-inline-block"><?= $sobre[0]['nome'] ?></span>
                                    </li>
                                    <li>
                                        <span class="title">Email:</span>
                                        <span class="value d-sm-inline-block d-lg-block d-xl-inline-block"><?= $sobre[0]['email'] ?></span>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="atf-about-info about">
                            <ul class="atf-about-list list-unstyled">
                                <?php if (!empty($sobre)) : ?>
                                    <li><span class="title">Formação:</span> <span class="value d-sm-inline-block d-lg-block d-xl-inline-block"><?= $sobre[0]['formacao'] ?></span></li>
                                    <li><span class="title">Endereço:</span> <span class="value d-sm-inline-block d-lg-block d-xl-inline-block theme_gray"><?= $sobre[0]['endereco'] ?></span></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="container">
                        <div class="skill-box">
                            <span class="title">HTML</span>
                            <div class="skill-bar">
                                <span class="skill-per html">
                                    <span class="tooltip">90%</span>
                                </span>
                            </div>
                        </div>
                        <div class="skill-box">
                            <span class="title">CSS</span>
                            <div class="skill-bar">
                                <span class="skill-per css">
                                    <span class="tooltip">70%</span>
                                </span>
                            </div>
                        </div>
                        <div class="skill-box">
                            <span class="title">JavaScript</span>
                            <div class="skill-bar">
                                <span class="skill-per javascript">
                                    <span class="tooltip">100%</span>
                                </span>
                            </div>
                        </div>
                        <div class="skill-box">
                            <span class="title ">NodeJS</span>
                            <div class="skill-bar">
                                <span class="skill-per nodejs ">
                                    <span class="tooltip ">100%</span>
                                </span>
                            </div>
                        </div>
                        <div class="skill-box">
                            <span class="title ">PHP</span>
                            <div class="skill-bar">
                                <span class="skill-per nodejs ">
                                    <span class="tooltip ">100%</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="atf-main-btn mt-4">
                        <a href="#about" class="page-scroll atf-themes-btn">Download Cv</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ABOUT FIM -->

<?php include "includes/chat.php"; ?>
<?php include "includes/footer.php"; ?>