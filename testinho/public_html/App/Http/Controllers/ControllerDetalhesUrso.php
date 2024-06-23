<?php
namespace App\Http\Controllers;

use App\Models\ModelDetalhesUrso;

class ControllerDetalhesUrso {
    private $model;

    public function __construct($con) {
        $this->model = new ModelDetalhesUrso($con);
    }

    public function index() {

        $ursos = $this->model->getCursosDetail();
// var_dump( $cursos );
        if (!empty($ursos)) {
            return ['ursos' => $ursos];
        } else {
            return ['ursos' => []];
        }
    }
}

