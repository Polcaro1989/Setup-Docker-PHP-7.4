<?php
namespace App\Http\Controllers;


use App\Models\ModelStatic;

class ControllerWelcomeStatic
{
    private $model;

    public function __construct($con)
    {
        $this->model = new ModelStatic($con);
    }

    public function index()
    {
        $staticData = $this->model->getStaticData();

        if ($staticData) {
            return $staticData;
        } else {
            echo "Nenhum dado estático encontrado.";
            return null;
        }
    }

    public function getStaticData()
    {
        $staticData = $this->model->getStaticData();

        if ($staticData) {
            return ['success' => true, 'data' => $staticData];
        } else {
            return ['success' => false];
        }
    }
}