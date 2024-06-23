<?php
include "header.php";
error_reporting(10);
ini_set('display_errors', true);
include "sidebar.php";
include "z_db.php"; 

$errormsg = "";

$blog_title = "";
$blog_desc = "";
$blog_detail = "";

$uploads_dir = 'uploads/blog';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $id = htmlspecialchars($id);

    $status = "OK";
    $msg = "";

    try {
        $query = "SELECT * FROM blog WHERE id = :id";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $blog_title = $row['blog_title'];
            $blog_desc = $row['blog_desc'];
            $blog_detail = $row['blog_detail'];
        }

        if (isset($_POST['save'])) {
            $blog_title = $_POST['blog_title'];
            $blog_desc = $_POST['blog_desc'];
            $blog_detail = $_POST['blog_detail'];

            $tmp_name = $_FILES["ufile"]["tmp_name"];
            $name = basename($_FILES["ufile"]["name"]);
            $random_digit = rand(0000, 9999);
            $new_file_name = $random_digit . $name;
            $target_path = "$uploads_dir/$new_file_name";

            move_uploaded_file($tmp_name, $target_path);

            if ($status == "OK") {
                $query = "UPDATE blog SET blog_title = :blog_title, blog_desc = :blog_desc, blog_detail = :blog_detail, ufile = :new_file_name WHERE id = :id";
                $stmt = $con->prepare($query);
                $stmt->bindParam(':blog_title', $blog_title);
                $stmt->bindParam(':blog_desc', $blog_desc);
                $stmt->bindParam(':blog_detail', $blog_detail);
                $stmt->bindParam(':new_file_name', $new_file_name);
                $stmt->bindParam(':id', $id);
                $stmt->execute();

                $errormsg = "
<div class='alert alert-success alert-dismissible alert-outline fade show'>
    Blog atualizado com sucesso!
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
<!-- Editar blog-->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Editar Blog:</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Editar</a></li>
                                <li class="breadcrumb-item active">Blog:</li>
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
                                        <i class="fas fa-home"></i> Editar:
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
                                                    <label for="firstnameInput" class="form-label"> Blog título:</label>
                                                    <input type="text" class="form-control" id="firstnameInput" name="blog_title" value="<?php print $blog_title ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Blog Descrição:</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5" name="blog_desc" rows="2"><?php print $blog_desc ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Blog Detail:</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5" name="blog_detail" rows="3"><?php print $blog_detail ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Adicionar foto:</label>
                                                    <input type="file" class="form-control" name="ufile">
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="submit" name="save" class="btn btn-primary">Atualizar</button>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
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