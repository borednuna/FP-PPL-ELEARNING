<?php

namespace App\Controllers;

use App\Models\QuestionModel;

class Question extends BaseController
{
    protected $questionModel;

    public function __construct()
    {
        $this->questionModel = new QuestionModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Question',
            'question' => $this->questionModel->getQuestion()
        ];

        return view('question/index', $data);
    }

    public function detail($id)
    {
        $question = $this->questionModel->getQuestion($id);

        $userRole = $this->session->get('mentor');

        if ($userRole == 'mentor') {
            $viewName = 'mentor_question_details';
            $data = ['question' => $question];
        } else if ($userRole == 'student'){
            $viewName = 'student_question_details';
            $data = ['question' => $question];
        }

        $data = [
            'question' => $question
        ];

        return view($viewName, $data);
    }

    public function create()
    {
        return view('question/create');
    }

    public function save()
    {
        $userRole = $this->session->get('mentor');

        
        $this->questionModel->insertQuestion([
            'question' => $this->request->getVar('question'),
            'option_a' => $this->request->getVar('option_a'),
            'option_b' => $this->request->getVar('option_b'),
            'option_c' => $this->request->getVar('option_c'),
            'option_d' => $this->request->getVar('option_d'),
            'option_e' => $this->request->getVar('option_e'),
            'correct_answer' => $this->request->getVar('correct_answer'),
            'exam_id' => $this->request->getVar('exam_id')
        ]);
    }
}