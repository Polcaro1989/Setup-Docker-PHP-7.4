<?php
include "./includes/header.php";
include "z_db.php";


error_reporting(E_ALL);
ini_set('display_errors', 1);

$admin_emails = array();


if (!is_array($admin_emails)) {
    $admin_emails = array();
}

?>
<div id="successMessage" style="display: none;">Email enviado com Sucesso!</div>
<div id="errorMessage" style="display: none;">Erro ao enviar o email!</div>


<section id="contact" class="atf-contact-area atf-section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-7 col-12 text-center">
                <div class="atf-section-title wow zoomIn" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
                    <h2 class=""><?php print $contact_title ?></h2>
                    <div class="atf-sec_icon">
                        <span></span>
                        <span class="atf-sec_radius"></span>
                        <span></span>
                    </div>
                    <p class="d-none d-sm-block mt-4 text-black"><?php print $contact_text ?></p>
                </div>
            </div>
        </div>
 
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="row atf-contact-border">
                    <div class="col-md-12 col-lg-7 col-12 atf-border-right">
                        <h2 class="mb-3 bg-line text-center text-white">Formulário de contato</h2>
                        <form id="myForm" name="ContactForm" method="post" enctype="multipart/form-data">
                            <div class="atf-main-contact">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="Nome" required="required">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" name="emailaddres" placeholder="Email" required="required">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="phonenumber" placeholder="Telefone" required="required">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="subject" placeholder="Sujeito" required="required">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <textarea class="form-control" name="message" placeholder="Mensagem" required="required"></textarea></div>
                                </div>
                                <div class="col-md-12">
                                    <div class="atf-contact-btn">
                                        <button type="submit" class="btn atf-themes-btn" name="submit" value="send your message"><span class="text-white pr-3"><i class="fas fa-paper-plane"></i></span>Enviar mensagem</button>
                                    </div>
                                </div>
                            </div>
                        </form><br>
                        <p class="form-message"></p>
                    </div>

                    <div class="col-lg-5 col-md-12 col-12">
                        <div class="atf-contact-info mt-lg-40 text-center">
                            <div class="atf-contact-details">
                                <i class="fas fa-phone-volume"></i>
                                <div class="atf-contact-address">
                                    <h5>Telefone</h5>
                                    <h3><?php print $phone1 ?></h3>
                                </div>
                            </div>
                            <div class="atf-contact-details">
                                <i class="fa fa-envelope"></i>
                                <div class="atf-contact-address atf-contact-address1">
                                    <h5>E-mail</h5>
                                    <h3><?php print $email1 ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="contact" class="atf-contact-area atf-section-padding">
<div id="hire">
    <div class="container mt-5">
        <div class="row atf-hire-area align-items-center">
            <div class="col-lg-8 col-md-8 col-12 ">
                <div class="atf-hire-content">
                    <h3>Estou disponível para qualquer contato.</h3>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12 mb-4">
                <div class="atf-hire-btn text-end">
                    <a href="#" class="atf-themes-btn text-right">Contrate-me</a>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<script>
$(document).ready(function() {
    // Form submission handler
    $('#myForm').submit(function(e) {
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: 'contato.php',
            data: formData,
            success: function(response) {
                if (response.includes("Email enviado com Sucesso!")) {
                    $('#successMessage').show();
                    $('#errorMessage').hide();
                } else if (response.includes("Erro ao enviar o email!")) {
                    $('#successMessage').hide();
                    $('#errorMessage').show();
                } else {
                    $('#successMessage').hide();
                    $('#errorMessage').show();
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $('#successMessage').hide();
                $('#errorMessage').show();
            }
        });
    });
});



</script>

<?php include "includes/chat.php"; ?>
<?php include "./includes/footer.php"; ?>
