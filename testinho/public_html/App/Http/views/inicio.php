<div class="row align-items-center">
    <!-- LEFT COL -->
    <div class="col-md-7">
        <div class="atf-single-details">
            <h3 class="text-capitalize text-white"><?php echo $stitle; ?></h3>
            <h4 class="typed-word text-white" style="height: 20px; overflow: block;"><?php echo $stext; ?></h4>
            <div class="atf-main-btn mt-5">
                <a href="contato.php" class="page-scroll atf-themes-btn">Contato</a>
                <!-- Botão de Download com Funcionalidade -->
                <a href="./dashboard/uploads/curriculo/1081ABRAÃ_O_ POLCARO_curriculo.pdf" download="<?php echo $pdf_curriculo; ?>" class="page-scroll atf-themes-btn btn-2">Download Cv</a>
            </div>
        </div>
    </div>
    <!-- RIGHT COL -->
    <div class="col-md-5 mt-md-40 wow fadeIn mt-3" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
        <div class="atf_home_clip atf-default-img text-center">
            <img data-aos="fade-left" data-aos-duration="1000" class="d-block ml-auto logo card-s" src="./dashboard/uploads/welcome/<?php echo $ufile; ?>" alt="Card image">
        </div>
    </div>
</div>
