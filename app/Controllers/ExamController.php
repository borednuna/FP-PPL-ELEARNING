<?php

namespace App\Controllers;

// use App\Models\ExamModel;
use App\Models\ExamSubmissionModel;

class ExamController extends BaseController
{
    // protected $ExamModel;
    protected $ExamSubmissionModel;

    public function __construct()
    {
        //$this->ExamModel = new ExamModel();
        $this->ExamSubmissionModel = new ExamSubmissionModel();
    }

    // public function index()
    // {
    //     $data = [
    //         'title' => 'Exam',
    //         'Exam' => $this->ExamModel->getExam()
    //     ];

    //     return view('Exam/index', $data);
    // }

    // public function detail($id)
    // {
    //     $Exam = $this->ExamModel->getExam($id);

    //     $userRole = $this->session->get('role');
    //     if ($userRole == 'mentor') {
    //         $viewName = 'mentor_Exam_details';
    //         $data = ['Exam' => $Exam];
    //     } else if ($userRole == 'student'){
    //         $viewName = 'student_Exam_details';
    //         $submission = $this->ExamSubmissionModel->getSubmissionByExamAndUser($id, session()->get('id'));
    //         if (!$submission) {
    //             $submission = [
    //                 'Exam_id' => null,
    //                 'user_id' => null,
    //                 'uploaded_file' => null,
    //                 'date_submitted' => null,
    //                 'grade' => null
    //             ];
    //         }

    //         $data = [
    //             'Exam' => $Exam,
    //             'submission' => $submission
    //         ];
    //     }

    //     return view($viewName, $data);
    // }

    // public function create()
    // {
    //     return view('mentor_create_Exam');
    // }

    // public function save()
    // {
    //     if (!$this->validate([
    //         'name' => 'required',
    //         'description' => 'required',
    //         'deadline' => 'required',
    //     ])) {
    //         return redirect()->to('Exams/create')->withInput();
    //     }

    //     $data = [
    //         'name' => $this->request->getPost('name'),
    //         'description' => $this->request->getPost('description'),
    //         'material_id' => 1,
    //         'deadline' => $this->request->getPost('deadline')
    //     ];

    //     $this->ExamModel->insertExam($data);
    //     return redirect()->to("/");
    // }

    // public function update($id)
    // {
    //     if (!$this->validate([
    //         'name' => 'required',
    //         'description' => 'required',
    //         'deadline' => 'required',
    //     ])) {
    //         return redirect()->to("/Exams/details/{$id}");
    //     }

    //     $Exam = $this->ExamModel->getExam($id);
    //     $data = [
    //         'name' => $this->request->getPost('name'),
    //         'description' => $this->request->getPost('description'),
    //         'material_id' => $Exam['material_id'],
    //         'deadline' => $this->request->getPost('deadline'),
    //     ];

    //     $this->ExamModel->updateExam($data, $id);
    //     return redirect()->to("/Exams/details/{$id}");
    // }

    // public function delete($id)
    // {
    //     $this->ExamModel->deleteExam($id);
    //     return redirect()->to('/');
    // }

    // public function submit($id)
    // {
    //     if (!$this->validate([
    //         'uploaded_file' => 'uploaded[uploaded_file]|max_size[uploaded_file,1024]'
    //     ])) {
    //         return redirect()->to('student_Exam_details' . $id)->withInput();
    //     }

    //     $file = $this->request->getFile('uploaded_file');
    //     $fileName = $file->getRandomName();
    //     $file->move('uploads', $fileName);

    //     $data = [
    //         'Exam_id' => $id,
    //         'user_id' => session()->get('id'),
    //         'uploaded_file' => $fileName,
    //         'date_submitted' => date('Y-m-d H:i:s')
    //     ];

    //     $this->ExamSubmissionModel->insertSubmission($data);
    //     return redirect()->to('Exams/details/' . $id)->withInput();
    // }

    // public function deleteSubmission($id)
    // {
    //     $submission = $this->ExamSubmissionModel->getSubmission($id);
    //     unlink('uploads/' . $submission['uploaded_file']);
    //     $this->ExamSubmissionModel->deleteSubmission($id);
    //     return redirect()->to('Exams/details/' . $id);
    // }

    public function allExamSubmissions($id)
    {
        $submissions = $this->ExamSubmissionModel->getExamSubmissionByExam($id);

        $data = [
            'submissions' => $submissions
        ];

        return view('exam_view_submissions', $data);
    }

    // public function updateGrade()
    // {
    //     $submissionId = $this->request->getPost('submission_id');
    //     $grade = $this->request->getPost('grade');

    //     error_log(print_r($this->request->getPost(), true));

    //     $this->ExamSubmissionModel->updateGrade($submissionId, $grade);
    //     return redirect()->to('Exams/submissions/' . $submissionId);
    // }
}
