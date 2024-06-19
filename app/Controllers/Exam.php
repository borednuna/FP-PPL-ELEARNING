<?php

namespace App\Controllers;

use App\Models\ExamModel;
use App\Models\ExamSubmissionModel;
use App\Models\QuestionModel;
use App\Models\Notification;

class Exam extends BaseController
{
    protected $examModel;
    protected $examSubmissionModel;
    protected $questionModel;
    protected $notificationModel;

    public function __construct()
    {
        $this->examModel = new ExamModel();
        $this->questionModel = new QuestionModel();
        $this->notificationModel = new Notification();
        $this->examSubmissionModel = new ExamSubmissionModel();
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
        
        $data = [
            'title' => 'New Exam',
            'content' => 'New Exam is up in class ' . $class_id
        ];

        $this->notificationModel->notify($class_id, $data);

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

    public function view($exam_id)
    {
        $data['exam'] = $this->examModel->find($exam_id);
        $data['questions'] = $this->questionModel->where('exam_id', $exam_id)->findAll();

        return view('exam_view_submissions', $data);
    }

    public function submit($exam_id)
    {
        $user_id = session()->get('id');

        $userAnswers = $this->request->getPost('answers');

        $correctAnswersCount = 0;
        foreach ($userAnswers as $question_id => $selected_option) {
            $question = $this->questionModel->find($question_id);
            if ($question['correct_answer'] === $selected_option) {
                $correctAnswersCount++;
            }
        }

        $totalQuestions = count($userAnswers);
        $wrongAnswersCount = $totalQuestions - $correctAnswersCount;
        $score = ($correctAnswersCount / $totalQuestions) * 100;

        $examSubmissionData = [
            'exam_submission_description' => 'Exam submission description',
            'date_submitted' => date('Y-m-d H:i:s'),
            'exam_id' => $exam_id,
            'user_id' => $user_id,
            'correct_answer' => $correctAnswersCount,
            'wrong_answer' => $wrongAnswersCount,
            'score' => $score,
        ];

        $this->examSubmissionModel->saveSubmission($examSubmissionData);

        $data['score'] = $score;

        return view('beranda_siswa', $data);
    }
}
