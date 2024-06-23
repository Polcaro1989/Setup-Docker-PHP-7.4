<?php

namespace App\Models;

class ModelDetailFolio {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function getPortfolioItems() {
        $q = "SELECT * FROM  portfolio ORDER BY id DESC LIMIT 10";
        $r = mysqli_query($this->con, $q);

        if (!$r) {
            die("Error: " . mysqli_error($this->con));
        }

        $portfolioItems2 = [];
        if (mysqli_num_rows($r) > 0) {
            while ($row = mysqli_fetch_array($r)) {
                $portfolioItem2 = [
                    'id' => $row['id'],
                    'porti_title' => $row['porti_title'],
                    'porti_desc' => $row['porti_desc'],
                    'portfolio_link' => $row['portfolio_link'],
                    'ufile' => $row['ufile'],
                ];
                $portfolioItems2[] = $portfolioItem2;
            }
        } else {
            echo "Nenhum portfólio encontrado.";
        }

        return $portfolioItems2;
    }
}
