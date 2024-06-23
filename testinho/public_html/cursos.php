<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "./includes/header.php";
require "./routes/routes.php";
?>

<section id='education' class='atf-education-area atf-section-padding atf-service-area'>
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-lg-5 col-md-7 col-12 text-center">
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
<?php if (!empty($ursos)) : ?>
<div class='row text-center'>
    <?php foreach ($ursos as $urso) : ?>
        <div class='col-lg-4 col-md-4 col-sm-6 mb-4'>
            <div class='logo card-s card'>
                <h6 class='atf-time mt-2 bg-line text-white'><?= isset($urso['curso_title']) ? $urso['curso_title'] : 'Título não definido'; ?></h6>
                <img class='card-img-top img-fluid atf_home_img2 img mt-3' src='dashboard/uploads/cursos/<?= isset($urso['ufile']) ? $urso['ufile'] : 'caminho/para/imagem/default.jpg'; ?>' alt='<?= isset($urso['ufile']) ? $urso['ufile'] : 'Imagem não definida'; ?>'>
                <li class='atf-single-resume d-block wow fadeIn' data-wow-duration='1s' data-wow-delay='0.2s' data-wow-offset='0'>
                    <h6 class='atf-section-title mb-3 text-center mb-3 mt-3'><?= $urso['curso_detail'] ?></h6>
                </li>
                <div class="atf-section-title mt-2 mb-2">
                    <a class='' href='cursosdetail.php?id=<?= $urso['id'] ?>'><button class='page-scroll atf-themes-btn'>Saiba mais</button></a>

                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php else : ?>
            <p>Nenhum curso encontrado.</p>
        <?php endif; ?>
    </div>
</section>

<?php include "includes/chat.php"; ?>
<?php include "includes/footer.php"; ?>


