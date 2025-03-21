<?php
require_once('./src/Entity/Statistique.php');

class StatistiqueController 
{
    private $statistiqueModel;

    public function __construct()
    {
        $this->statistiqueModel = new Statistique();
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id_auto_ecole' => $_POST['id_auto_ecole'] ?? null,
                'nb_eleves_reussis' => $_POST['nb_eleves_reussis'] ?? 0,
                'nb_eleves_echoues' => $_POST['nb_eleves_echoues'] ?? 0,
                'moyenne_entre_tests_examens' => $_POST['moyenne_entre_tests_examens'] ?? 0
            ];

            try {
                $this->statistiqueModel->create($data);
                http_response_code(201);
                echo json_encode(['message' => 'Statistique créée avec succès']);
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode(['error' => $e->getMessage()]);
            }
        }
    }

    public function getAll()
    {
        try {
            $statistiques = $this->statistiqueModel->getAll();
            echo json_encode($statistiques);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function getOne($id)
    {
        try {
            $statistique = $this->statistiqueModel->getById($id);
            if ($statistique) {
                echo json_encode($statistique);
            } else {
                http_response_code(404);
                echo json_encode(['error' => 'Statistique non trouvée']);
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function getByAutoEcole($id_auto_ecole)
    {
        try {
            $statistiques = $this->statistiqueModel->getByAutoEcole($id_auto_ecole);
            echo json_encode($statistiques);
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
                $this->statistiqueModel->update($id, $data);
                echo json_encode(['message' => 'Statistique mise à jour avec succès']);
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode(['error' => $e->getMessage()]);
            }
        }
    }

    public function delete($id)
    {
        try {
            $this->statistiqueModel->deleteStatistique($id);
            echo json_encode(['message' => 'Statistique supprimée avec succès']);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}