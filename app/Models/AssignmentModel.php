<?php

namespace App\Models;

use CodeIgniter\Model;

class AssignmentModel extends Model
{
    protected $table = 'assignment';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'material_id', 'deadline'];

    public function getAssignment($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->where(['id' => $id])->first();
        }
    }

    public function insertAssignment($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateAssignment($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }

    public function deleteAssignment($id)
    {
        return $this->db->table($this->table)->delete(['id' => $id]);
    }

    public function getAssignmentByMaterial($material_id)
    {
        return $this->where(['material_id' => $material_id])->findAll();
    }

    public function getAssignmentByDeadline($deadline)
    {
        return $this->where(['deadline' => $deadline])->findAll();
    }
}
