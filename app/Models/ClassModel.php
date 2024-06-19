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

    public function getClassByName($class_name, $user_id)
    {
        $query = $this->db->query("SELECT * FROM class WHERE class_name LIKE ?", ["%$class_name%"]);
        $data_array = $query->getResultArray();

        foreach ($data_array as &$data) {
            $data['class_is_joined'] = false;

            $query = $this->db->query("SELECT * FROM class_user WHERE class_id = ? AND user_id = ?", [$data['id'], $user_id]);
            $class_user = $query->getRowArray();

            if ($class_user) {
                $data['class_is_joined'] = true;
            }
        }

        unset($data);
        return $data_array;
    }

    public function getClassByStudentId($student_id)
    {
        $query = "SELECT * FROM class_user JOIN class ON class_user.class_id = class.id WHERE class_user.user_id = " . $student_id;
        return $this->db->query($query)->getResultArray();
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