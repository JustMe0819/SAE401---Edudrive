<?php
require_once('./src/database/Model.php');

class Formateur extends Model
{
    protected $table = 'formateurs';

    public function create($data)
    {
        $this->insert($data);
    }

    public function getAll()
    {
        return $this->findall();
    }

    public function getById($id)
    {
        return $this->find('id', $id);
    }

    public function getByAutoEcole($id_auto_ecole)
    {
        return $this->find('id_auto_ecole', $id_auto_ecole);
    }

    public function update($id, $data)
    {
        $this->put($id, $data);
    }

    public function deleteFormateur($id)
    {
        $this->delete($id);
    }

    // Fonction de vérification de l'email
    public function getByEmail($email)
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM formateurs WHERE email = :email");
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC); // Retourne null si l'email n'existe pas
    }

    // Fonction de création d'un formateur
    public function createFormateur($data)
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO formateurs (nom, prenom, email, password) VALUES (:nom, :prenom, :email, :password)");
        $stmt->execute([
            ':nom' => $data['nom'],
            ':prenom' => $data['prenom'],
            ':email' => $data['email'],
            ':password' => password_hash($data['password'], PASSWORD_DEFAULT) // Assurer que le mot de passe est bien crypté
        ]);
    }
}
?>
