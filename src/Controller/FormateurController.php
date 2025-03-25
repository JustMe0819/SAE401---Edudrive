<?php
require_once('./src/Entity/Formateur.php');

class FormateurController 
{
    private $formateurModel;

    public function __construct()
    {
        $this->formateurModel = new Formateur();
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id_auto_ecole' => $_POST['id_auto_ecole'] ?? null,
                'nom' => $_POST['nom'] ?? '',
                'prenom' => $_POST['prenom'] ?? '',
                'email' => $_POST['email'] ?? '',
                'password' => $_POST['password'] ?? ''
            ];

            $existingFormateur = $this->formateurModel->getByEmail($data['email']);
            if ($existingFormateur) {
                http_response_code(400);
                echo json_encode(['error' => 'Cet email est déjà utilisé.']);
                return;
            }
    
            if (empty($data['nom']) || empty($data['prenom']) || empty($data['email']) || empty($data['password'])) {
                http_response_code(400);
                echo json_encode(['error' => 'Veuillez remplir tous les champs du formulaire.']);
                return;
            }
    
            try {
                $this->formateurModel->create($data);
                $_SESSION['formateur'] = $data; // Mettre dans la session
                http_response_code(201);
                echo json_encode(['message' => 'Formateur créé avec succès']);
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode(['error' => $e->getMessage()]);
            }
        }
    }

    public function getAll()
    {
        try {
            $formateurs = $this->formateurModel->getAll();
            echo json_encode($formateurs);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function getOne($id)
    {
        try {
            $formateur = $this->formateurModel->getById($id);
            if ($formateur) {
                echo json_encode($formateur);
            } else {
                http_response_code(404);
                echo json_encode(['error' => 'Formateur non trouvé']);
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function getByAutoEcole($id_auto_ecole)
    {
        try {
            $formateurs = $this->formateurModel->getByAutoEcole($id_auto_ecole);
            echo json_encode($formateurs);
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
                $this->formateurModel->update($id, $data);
                echo json_encode(['message' => 'Formateur mis à jour avec succès']);
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode(['error' => $e->getMessage()]);
            }
        }
    }

    public function delete($id)
    {
        try {
            $this->formateurModel->deleteFormateur($id);
            echo json_encode(['message' => 'Formateur supprimé avec succès']);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}