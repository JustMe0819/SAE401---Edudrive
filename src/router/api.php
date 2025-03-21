<?php
header('Content-Type: application/json');

require_once('./src/Controller/EleveController.php');
require_once('./src/Controller/TestController.php');
require_once('./src/Controller/ExamenBlancController.php');
require_once('./src/Controller/AvisController.php');
require_once('./src/Controller/AutoEcoleController.php');
require_once('./src/Controller/FormateurController.php');
require_once('./src/Controller/StatistiqueController.php');

$eleveController = new EleveController();
$testController = new TestController();
$examenController = new ExamenBlancController();
$avisController = new AvisController();
$autoEcoleController = new AutoEcoleController();
$formateurController = new FormateurController();
$statistiqueController = new StatistiqueController();

// Router simple
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

// Routes pour les élèves
if (preg_match('/^\/api\/eleves$/', $uri)) {
    switch ($method) {
        case 'GET':
            $eleveController->getAll();
            break;
        case 'POST':
            $eleveController->create();
            break;
        default:
            http_response_code(405);
            echo json_encode(['error' => 'Méthode non autorisée']);
    }
} elseif (preg_match('/^\/api\/eleves\/(\d+)$/', $uri, $matches)) {
    $id = $matches[1];
    switch ($method) {
        case 'GET':
            $eleveController->getOne($id);
            break;
        case 'PUT':
            $eleveController->update($id);
            break;
        case 'DELETE':
            $eleveController->delete($id);
            break;
        default:
            http_response_code(405);
            echo json_encode(['error' => 'Méthode non autorisée']);
    }
}

// Routes pour les tests
elseif (preg_match('/^\/api\/tests$/', $uri)) {
    switch ($method) {
        case 'GET':
            $testController->getAll();
            break;
        case 'POST':
            $testController->create();
            break;
        default:
            http_response_code(405);
            echo json_encode(['error' => 'Méthode non autorisée']);
    }
} elseif (preg_match('/^\/api\/tests\/(\d+)$/', $uri, $matches)) {
    $id = $matches[1];
    switch ($method) {
        case 'GET':
            $testController->getOne($id);
            break;
        case 'PUT':
            $testController->update($id);
            break;
        case 'DELETE':
            $testController->delete($id);
            break;
        default:
            http_response_code(405);
            echo json_encode(['error' => 'Méthode non autorisée']);
    }
}

// Routes pour les examens blancs
elseif (preg_match('/^\/api\/examens$/', $uri)) {
    switch ($method) {
        case 'GET':
            $examenController->getAll();
            break;
        case 'POST':
            $examenController->create();
            break;
        default:
            http_response_code(405);
            echo json_encode(['error' => 'Méthode non autorisée']);
    }
} elseif (preg_match('/^\/api\/examens\/(\d+)$/', $uri, $matches)) {
    $id = $matches[1];
    switch ($method) {
        case 'GET':
            $examenController->getOne($id);
            break;
        case 'PUT':
            $examenController->update($id);
            break;
        case 'DELETE':
            $examenController->delete($id);
            break;
        default:
            http_response_code(405);
            echo json_encode(['error' => 'Méthode non autorisée']);
    }
} elseif (preg_match('/^\/api\/examens\/eleve\/(\d+)$/', $uri, $matches)) {
    $id_eleve = $matches[1];
    if ($method === 'GET') {
        $examenController->getByEleve($id_eleve);
    } else {
        http_response_code(405);
        echo json_encode(['error' => 'Méthode non autorisée']);
    }
}

