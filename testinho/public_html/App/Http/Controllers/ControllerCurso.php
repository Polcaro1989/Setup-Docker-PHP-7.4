<?php
namespace App\Http\Controllers;

use App\Models\ModelCurso;

class ControllerCurso {
    private $model;

    public function __construct($con) {
        $this->model = new ModelCurso($con);
    }

   public function index() {
    $cursos = $this->model->getCursos();

    // Retornando os cursos como JSON
    return ['cursos' => $cursos];
}

}
