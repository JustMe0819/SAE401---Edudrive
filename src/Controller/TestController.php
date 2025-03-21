<?php
require_once('./src/Entity/Test.php');

class TestController 
{
    private $testModel;

    public function __construct()
    {
        $this->testModel = new Test();
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'theme' => $_POST['theme'] ?? '',
                'date_test' => $_POST['date_test'] ?? date('Y-m-d'),
                'score' => $_POST['score'] ?? 0
            ];

            try {
                $this->testModel->create($data);
                http_response_code(201);
                echo json_encode(['message' => 'Test créé avec succès']);
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode(['error' => $e->getMessage()]);
            }
        }
    }

    public function getAll()
    {
        try {
            $tests = $this->testModel->getAll();
            echo json_encode($tests);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function getOne($id)
    {
        try {
            $test = $this->testModel->getById($id);
            if ($test) {
                echo json_encode($test);
            } else {
                http_response_code(404);
                echo json_encode(['error' => 'Test non trouvé']);
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
                $this->testModel->update($id, $data);
                echo json_encode(['message' => 'Test mis à jour avec succès']);
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode(['error' => $e->getMessage()]);
            }
        }
    }

    public function delete($id)
    {
        try {
            $this->testModel->deleteTest($id);
            echo json_encode(['message' => 'Test supprimé avec succès']);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}