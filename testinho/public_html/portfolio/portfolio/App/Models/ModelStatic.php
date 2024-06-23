<?php

namespace App\Models;

class ModelStatic
{
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    public function getStaticData()
    {
        $query = "SELECT s.*, c.pdf_curriculo 
        FROM static s
        LEFT JOIN curriculos c ON s.id = c.pdf_curriculo";

        $result = mysqli_query($this->con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);
            return $data;
        } else {
            return null;
        }
    }
}
