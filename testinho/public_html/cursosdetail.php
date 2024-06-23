<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "./includes/header.php";
require "./routes/routes.php";

if(isset($_GET['id'])) {
    $id = $_GET['id'];
  
    // Aqui você precisa substituir $con pelo seu objeto de conexão ao banco de dados
    $sql = "SELECT * FROM cursos WHERE id = $id";
    $result = mysqli_query($con, $sql);
    
    if (!$result) {
        die('Erro na consulta: ' . mysqli_error($con));
    }
    
    if(mysqli_num_rows($result) > 0) {
        $curso = mysqli_fetch_assoc($result);
    } else {
        echo "Curso não encontrado para o ID fornecido";
    }
} else {
    echo "ID não fornecido";
}
?>

<section id="education" class="atf-education-area atf-section-padding atf-service-area">
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
        <div class="row justify-content-center">
            <?php if (isset($curso)) : ?>
                <div class="col-lg-12 col-md-6 col-12 text-center logo">
                    <h2 class="atf-time mt-5 bg-line text-white"><?= isset($curso['curso_title']) ? $curso['curso_title'] : 'Título não definido'; ?></h2>
                    <div class="atf-single-resume d-block wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0">
                        <img class="rounded-start img-fluid h-100 object-fit-cover col-12" src="dashboard/uploads/cursos/<?= isset($curso['ufile']) ? $curso['ufile'] : 'caminho/para/imagem/default.jpg'; ?>" alt="<?= isset($curso['ufile']) ? $curso['ufile'] : 'Imagem não definida'; ?>">
                        <div>
                            <h4 class="atf-section-title mb-3 mt-3"><?= isset($curso['curso_detail']) ? $curso['curso_detail'] : 'Detalhes não definidos'; ?></h4>
                            <p class="atf-section-title mb-3 text-black"><?= isset($curso['curso_desc']) ? $curso['curso_desc'] : 'Descrição não definida'; ?></p>
                            <!-- Aqui você pode adicionar outros detalhes do curso, como preço, duração, etc. -->
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <p>Curso não encontrado.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php include "includes/chat.php"; ?>
<?php include "includes/footer.php"; ?>
