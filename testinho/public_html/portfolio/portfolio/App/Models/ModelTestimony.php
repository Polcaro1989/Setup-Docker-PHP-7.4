<?php

namespace App\Models;

class ModelTestimony {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function getTestimonies() {
        $q = "SELECT testimony_name, position, message, ufile FROM testimony ORDER BY id DESC LIMIT 6";
        $r123 = mysqli_query($this->con, $q);
        if ($r123 === false) {
            die("Erro na query: " . mysqli_error($this->con));
        }

        $testimonies = [];
        if (mysqli_num_rows($r123) > 0) {
            while ($ro = mysqli_fetch_assoc($r123)) { // Fetch_assoc retorna um array associativo
                $testimonies[] = $ro; // Adiciona o array associativo aos testemunhos
            }
        } else {
            die(json_encode(["error" => "Dados não encontrados"]));
        }
        return $testimonies;
    }
}

?>
