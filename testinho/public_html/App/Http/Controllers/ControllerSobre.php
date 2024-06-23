<?php

namespace App\Http\Controllers;

use App\Models\ModelSobre;

class ControllerSobre
{
    private $model;

    public function __construct($con)
    {
        $this->model = new ModelSobre($con);
    }

    public function index()
    {
        return $this->model->getSobreData();
    }
}
