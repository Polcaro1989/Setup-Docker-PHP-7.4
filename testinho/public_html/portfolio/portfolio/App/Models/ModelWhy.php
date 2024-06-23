<?php
namespace App\Models;

class ModelWhy
{
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    public function getWhyUsData()
    {
        $q = "SELECT * FROM why_us ORDER BY id DESC LIMIT 10";
        $r = mysqli_query($this->con, $q);

        if (!$r) {
            die("Error: " . mysqli_error($this->con));
        }

        $data = [];
        if (mysqli_num_rows($r) > 0) {
            while ($row = mysqli_fetch_assoc($r)) {
                $data[] = $row;
            }
        } else {
            echo "Nenhum Why encontrado.";
        }
        return $data;
    }
}
?>
