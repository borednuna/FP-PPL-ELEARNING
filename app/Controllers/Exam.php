<?php

namespace App\Controllers;

use App\Models\ExamModel;
use App\Models\QuestionModel;

class Exam extends BaseController
{
    protected $examModel;
    protected $questionModel;

    public function __construct()
    {
        $this->examModel = new ExamModel();
        $this->questionModel = new QuestionModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Exam',
            'exam' => $this->examModel->getExam()
        ];

        return view('exam/index', $data);
    }

    public function detail($id)
    {
        $exam = $this->examModel->getExam($id);
        $question = $this->questionModel->getQuestionByExam($id);

        $userRole = $this->session->get('role');

        if ($userRole == 'mentor') {
            $viewName = 'mentor_exam_details';
            $data = ['exam' => $exam, 'question' => $question];
        } else if ($userRole == 'student'){
            $viewName = 'student_exam_details';
            $data = ['exam' => $exam, 'question' => $question];
        

            $data = [
                'exam' => $exam,
                'question' => $question
            ];
        }
        return view($viewName, $data);
    }

    public function create($class_id)
    {
        $data = [
            'class_id' => $class_id
        ];
        return view('mentor_create_exam', $data);
    }

    public function save($class_id)
    {
        $now = date('Y-m-d H:i:s');

        $this->examModel->insertExam([
            'name' => $this->request->getVar('name'),
            'class_id' => $class_id,
            'date_created' => $now,
            'start_time' => $this->request->getVar('start_time'),
            'end_time' => $this->request->getVar('end_time')
        ]);

        return redirect()->to('/class/detail/' . $class_id);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Exam',
            'exam' => $this->examModel->getExam($id)
        ];

        return view('exam/edit', $data);
    }

    public function update($id)
    {
        $this->examModel->updateExam($id, [
            'name' => $this->request->getVar('name'),
            'class_id' => $this->request->getVar('class_id'),
            'date_created' => $this->request->getVar('date_created'),
            'start_time' => $this->request->getVar('start_time'),
            'end_time' => $this->request->getVar('end_time')
        ]);

        return redirect()->to('/exam');
    }

    public function delete($id)
    {
        $this->examModel->deleteExam($id);
        return redirect()->to('/class');
    }
}

