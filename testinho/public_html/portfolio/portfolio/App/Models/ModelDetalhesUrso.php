<?php
namespace App\Models;

class ModelDetalhesUrso {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function getCursosDetail($limit = 20) {
        $qs = "SELECT * FROM cursos ORDER BY id DESC LIMIT $limit";
        $r1 = mysqli_query($this->con, $qs);

        if (!$r1) {
            die("Error: " . mysqli_error($this->con));
        }

        $ursos = [];
        if (mysqli_num_rows($r1) > 0) {
            while ($rod = mysqli_fetch_array($r1)) {
                $urso = [
                    'id' => $rod['id'],
                    'curso_title' => $rod['curso_title'],
                    'curso_detail' => $rod['curso_detail'],
                    'curso_desc' => $rod['curso_desc'],
                    'ufile' => $rod['ufile'],
                ];
                $ursos[] = $urso;
            }
        } else {
            echo "Nenhum curso encontrado.";
        }

        return $ursos;
    }
}
?>
