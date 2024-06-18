<?php

namespace App\Controllers;

use App\Models\ExamModel;
use App\Models\QuestionModel;


class Question extends BaseController
{
    protected $questionModel;

    protected $examModel;

    public function __construct()
    {
        $this->questionModel = new QuestionModel();
        $this->examModel = new ExamModel();

    }

    public function index()
    {
        $data = [
            'title' => 'List of Questions',
            'questions' => $this->questionModel->getQuestion()
        ];

        return view('mentor_question_list', $data);
    }

    public function detail($id)
    {
        $question = $this->questionModel->getQuestion($id);

        $userRole = $this->session->get('mentor');

        if ($userRole == 'mentor') {
            $viewName = 'mentor_question_details';
            $data = ['question' => $question];
        } else return redirect()->to('/class');

        $data = [
            'question' => $question
        ];

        return view($viewName, $data);
    }

    public function create()
    {
        // load model that handles exam
        $data = ['exams' => $this->examModel->getExam()];

        return view('mentor_create_question', $data);
    }

    public function store()
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

        return redirect()->to('question/create')->with('success', 'Question has been added successfully!');
    }
}