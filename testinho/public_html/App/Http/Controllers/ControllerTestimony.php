<?php

namespace App\Http\Controllers;

use App\Models\ModelTestimony;

class ControllerTestimony
{
    private $model;

    public function __construct($con)
    {
        $this->model = new ModelTestimony($con);
    }

    public function index()
    {
        $testimonies = $this->model->getTestimonies();

        // Retornando os testemunhos como um array associativo com a chave 'testimonies'
        return ['testimonies' => $testimonies];
    }
}

?>
