<?php

namespace App\Models;

class ModelPortfolio
{
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    public function getPortfolioItems()
    {
        $query = "SELECT * FROM portfolio ORDER BY id DESC LIMIT 3";
        $result = mysqli_query($this->con, $query);

        if (!$result) {
            die("Error: " . mysqli_error($this->con));
        }

        $portfolioItems = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $portfolioItem = [
                    'id' => $row['id'],
                    'porti_title' => $row['porti_title'],
                    'porti_desc' => $row['porti_desc'],
                    'portfolio_link' => $row['portfolio_link'],
                    'ufile' => $row['ufile'],
                ];
                $portfolioItems[] = $portfolioItem;
            }
        } else {
            echo "Nenhum portfólio encontrado.";
        }

        return $portfolioItems;
    }
}
