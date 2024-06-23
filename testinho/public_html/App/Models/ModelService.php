<?php

namespace App\Models;

class ModelService
{
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    public function getServices()
    {
        $query = "SELECT id, service_title, service_desc, service_link, ufile FROM service ORDER BY id DESC LIMIT 15";
        $result = mysqli_query($this->con, $query);

        if (!$result) {
            die("Error: " . mysqli_error($this->con));
        }

        $services = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $service = [
                    'id' => $row['id'],
                    'service_title' => $row['service_title'],
                    'service_desc' => $row['service_desc'],
                    'service_link' => $row['service_link'],
                    'ufile' => $row['ufile'],
                ];
                $services[] = $service;
            }
        } 
        else {
            echo "Nenhum serviço encontrado.";

        }

        return $services;
    }
}
