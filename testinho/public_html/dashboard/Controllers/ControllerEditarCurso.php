<?php
include "header.php";
error_reporting(10);
ini_set('display_errors', true);
include "sidebar.php";
include "../z_db.php"; 

$errormsg = "";

$curso_title = "";
$curso_desc = "";
$curso_detail = "";

$uploads_dir = 'uploads/cursos';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $id = htmlspecialchars($id);

    $status = "OK";
    $msg = "";

    try {
        $query = "SELECT * FROM cursos WHERE id = :id";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $curso_title = $row['curso_title'];
            $curso_desc = $row['curso_desc'];
            $curso_detail = $row['curso_detail'];
        }

        if (isset($_POST['save'])) {
            $curso_title = $_POST['curso_title'];
            $curso_desc = $_POST['curso_desc'];
            $curso_detail = $_POST['curso_detail'];

            $tmp_name = $_FILES["ufile"]["tmp_name"];
            $name = basename($_FILES["ufile"]["name"]);
            $random_digit = rand(0000, 9999);
            $new_file_name = $random_digit . $name;
            $target_path = "$uploads_dir/$new_file_name";

            move_uploaded_file($tmp_name, $target_path);

            if ($status == "OK") {
                $query = "UPDATE cursos SET curso_title = :curso_title, curso_desc = :curso_desc, curso_detail = :curso_detail, ufile = :new_file_name WHERE id = :id";
                $stmt = $con->prepare($query);
                $stmt->bindParam(':curso_title', $curso_title);
                $stmt->bindParam(':curso_desc', $curso_desc);
                $stmt->bindParam(':curso_detail', $curso_detail);
                $stmt->bindParam(':new_file_name', $new_file_name);
                $stmt->bindParam(':id', $id);
                $stmt->execute();

                $errormsg = "
<div class='alert alert-success alert-dismissible alert-outline fade show'>
    Curso atualizado com sucesso!
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
