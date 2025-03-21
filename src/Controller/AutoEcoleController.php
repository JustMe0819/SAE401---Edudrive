<?php
require_once('./src/Entity/AutoEcole.php');

class AutoEcoleController 
{
    private $autoEcoleModel;

    public function __construct()
    {
        $this->autoEcoleModel = new AutoEcole();
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nom' => $_POST['nom'] ?? '',
                'adresse' => $_POST['adresse'] ?? '',
                'ville' => $_POST['ville'] ?? '',
                'code_postal' => $_POST['code_postal'] ?? '',
                'note_moyenne' => $_POST['note_moyenne'] ?? 0
            ];

            try {
                $this->autoEcoleModel->create($data);
                http_response_code(201);
                echo json_encode(['message' => 'Auto-école créée avec succès']);
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode(['error' => $e->getMessage()]);
            }
        }
    }

    public function getAll()
    {
        try {
            $autoEcoles = $this->autoEcoleModel->getAll();
            echo json_encode($autoEcoles);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function getOne($id)
    {
        try {
            $autoEcole = $this->autoEcoleModel->getById($id);
            if ($autoEcole) {
                echo json_encode($autoEcole);
            } else {
                http_response_code(404);
                echo json_encode(['error' => 'Auto-école non trouvée']);
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
            $data = json_decode(file_get_contents('php://input'), true);
            
            try {
                $this->autoEcoleModel->update($id, $data);
                echo json_encode(['message' => 'Auto-école mise à jour avec succès']);
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode(['error' => $e->getMessage()]);
            }
        }
    }

    public function delete($id)
    {
        try {
            $this->autoEcoleModel->deleteAutoEcole($id);
            echo json_encode(['message' => 'Auto-école supprimée avec succès']);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}