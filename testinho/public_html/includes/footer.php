<?php include "z_db.php"; ?>
<!--====== Footer Area Start ======-->

<footer class="atf-footer-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col-12 text-center">
                <div class="atf-footer-boottom">
                    <div class="atf-footer-link">
                        <!-- Footer Bottom -->
                        <div class="footer-bottom">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Copyright Area -->
                                        <div class="copyright-area d-flex flex-wrap justify-content-center justify-content-sm-between text-center py-4">
                                            <div class="col-12 col-sm-6 col-lg-4 mb-3 p-3">
                                                <div class="footer-items">
                                                    <h3 class="footer-title text-white  mb-2">Sobre</h3>
                                                    <p class="mb-2 text-white"><?php print $site_about ?></p>
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-6 col-lg-4 mb-3 p-3">
                                                <div class="footer-items">
                                                    <h3 class="footer-title text-white  mb-2">Minhas Experiências</h3>
                                                    <ul>
                                                        <?php include "./App/Http/Controllers/ControllerServiceFooter.php"; ?>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-6 col-lg-4 mb-3 p-3">
                                                <div class="footer-items">
                                                    <h3 class="footer-title text-white mb-2">Redes sociais</h3>
                                                    <p class="mb-2 text-white"><?php print $follow_text ?></p>
                                                    <ul class="social-icons list-inline pt-2">
                                                        <?php include "./App/Http/Controllers/ControllerSocialFooter.php"; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="copyright-left text-white text-center">

                                    <?php print $site_footer ?>, desenvolvido por: Abraão Martins
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php include "./App/Http/Controllers/ControllerConfigFooter.php"; ?>
                </div>
            </div>
        </div>
        <!--- END ROW -->
    </div>
    <!--- END CONTAINER -->
</footer>
<!-- Script -->
<script src="mensagens.js"></script>
<!-- Latest jQuery -->
<script src="resources/assets/js/jquery-1.12.4.min.js"></script>
<!-- Latest compiled and minified Bootstrap -->
<script src="bootstrap/js/bootstrap.js"></script>
<!-- modernizer JS -->
<script src="resources/assets/js/modernizr.custom.js"></script>
<!-- Typed JS -->
<script src="resources/assets/js/typed.js"></script>
<!-- slicknav JS -->
<script src="resources/assets/js/jquery.slicknav.js"></script>
<script src="resources/assets/js/slicknav.js"></script>
<!-- imagesloaded JS -->
<script src="resources/assets/js/imagesloaded.pkgd.js"></script>
<!-- isotope.pkgd JS -->
<script src="resources/assets/js/isotope.pkgd.min.js"></script>
<!-- owl-carousel min js  -->
<script src="resources/assets/owlcarousel/js/owl.carousel.min.js"></script>
<!-- magnific-popup js -->
<script src="resources/assets/js/jquery.magnific-popup.js"></script>
<!-- tilt js -->
<script src="resources/assets/js/tilt.jquery.js"></script>
<!-- Counter js -->
<script src="resources/assets/js/jquery.counterup.js"></script>
<!-- waypoints js -->
<script src="resources/assets/js/waypoints.min.js"></script>
<!-- odometer js -->
<script src="resources/assets/js/odometer.min.js"></script>
<!-- jquery.appear js -->
<script src="resources/assets/js/jquery.appear.min.js"></script>
<!-- easing js -->
<script src="resources/assets/js/easing.min.js"></script>
<!-- particles js -->
<!-- particles JS-->
<script src="resources/assets/js/particles.js"></script>
<script src="resources/assets/js/app.js"></script>
<!-- wow js -->
<script src="resources/assets/js/wow.min.js"></script>
<!-- form-contact js -->
<script src="resources/assets/js/form-contact.js"></script>
<!-- main js -->
<script src="resources/assets/js/main.js"></script>
<script src="resources/assets/js/chat-envia-mensagem.js"></script>
<script src="resources/assets/js/chat-aparece.js"></script>
<script src="resources/assets/js/script_animacao.js"></script>
<script src="resources/assets/js/mensagens.js"></script>


</body>

</html>