// Routes pour les avis
elseif (preg_match('/^\/api\/avis$/', $uri)) {
    switch ($method) {
        case 'GET':
            $avisController->getAll();
            break;
        case 'POST':
            $avisController->create();
            break;
        default:
            http_response_code(405);
            echo json_encode(['error' => 'Méthode non autorisée']);
    }
} elseif (preg_match('/^\/api\/avis\/(\d+)$/', $uri, $matches)) {
    $id = $matches[1];
    switch ($method) {
        case 'GET':
            $avisController->getOne($id);
            break;
        case 'PUT':
            $avisController->update($id);
            break;
        case 'DELETE':
            $avisController->delete($id);
            break;
        default:
            http_response_code(405);
            echo json_encode(['error' => 'Méthode non autorisée']);
    }
} elseif (preg_match('/^\/api\/avis\/eleve\/(\d+)$/', $uri, $matches)) {
    $id_eleve = $matches[1];
    if ($method === 'GET') {
        $avisController->getByEleve($id_eleve);
    } else {
        http_response_code(405);
        echo json_encode(['error' => 'Méthode non autorisée']);
    }
}

// Routes pour les auto-écoles
elseif (preg_match('/^\/api\/auto-ecoles$/', $uri)) {
    switch ($method) {
        case 'GET':
            $autoEcoleController->getAll();
            break;
        case 'POST':
            $autoEcoleController->create();
            break;
        default:
            http_response_code(405);
            echo json_encode(['error' => 'Méthode non autorisée']);
    }
} elseif (preg_match('/^\/api\/auto-ecoles\/(\d+)$/', $uri, $matches)) {
    $id = $matches[1];
    switch ($method) {
        case 'GET':
            $autoEcoleController->getOne($id);
            break;
        case 'PUT':
            $autoEcoleController->update($id);
            break;
        case 'DELETE':
            $autoEcoleController->delete($id);
            break;
        default:
            http_response_code(405);
            echo json_encode(['error' => 'Méthode non autorisée']);
    }
}

// Routes pour les formateurs
elseif (preg_match('/^\/api\/formateurs$/', $uri)) {
    switch ($method) {
        case 'GET':
            
            $formateurController->getAll();
            break;
        case 'POST':
            $formateurController->create();
            break;
        default:
            http_response_code(405);
            echo json_encode(['error' => 'Méthode non autorisée']);
    }
} elseif (preg_match('/^\/api\/formateurs\/(\d+)$/', $uri, $matches)) {
    $id = $matches[1];
    switch ($method) {
        case 'GET':
            $formateurController->getOne($id);
            break;
        case 'PUT':
            $formateurController->update($id);
            break;
        case 'DELETE':
            $formateurController->delete($id);
            break;
        default:
            http_response_code(405);
            echo json_encode(['error' => 'Méthode non autorisée']);
    }
} elseif (preg_match('/^\/api\/formateurs\/auto-ecole\/(\d+)$/', $uri, $matches)) {
    $id_auto_ecole = $matches[1];
    if ($method === 'GET') {
        $formateurController->getByAutoEcole($id_auto_ecole);
    } else {
        http_response_code(405);
        echo json_encode(['error' => 'Méthode non autorisée']);
    }
}

// Routes pour les statistiques
elseif (preg_match('/^\/api\/statistiques$/', $uri)) {
    switch ($method) {
        case 'GET':
            $statistiqueController->getAll();
            break;
        case 'POST':
            $statistiqueController->create();
            break;
        default:
            http_response_code(405);
            echo json_encode(['error' => 'Méthode non autorisée']);
    }
} elseif (preg_match('/^\/api\/statistiques\/(\d+)$/', $uri, $matches)) {
    $id = $matches[1];
    switch ($method) {
        case 'GET':
            $statistiqueController->getOne($id);
            break;
        case 'PUT':
            $statistiqueController->update($id);
            break;
        case 'DELETE':
            $statistiqueController->delete($id);
            break;
        default:
            http_response_code(405);
            echo json_encode(['error' => 'Méthode non autorisée']);
    }
} elseif (preg_match('/^\/api\/statistiques\/auto-ecole\/(\d+)$/', $uri, $matches)) {
    $id_auto_ecole = $matches[1];
    if ($method === 'GET') {
        $statistiqueController->getByAutoEcole($id_auto_ecole);
    } else {
        http_response_code(405);
        echo json_encode(['error' => 'Méthode non autorisée']);
    }
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Route non trouvée']);
}