<?php

namespace App\Http\Controllers;

use App\Models\ModelDetailFolio;

class ControllerPortfolioDetail {
    private $model;

    public function __construct($con) {
        $this->model = new ModelDetailFolio($con);
    }

    public function index() {
        $portfolioItems2 = $this->model->getPortfolioItems();

        if (!empty($portfolioItems2)) {
            return ['portfolioItems2' => $portfolioItems2];
        } else {
            return ['portfolioItems2' => []];
        }
    }
}
