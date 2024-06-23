<?php

namespace App\Http\Controllers;

use App\Models\ModelDetailSer;

class ControllerServiceDetail
{
    private $model;

    public function __construct($con)
    {
        $this->model = new ModelDetailSer($con);
    }

    public function index()
    {
        return $this->model->getServices();
    }
}
