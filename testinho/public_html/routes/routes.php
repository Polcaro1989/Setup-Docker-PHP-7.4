<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Http\Controllers\ControllerCurso;
use App\Http\Controllers\ControllerWelcomeStatic;
use App\Http\Controllers\ControllerService;
use App\Http\Controllers\ControllerPortfolio;
use App\Http\Controllers\ControllerDetalhesUrso;
use App\Http\Controllers\ControllerServiceDetail;
use App\Http\Controllers\ControllerSobre;
use App\Http\Controllers\ControllerPortfolioDetail;
use App\Http\Controllers\ControllerTestimony;


// Rota para cursos
$controllerCurso = new ControllerCurso($con);
$cursosData = $controllerCurso->index();
$cursos = isset($cursosData['cursos']) ? $cursosData['cursos'] : [];

// Rota estática/inicial
$controllerWelcomeStatic = new ControllerWelcomeStatic($con);
$staticData = $controllerWelcomeStatic->index();
$stitle = isset($staticData['stitle']) ? $staticData['stitle'] : null;
$stext = isset($staticData['stext']) ? $staticData['stext'] : null;
$ufile = isset($staticData['ufile']) ? $staticData['ufile'] : null;
$pdf_curriculo = isset($staticData['pdf_curriculo']) ? $staticData['pdf_curriculo'] : null;

// Rota para serviços
$controllerService = new ControllerService($con);
$servicesData = $controllerService->index();
$services = isset($servicesData) ? $servicesData : [];
$service1 = isset($services[0]) ? $services[0] : null;
$service2 = isset($services[1]) ? $services[1] : null;
$service3 = isset($services[2]) ? $services[2] : null;

// Rota para portfólio
$controllerPortfolio = new ControllerPortfolio($con);
$portfolioData = $controllerPortfolio->index();
$portfolioItems = isset($portfolioData) ? $portfolioData : [];
$primeiroItem = isset($portfolioItems[0]) ? $portfolioItems[0] : null;

// Rota para detalhes do portfólio
$controllerPortfolioDetail = new ControllerPortfolioDetail($con);
$data = $controllerPortfolioDetail->index();
$portfolioItems2 = isset($data['portfolioItems2']) ? $data['portfolioItems2'] : [];

// Rota para sobre
$controllerSobre = new ControllerSobre($con);
$sobreData = $controllerSobre->index();
$sobre = isset($sobreData) ? $sobreData : [];
$primeiroItemSobre = isset($sobre[0]) ? $sobre[0] : null;

// Rota para detalhes do serviço
$controllerServiceDetail = new ControllerServiceDetail($con);
$serviceData = $controllerServiceDetail->index();
$servicesDetail = isset($serviceData) ? $serviceData : [];
$primeiroServicoDetail = isset($servicesDetail[0]) ? $servicesDetail[0] : null;

// Rota para detalhes do curso
$controllerDetalhesUrso = new ControllerDetalhesUrso($con);
$ursosData = $controllerDetalhesUrso->index();
$ursos = isset($ursosData['ursos']) ? $ursosData['ursos'] : [];

//Rota para detalhes do testimony

$controllerTestimony = new ControllerTestimony($con);
$testimoniesData = $controllerTestimony->index();
$testimoniesArray = isset($testimoniesData['testimonies']) ? $testimoniesData['testimonies'] : [];


