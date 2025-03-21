<?php
require_once('./src/database/Model.php');

class Eleve extends Model
{
    protected $table = 'eleves';

    // Créer un nouvel élève
    public function create($data)
    {
        $this->insert($data);
    }

    // Récupérer tous les élèves
    public function getAll()
    {
        return $this->findall();
    }

    // Récupérer un élève par son ID
    public function getById($id)
    {
        return $this->find('id', $id);
    }

    // Mettre à jour un élève
    public function update($id, $data)
    {
        $this->put($id, $data);
    }

    // Supprimer un élève
    public function deleteEleve($id)
    {
        $this->delete($id);
    }
}