<?php
require_once('./src/database/Model.php');

class AutoEcole extends Model
{
    protected $table = 'auto_ecoles';

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

    public function update($id, $data)
    {
        $this->put($id, $data);
    }

    public function deleteAutoEcole($id)
    {
        $this->delete($id);
    }
}