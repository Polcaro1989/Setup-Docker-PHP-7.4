<?php

namespace App\Http\Controllers;

use App\Models\ModelService;

class ControllerService
{
    private $model;

    public function __construct($con)
    {
        $this->model = new ModelService($con);
    }

    public function index()
    {
        return $this->model->getServices();
    }
}
