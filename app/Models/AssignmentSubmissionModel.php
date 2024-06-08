<?php

namespace App\Models;

use CodeIgniter\Model;

class AssignmentSubmissionModel extends Model
{
    protected $table = 'submission';
    protected $primaryKey = 'id';
    protected $allowedFields = ['assignment_id', 'user_id', 'material_id', 'uploaded_file', 'grade'];

    public function getSubmission($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->where(['id' => $id])->first();
        }
    }

    public function insertSubmission($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateSubmission($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }

    public function deleteSubmission($id)
    {
        return $this->db->table($this->table)->delete(['id' => $id]);
    }

    public function getSubmissionByAssignment($assignment_id)
    {
        return $this->where(['assignment_id' => $assignment_id])->findAll();
    }

    public function getSubmissionByUser($user_id)
    {
        return $this->where(['user_id' => $user_id])->findAll();
    }

    public function getSubmissionByMaterial($material_id)
    {
        return $this->where(['material_id' => $material_id])->findAll();
    }
}
