<?php
require_once('./src/Entity/Eleve.php');

class EleveController 
{
    private $eleveModel;

    public function __construct()
    {
        $this->eleveModel = new Eleve();
    }

    // Créer un nouvel élève
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nom' => $_POST['nom'] ?? '',
                'prenom' => $_POST['prenom'] ?? '',
                'date_naissance' => $_POST['date_naissance'] ?? '',
                'adresse' => $_POST['adresse'] ?? '',
                'ville' => $_POST['ville'] ?? '',
                'code_postal' => $_POST['code_postal'] ?? '',
                'date_inscription' => date('Y-m-d'),
                'neph' => $_POST['neph'] ?? '',
                'etg' => $_POST['etg'] ?? '',
                'echec_etg' => isset($_POST['echec_etg']) ? 1 : 0
            ];

            try {
                $this->eleveModel->create($data);
                http_response_code(201);
                echo json_encode(['message' => 'Élève créé avec succès']);
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode(['error' => $e->getMessage()]);
            }
        }
    }

    // Récupérer tous les élèves
    public function getAll()
    {
        try {
            $eleves = $this->eleveModel->getAll();
            echo json_encode($eleves);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    // Récupérer un élève par son ID
    public function getOne($id)
    {
        try {
            $eleve = $this->eleveModel->getById($id);
            if ($eleve) {
                echo json_encode($eleve);
            } else {
                http_response_code(404);
                echo json_encode(['error' => 'Élève non trouvé']);
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    // Mettre à jour un élève
    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
            $data = json_decode(file_get_contents('php://input'), true);
            
            try {
                $this->eleveModel->update($id, $data);
                echo json_encode(['message' => 'Élève mis à jour avec succès']);
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode(['error' => $e->getMessage()]);
            }
        }
    }

    // Supprimer un élève
    public function delete($id)
    {
        try {
            $this->eleveModel->deleteEleve($id);
            echo json_encode(['message' => 'Élève supprimé avec succès']);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}