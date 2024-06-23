<?php

namespace App\Http\Controllers;

use App\Models\ModelPortfolio;

class ControllerPortfolio
{
    private $model;

    public function __construct($con)
    {

        $this->model = new ModelPortfolio($con);
    }

    public function index()
    {
        return $this->model->getPortfolioItems();
        
    }
}

?>
