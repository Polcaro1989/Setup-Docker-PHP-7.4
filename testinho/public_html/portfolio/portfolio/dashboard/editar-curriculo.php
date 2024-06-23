<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<!-- ============================================================== -->
<!-- Adicionar currículo -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Adicionar currículo:</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Adicionar</a></li>
                                <li class="breadcrumb-item active">currículo</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <!--end col-->
                <div class="col-xxl-9">
                    <div class="card mt-xxl-n5">
                        <div class="card-header">
                            <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab" aria-selected="false">
                                        <i class="fas fa-home"></i> Adicionar:
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <?php
include "header.php";
error_reporting(10);
ini_set('display_errors', true);
include "sidebar.php";
include "z_db.php"; 

$errormsg = "";

$nome = "";

$uploads_dir = 'uploads/curriculo';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $id = htmlspecialchars($id);

    $status = "OK";
    $msg = "";

    try {
        $query = "SELECT * FROM curriculos WHERE id = :id";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $id = $row['id'];
            $nome = $row['nome'];
            // Altere os campos de acordo com a estrutura da tabela "curriculos"
        }

        if (isset($_POST['save'])) {
            $nome = $_POST['nome'];
            // Obtenha os outros campos do formulário e atualize-os de acordo com a estrutura da tabela "curriculos"

            $tmp_name = $_FILES["ufile"]["tmp_name"];
            $name = basename($_FILES["ufile"]["name"]);
            $random_digit = rand(0000, 9999);
            $new_file_name = $random_digit . $name;
            $target_path = "$uploads_dir/$new_file_name";

            move_uploaded_file($tmp_name, $target_path);

            if ($status == "OK") {
                $query = "UPDATE curriculos SET nome = :nome, pdf_curriculo = :new_file_name WHERE id = :id";
                $stmt = $con->prepare($query);
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':new_file_name', $new_file_name);
                $stmt->bindParam(':id', $id);
                $stmt->execute();

                $errormsg = "
<div class='alert alert-success alert-dismissible alert-outline fade show'>
    Currículo atualizado com sucesso!
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
            }
        } elseif ($status !== "OK") {
            $errormsg = "
<div class='alert alert-danger alert-dismissible alert-outline fade show'>
    " . $msg . " 
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
        } else {
            $errormsg = "
<div class='alert alert-danger alert-dismissible alert-outline fade show'>
    Alguma falha técnica ocorreu. Tente novamente mais tarde ou peça ajuda ao administrador.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
        }
    } catch (PDOException $e) {
        $errormsg = "
<div class='alert alert-danger alert-dismissible alert-outline fade show'>
    Erro de conexão: " . $e->getMessage() . "
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
    }
}
?>
                        <!-- Aqui você pode continuar com o seu HTML, usando as variáveis $nome e $pdf_curriculo para exibir os dados do currículo. -->

                        <div class="col-12 col-md-7">
                            <div class="welcome-intro">
                                <!-- Inclua aqui a exibição dos dados do currículo -->
                                <h1 class="text-white mt-5"><?php print $nome ?></h1>
                                <div class="button-group text-center">
                                    <a class='service-btn mt-3 text-white' href='contato.php'>
                                        <i class="fas fa-envelope"></i> Contato
                                    </a>
                                    <a class='service-btn mt-3 text-white' href='download.php?filename=<?php echo $pdf_curriculo; ?>'>
                                        <i class="fas fa-download"></i> Baixar Currículo
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="tab-content">
                                <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                    <?php
                                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                        print $errormsg;
                                    }
                                    ?>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="nome" class="form-label">Nome:</label>
                                                    <input type="text" class="form-control" id="nome" name="nome">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="pdf_curriculo" class="form-label">Adicionar currículo (PDF):</label>
                                                    <input type="file" class="form-control" id="pdf_curriculo" name="pdf_curriculo" accept=".pdf">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="submit" name="save" class="btn btn-primary">Adicionar Currículo</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--end tab-pane-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>