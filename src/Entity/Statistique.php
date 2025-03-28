<?php
require_once('./src/database/Model.php');

class Statistique extends Model
{
    protected $table = 'statistiques';

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

    public function deleteStatistique($id)
    {
        $this->delete($id);
    }
}