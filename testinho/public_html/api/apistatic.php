<?php

include "../includes/z_db.php";

include "../app/Http/Controllers/ControllerWelcomeStatic.php";

use App\Http\Controllers\ControllerWelcomeStatic;

$controller = new ControllerWelcomeStatic($con);

$staticDataResponse = $controller->getStaticData();

if ($staticDataResponse['success']) {
    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'message' => 'Dados encontrados com sucesso!', 'data' => $staticDataResponse['data']]);
} else {
    http_response_code(404);
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'error' => 'Dados não encontrados!']);
}
