<?php include "z_db.php";

include "./App/Http/Controllers/ControllerSection_title.php";
include "./App/Http/Controllers/ControllerSiteContato.php";
include "./App/Http/Controllers/ControllerSiteConfig.php";
include "./App/Http/Controllers/ControllerCurso.php";
include "./App/Http/Controllers/ControllerService.php";
include "./App/Http/Controllers/ControllerPortfolio.php";
include "./App/Http/Controllers/ControllerWhy_us.php";
include "./App/Http/Controllers/ControllerSobre.php";
include "./App/Http/Controllers/ControllerWelcomeStatic.php";
include "./App/Http/Controllers/ControllerTestimony.php";
include "./App/Http/Controllers/ControllerVideo.php";
include "./App/Http/Controllers/ControllerBanner2.php";
include "./App/Http/Controllers/ControllerLogo.php";
include "./App/Http/Controllers/ControllerConfigFooter.php";

?>

<!DOCTYPE HTML>
<html lang="pt-Br">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="onepage, CV template, Portfolio template">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="one page template">

    <!-- The above 5 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php print $site_title ?></title>
    <?php 
$stmt = $con->prepare("SELECT xfile FROM logo WHERE id = ?");
$id = 79;
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $tr = $result->fetch_assoc();
    $xfile = $tr['xfile'];
} else {
    $xfile = null; 
}
// var_dump($xfile);
$stmt->close();
  ?>
  <link rel="icon" type="image/png" href="./dashboard/uploads/logo/<? echo $xfile; ?>">
 
    <!-- Latest Bootstrap min CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="resources/assets/fonts/font-awesome.css">
    <!--- owl carousel Css-->
    <link rel="stylesheet" href="resources/assets/owlcarousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="resources/assets/owlcarousel/css/owl.theme.default.min.css">
    <!--magnific-popup Css-->
    <link rel="stylesheet" href="resources/assets/css/magnific-popup.css">
    <!--animate Css-->
    <link rel="stylesheet" href="resources/assets/css/slicknav.css">
    <link rel="stylesheet" href="resources/assets/css/animate.css">
    <!--odometer.min Css-->
    <link rel="stylesheet" href="resources/assets/css/odometer.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="resources/assets/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="resources/assets/css/responsive.css">
    <!-- Chat CSS -->
    <link rel="stylesheet" href="resources/assets/css/style-chat.css">
    <!-- Animation -->
    <link rel="stylesheet" href="resources/assets/css/style_animacao.css">
    <!-- Progressbar -->
    <link rel="stylesheet" href="resources/assets/css/style-progressbar.css">
    <!-- card -->
    <link rel="stylesheet" href="resources/assets/css/card.css">
    <!-- Progressbar -->
    <link rel="stylesheet" href="resources/assets/css/mensagens.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't gallery if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    <style>
        .logo-black {
            filter: invert(1);
        }

        .logo-white {
            filter: invert(0);
        }
    </style>
    <!-- Css que iguala os tamanhos das imagens-->
    <Style>
        .atf_home_img2 {
            height: 200px;
            /* Set the desired height for all images */
            object-fit: cover;
            /* Ensure the image covers the specified height */
        }
    </Style>

</head>


<body>
    <div class="page-wrapper">

        <!-- <div class="atf-preloader">
            <div class="atf-status">
                <div class="atf-lds-roller">
                    <div>P</div>
                    <div>o</div>
                    <div>r</div>
                    <div>f</div>
                    <div>ó</div>
                    <div>l</div>
                    <div>i</div>
                    <div>o</div>
                </div>
            </div>
        </div> -->

        <!-- Back to Top Start -->
        <div class="back-to-top">
            <i class="fas fa-long-arrow-alt-up"></i>
        </div>
        <!-- Back to Top End -->
        <!-- START NAVBAR -->
        <div id="navigation" class="fixed-top atf-top-header navbar-light bg-faded site-navigation atf-cover-bg bg-line ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-4">
                        <div class="site-logo">
                            <img class="navbar-brand-regular" src="./dashboard/uploads/logo/<?php echo $ufile; ?>" alt="brand-logo" width="250px">
                            <!-- <img class="navbar-brand-sticky " src="./dashboard/uploads/logo/<?php echo $ux_file; ?>" alt="" width="250px"> -->
                        </div>
                    </div>
                    <script>
                        window.onscroll = function() {
                            var logo = document.getElementById('logo');
                            if (window.pageYOffset > 0) {
                                logo.classList.remove('logo-white');
                                logo.classList.add('logo-black');
                            } else {
                                logo.classList.remove('logo-black');
                                logo.classList.add('logo-white');
                            }
                        };
                    </script>
                    <!--- END Col -->
                    <div id="mobile_menu"></div>

                    <div class="col-lg-10 col-md-9 col-8">
                        <div class="header_right">
                            <nav id="main-menu" class="ms-lg-auto">
                                <ul>
                                    <li><a href="inicio">Inicio</a></li>
                                    <li><a href="sobre">Sobre</a></li>
                                    <li><a href="servicos">Serviços</a></li>
                                    <!-- <li><a href="#testimonial">Habilidades</a></li> -->
                                    <li><a href="portfolio">Portfólio</a></li>
                                    <li><a href="cursos">Cursos</a></li>
                                    <li><a href="contato">Contato</a></li>

                                    <li class="navbar-nav icons">
                                        <?php include "./App/Http/Controllers/ControllerRedeSocial.php"; ?>
                                    </li>
                                    <li class="nav-item">
                                        <a href="http://localhost:8086/portfolio/dashboard/login.php" class="nav-link"><i class="fas fa-home"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="http://localhost:8086/portfolio/email/" class="nav-link"><i class="fas fa-envelope-open"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!--- END Col -->
                </div>
                <!--- END ROW -->
            </div>
            <!--- END CONTAINER -->
        </div>
        <!-- END NAVBAR -->

  