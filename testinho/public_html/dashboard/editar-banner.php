<?php
include "header.php";
error_reporting(10);
ini_set('display_errors', true);
include "sidebar.php";
include "z_db.php"; 

$errormsg = "";

$banner_title = "";
$banner_text = "";

$uploads_dir = 'uploads/banner';

if (isset($_GET['id'])) {
    $todo = $_GET['id'];
    $todo = htmlspecialchars($todo);

    $status = "OK";
    $msg = "";

    try {
        $query = "SELECT * FROM banner WHERE id = :todo";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':todo', $todo);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $id = $row['id'];
            $banner_title = $row['banner_title'];
            $banner_text = $row['banner_text'];
        }

        if (isset($_POST['save'])) {
            $banner_title = $_POST['banner_title'];
            $banner_text = $_POST['banner_text'];

            $tmp_name = $_FILES["ufile"]["tmp_name"];
            $name = basename($_FILES["ufile"]["name"]);
            $random_digit = rand(0000, 9999);
            $new_file_name = $random_digit . $name;
            $target_path = "$uploads_dir/$new_file_name";

            move_uploaded_file($tmp_name, $target_path);

            if ($status == "OK") {
                $query = "UPDATE banner SET banner_title = :banner_title, banner_text = :banner_text, ufile = :new_file_name WHERE id = :todo";
                $stmt = $con->prepare($query);
                $stmt->bindParam(':banner_title', $banner_title);
                $stmt->bindParam(':banner_text', $banner_text);
                $stmt->bindParam(':new_file_name', $new_file_name);
                $stmt->bindParam(':todo', $todo);
                $stmt->execute();

                $errormsg = "
<div class='alert alert-success alert-dismissible alert-outline fade show'>
    Banner atualizado com sucesso!
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


<!-- ============================================================== -->
<!-- Editar slide-->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Editar slide:</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Listar</a></li>
                                <li class="breadcrumb-item active">Slide</li>
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
                                        <i class="fas fa-home"></i>Editar
                                    </a>
                                </li>
                            </ul>
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
                                                    <label for="firstnameInput" class="form-label">Slide título:</label>
                                                    <input type="text" class="form-control" id="firstnameInput" name="banner_title" value="<?php print $banner_title ?>" placeholder="Enter Portfolio Title">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Slide descrição:</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5" name="banner_text"><?php print $banner_text ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Adicionar foto:</label>
                                                    <input type="file" class="form-control" id="firstnameInput" name="ufile">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class=" col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="submit" name="save" class="btn btn-primary">Atualizar</button>

                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                                <!--end tab-pane-->

                                <!--end tab-pane-->

                                <!--end tab-pane-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <?php include "footer.php"; ?>