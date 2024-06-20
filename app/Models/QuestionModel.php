<?php

namespace App\Models;

use CodeIgniter\Model;

class QuestionModel extends Model 
{
    protected $table = 'question';

    protected $primaryKey = 'id';

    protected $allowedFields = ['question', 'option_a', 'option_b', 'option_c', 'option_d', 'option_e','correct_answer', 'exam_id'];

    public function getQuestion($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->where(['id' => $id])->first();
        }
    }
    public function insertQuestion($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
    public function updateQuestion($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }
    public function deleteQuestion($id)
    {
        return $this->db->table($this->table)->delete(['id' => $id]);
    }
    public function getQuestionByExam($exam_id)
    {
        return $this->where(['exam_id' => $exam_id])->findAll();
    }

    public function getQuestionByCorrectAnswer($correct_answer)
    {
        return $this->where(['correct_answer' => $correct_answer])->findAll();
    }

}