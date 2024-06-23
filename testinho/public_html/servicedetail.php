<?php
include "./includes/header.php";
include "./config/TodoMsqli_real.php";
require "./routes/routes.php";
include "./includes/security-url.php";
if(isset($_GET['id'])) {
    $id = $_GET['id'];
  
    $sql = "SELECT * FROM service WHERE id = $id";
    $result = mysqli_query($con, $sql);
    
    if (!$result) {
        die('Erro na consulta: ' . mysqli_error($con));
    }
    
    if(mysqli_num_rows($result) > 0) {
        $serviceDetail = mysqli_fetch_assoc($result);
        // var_dump($serviceDetail);

        
?>
<section id='service' class='atf-service-area atf-section-padding  atf-service-area'>
    <div class='container'>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-12 text-center"> <!-- Adjusted column width -->
                <div class="atf-section-title wow zoomIn" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
                <h2 class=""><?php print $service_title ?></h2>
                    <div class="atf-sec_icon">
                        <span></span>
                        <span class="atf-sec_radius"></span>
                        <span></span>
                    </div>
                    <p><?= $serviceDetail['service_text'] ?></p>
                </div>
            </div>
        </div>
        <div class='row text-center'>
            <div class='col-lg-4 col-12 col-md-6'>
                <!-- <h3 class='mt-5 bg-line text-white text-center'><?= $serviceDetail['service_title'] ?></h3> -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2"> <!-- Adjusted column width and offset -->
                <div class="atf-service-content wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0">
                    <div class="atf-single-services d-block logo card-s">
                        <img class="card-img-top img-fluid atf_home_img2 img " src="dashboard/uploads/services/<?= $serviceDetail['ufile'] ?>" alt="">
                        <div class="atf-services-text">
                            <h4 class="mt-3"><?= $serviceDetail['service_desc'] ?></h4>
                            <p class="mt-2 text-black"><?= $serviceDetail['service_detail'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    } else {
        echo "Serviço não encontrado para o ID fornecido";
    }
} else {
    echo "ID não fornecido";
}
?>
<?php include "includes/chat.php"; ?>
<?php include "includes/footer.php"; ?>