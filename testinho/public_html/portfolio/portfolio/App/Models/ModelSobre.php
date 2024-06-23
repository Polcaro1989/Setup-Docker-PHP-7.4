<?php

namespace App\Models;

class ModelSobre
{
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    public function getSobreData()
    {
        $query = "SELECT sobre.*, dados.email, dados.nome, dados.formacao, dados.endereco
                  FROM sobre 
                  LEFT JOIN dados ON sobre.id = dados.id 
                  ORDER BY sobre.id ";
        $result = $this->con->query($query);

        if (!$result) {
            die("Error executing the query: " . $this->con->error);
        }

        $sobreData = [];
        while ($row = $result->fetch_assoc()) {
            $sobreData[] = $row;
        }

        return $sobreData;
    }
}
