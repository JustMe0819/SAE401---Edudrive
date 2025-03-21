<?php
require_once('./src/Entity/ExamenBlanc.php');

class ExamenBlancController 
{
    private $examenModel;

    public function __construct()
    {
        $this->examenModel = new ExamenBlanc();
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id_eleve' => $_POST['id_eleve'] ?? null,
                'date_examens' => $_POST['date_examens'] ?? date('Y-m-d'),
                'score' => $_POST['score'] ?? 0,
                'date_passage_examens' => $_POST['date_passage_examens'] ?? null
            ];

            try {
                $this->examenModel->create($data);
                http_response_code(201);
                echo json_encode(['message' => 'Examen blanc créé avec succès']);
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode(['error' => $e->getMessage()]);
            }
        }
    }

    public function getAll()
    {
        try {
            $examens = $this->examenModel->getAll();
            echo json_encode($examens);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function getOne($id)
    {
        try {
            $examen = $this->examenModel->getById($id);
            if ($examen) {
                echo json_encode($examen);
            } else {
                http_response_code(404);
                echo json_encode(['error' => 'Examen blanc non trouvé']);
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function getByEleve($id_eleve)
    {
        try {
            $examens = $this->examenModel->getByID($id_eleve);
            echo json_encode($examens);
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
                $this->examenModel->update($id, $data);
                echo json_encode(['message' => 'Examen blanc mis à jour avec succès']);
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode(['error' => $e->getMessage()]);
            }
        }
    }

    public function delete($id)
    {
        try {
            $this->examenModel->deleteExamen($id);
            echo json_encode(['message' => 'Examen blanc supprimé avec succès']);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}