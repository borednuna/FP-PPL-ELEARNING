<?php

namespace App\Models;

use CodeIgniter\Model;

class ClassModel extends Model
{
    protected $table = 'class';
    protected $primaryKey = 'id';
    protected $allowedFields = ['class_name', 'class_description','mentor_id', 'quota'];

    public function getClass($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->where(['id' => $id])->first();
        }
    }

    public function getClassByMentor($mentor_id)
    {
        return $this->where(['mentor_id' => $mentor_id])->findAll();
    }

    public function insertClass($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
    public function detailClass($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }
    public function updateClass($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }
    public function deleteClass($id)
    {
        return $this->db->table($this->table)->delete(['id' => $id]);
    }

}