<?php
require_once('./src/database/Model.php');

class Avis extends Model
{
    protected $table = 'avis';

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

    public function getByEleve($id_eleve)
    {
        return $this->find('id_eleve', $id_eleve);
    }

    public function update($id, $data)
    {
        $this->put($id, $data);
    }

    public function deleteAvis($id)
    {
        $this->delete($id);
    }
}