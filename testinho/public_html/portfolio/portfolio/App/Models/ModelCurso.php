<?php
namespace App\Models;

class ModelCurso {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function getCursos($limit = 3) {
        $qs = "SELECT * FROM cursos ORDER BY id DESC LIMIT $limit";
        $r1 = mysqli_query($this->con, $qs);

        if (!$r1) {
            die("Error: " . mysqli_error($this->con));
        }

        $cursos = [];
        if (mysqli_num_rows($r1) > 0) {
            while ($rod = mysqli_fetch_array($r1)) {
                $curso = [
                    'id' => $rod['id'],
                    'curso_title' => $rod['curso_title'],
                    'curso_detail' => $rod['curso_detail'],
                    'curso_desc' => $rod['curso_desc'],
                    'ufile' => $rod['ufile'],
                ];
                $cursos[] = $curso;
            }
        } else {
            echo "Nenhum curso encontrado.";
        }

        return $cursos;
    }
}
?>
