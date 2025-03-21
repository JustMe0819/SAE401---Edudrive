<?php
require_once('./src/Entity/Avis.php');

class AvisController 
{
    private $avisModel;

    public function __construct()
    {
        $this->avisModel = new Avis();
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id_eleve' => $_POST['id_eleve'] ?? null,
                'contenu' => $_POST['contenu'] ?? '',
                'date_depot' => date('Y-m-d'),
                'date_publication' => null,
                'modere' => false
            ];

            try {
                $this->avisModel->create($data);
                http_response_code(201);
                echo json_encode(['message' => 'Avis créé avec succès']);
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode(['error' => $e->getMessage()]);
            }
        }
    }

    public function getAll()
    {
        try {
            $avis = $this->avisModel->getAll();
            echo json_encode($avis);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function getOne($id)
    {
        try {
            $avis = $this->avisModel->getById($id);
            if ($avis) {
                echo json_encode($avis);
            } else {
                http_response_code(404);
                echo json_encode(['error' => 'Avis non trouvé']);
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function getByEleve($id_eleve)
    {
        try {
            $avis = $this->avisModel->getByEleve($id_eleve);
            echo json_encode($avis);
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
                $this->avisModel->update($id, $data);
                echo json_encode(['message' => 'Avis mis à jour avec succès']);
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode(['error' => $e->getMessage()]);
            }
        }
    }

    public function delete($id)
    {
        try {
            $this->avisModel->deleteAvis($id);
            echo json_encode(['message' => 'Avis supprimé avec succès']);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}