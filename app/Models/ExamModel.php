<?php

namespace App\Models;

use CodeIgniter\Model;

class ExamModel extends Model
{
    protected $table = 'exam';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'class_id', 'date_created', 'start_time', 'end_time'];

    public function getExam($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->where(['id' => $id])->first();
        }
    }

    public function getExamByClass($id)
    {
        return $this->where(['class_id' => $id])->doFindAll();
    }

    public function insertExam($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateExam($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }

    public function deleteExam($id)
    {
        return $this->db->table($this->table)->delete(['id' => $id]);
    }

    public function getExamByStatus($status)
    {
        return $this->where(['status' => $status])->findAll();
    }
}