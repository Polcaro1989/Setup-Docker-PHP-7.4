<?php
include "./includes/header.php";
include "./config/TodoMsqli_real.php";
require "./routes/routes.php";
?>
<section id='service' class='atf-service-area atf-section-padding atf-service-area'>
    <div class='container'>
    <?php include('./App/Http/views/servico.php'); ?>

    </div>
</section>

<!--====== Call To Action Area Start ======-->
<?php include "includes/chat.php"; ?>
<?php include "includes/footer.php"; ?>
