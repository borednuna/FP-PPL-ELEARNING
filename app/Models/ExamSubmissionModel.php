<?php

namespace App\Models;

use CodeIgniter\Model;

class ExamSubmissionModel extends Model
{
    protected $table = 'exam_submission';
    protected $primaryKey = 'id';
    protected $allowedFields = ['exam_submission_description', 'date_submitted', 'exam_id', 'user_id', 'correct_answer', 'wrong_answer', 'score'];

    public function getExamSubmission($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->where(['id' => $id])->first();
        }
    }

    public function insertExamSubmission($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateExamSubmission($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }

    // public function updateGrade($submission_id, $grade)
    // {
    //     $this->db->table($this->table)
    //         ->where('id', $submission_id)
    //         ->update(['grade' => $grade]);
    // }

    public function deleteExamSubmission($id)
    {
        return $this->db->table($this->table)->delete(['id' => $id]);
    }

    public function getExamSubmissionByExamAndUser($exam_id, $user_id)
    {
        return $this->where(['exam_id' => $exam_id, 'user_id' => $user_id])->first();
    }

    public function getExamSubmissionByExam($exam_id)
    {
        $sql = "SELECT * FROM exam_submission 
        JOIN user ON exam_submission.user_id = user.id 
        WHERE exam_submission.exam_id = ?";

        $query = $this->db->query($sql, [$exam_id]);
        $results = $query->getResultArray();

        return $results;
    }

    public function getExamSubmissionByUser($user_id)
    {
        return $this->where(['user_id' => $user_id])->findAll();
    }
}
