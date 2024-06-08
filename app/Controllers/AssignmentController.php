<?php

namespace App\Controllers;

use App\Models\AssignmentModel;
use App\Models\AssignmentSubmissionModel;

class AssignmentController extends BaseController
{
    protected $assignmentModel;
    protected $assignmentSubmissionModel;

    public function __construct()
    {
        $this->assignmentModel = new AssignmentModel();
        $this->assignmentSubmissionModel = new AssignmentSubmissionModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Assignment',
            'assignment' => $this->assignmentModel->getAssignment()
        ];

        return view('assignment/index', $data);
    }

    public function detail($id)
    {
        $assignment = $this->assignmentModel->getAssignment($id);

        $userRole = $this->session->get('role');
        if ($userRole == 'mentor') {
            $viewName = 'mentor_assignment_details';
            $data = ['assignment' => $assignment];
        } else if ($userRole == 'student'){
            $viewName = 'student_assignment_details';
            $submission = $this->assignmentSubmissionModel->getSubmissionByAssignmentAndUser($id, session()->get('id'));
            if (!$submission) {
                $submission = [
                    'assignment_id' => null,
                    'user_id' => null,
                    'uploaded_file' => null,
                    'date_submitted' => null,
                    'grade' => null
                ];
            }

            $data = [
                'assignment' => $assignment,
                'submission' => $submission
            ];
        }

        return view($viewName, $data);
    }

    public function create()
    {
        return view('mentor_create_assignment');
    }

    public function save()
    {
        if (!$this->validate([
            'name' => 'required',
            'description' => 'required',
            'deadline' => 'required',
        ])) {
            return redirect()->to('assignments/create')->withInput();
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'material_id' => 1,
            'deadline' => $this->request->getPost('deadline')
        ];

        $this->assignmentModel->insertAssignment($data);
        return redirect()->to("/");
    }

    public function update($id)
    {
        if (!$this->validate([
            'name' => 'required',
            'description' => 'required',
            'deadline' => 'required',
        ])) {
            return redirect()->to("/assignments/details/{$id}");
        }

        $assignment = $this->assignmentModel->getAssignment($id);
        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'material_id' => $assignment['material_id'],
            'deadline' => $this->request->getPost('deadline'),
        ];

        $this->assignmentModel->updateAssignment($data, $id);
        return redirect()->to("/assignments/details/{$id}");
    }

    public function delete($id)
    {
        $this->assignmentModel->deleteAssignment($id);
        return redirect()->to('/');
    }

    public function submit($id)
    {
        if (!$this->validate([
            'uploaded_file' => 'uploaded[uploaded_file]|max_size[uploaded_file,1024]'
        ])) {
            return redirect()->to('student_assignment_details' . $id)->withInput();
        }

        $file = $this->request->getFile('uploaded_file');
        $fileName = $file->getRandomName();
        $file->move('uploads', $fileName);

        $data = [
            'assignment_id' => $id,
            'user_id' => session()->get('id'),
            'uploaded_file' => $fileName,
            'date_submitted' => date('Y-m-d H:i:s')
        ];

        $this->assignmentSubmissionModel->insertSubmission($data);
        return redirect()->to('assignments/details/' . $id)->withInput();
    }

    public function deleteSubmission($id)
    {
        $submission = $this->assignmentSubmissionModel->getSubmission($id);
        unlink('uploads/' . $submission['uploaded_file']);
        $this->assignmentSubmissionModel->deleteSubmission($id);
        return redirect()->to('assignments/details/' . $id);
    }
}
