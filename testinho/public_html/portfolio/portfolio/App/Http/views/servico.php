<div class="row justify-content-center">
            <div class="col-lg-5 col-md-7 col-12 text-center">
                <div class="atf-section-title wow zoomIn" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
                    <h2 class=""><?php print $service_title ?></h2>
                    <div class="atf-sec_icon">
                        <span></span>
                        <span class="atf-sec_radius"></span>
                        <span></span>
                    </div>
                    <p><?php print $service_text ?></p>
                </div>
            </div>
        </div>
        <div class='row text-center'>
            <?php
            $counter = 0;

            foreach ($services as $service) :
                if ($counter >= 3) {
                    break;
                }
            ?>
                <div class='col-lg-4 col-12 col-md-6 mb-4'>
                    <div class='logo card-s card'>
                        <h6 class='atf-time mt-2 bg-line text-white'><?= $service['service_title'] ?></h6>
                        <img class='card-img-top img-fluid atf_home_img2 img mt-3 ' src='dashboard/uploads/services/<?= $service['ufile'] ?>' alt=''>
                        <li class='atf-single-resume d-block wow fadeIn' data-wow-duration='1s' data-wow-delay='0.2s' data-wow-offset='0'>
                            <h6 class='atf-section-title mt-2 mb-3'><?= $service['service_desc'] ?></h6>
                        </li>
                        <div class="atf-section-title mt-2 mb-2">
                            <a class='' href='servicedetail.php?id=<?= $service['id'] ?>'><button class='page-scroll atf-themes-btn'>Saiba mais</button></a>
                            <a class='' href='<?= $service['service_link'] ?>?id=<?= $service['id'] ?>'><button class='page-scroll atf-themes-btn'>Ver site</button></a>
                        </div>
                    </div>
                </div>
            <?php
                $counter++;
            endforeach;
            ?>
        </div>