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

        $data = ['assignment' => $assignment];

        return view('mentor_assignment_details', $data);
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

    public function submission($id)
    {
        $data = [
            'title' => 'Assignment Submission',
            'assignment' => $this->assignmentModel->getAssignment($id),
            'submission' => $this->assignmentSubmissionModel->getSubmissionByAssignment($id)
        ];

        return view('student_assignment_details', $data);
    }

    public function submit($id)
    {
        if (!$this->validate([
            'uploaded_file' => 'uploaded[uploaded_file]|max_size[uploaded_file,1024]|ext_in[uploaded_file,pdf]'
        ])) {
            return redirect()->to('student_assignment_details' . $id)->withInput();
        }

        $file = $this->request->getFile('uploaded_file');
        $fileName = $file->getRandomName();
        $file->move('uploads', $fileName);

        $data = [
            'assignment_id' => $id,
            'user_id' => session()->get('id'),
            'material_id' => $this->assignmentModel->getAssignment($id)['material_id'],
            'uploaded_file' => $fileName,
            'date_submitted' => date('Y-m-d H:i:s')
        ];

        $this->assignmentSubmissionModel->insertSubmission($data);
        return redirect()->to('student_assignment_details' . $data)->withInput();
    }

    public function deleteSubmission($id)
    {
        $submission = $this->assignmentSubmissionModel->getSubmission($id);
        unlink('uploads/' . $submission['uploaded_file']);
        $this->assignmentSubmissionModel->deleteSubmission($id);
        return redirect()->to('/assignment/submission/' . $submission['assignment_id']); // cek kelas
    }

    public function updateSubmission($id)
    {
        if (!$this->validate([
            'uploaded_file' => 'uploaded[uploaded_file]|max_size[uploaded_file,1024]|ext_in[uploaded_file,pdf]'
        ])) {
            return redirect()->to('student_assignment_details' . $id)->withInput();
        }

        $submission = $this->assignmentSubmissionModel->getSubmission($id);
        unlink('uploads/' . $submission['uploaded_file']);

        $file = $this->request->getFile('uploaded_file');
        $fileName = $file->getRandomName();
        $file->move('uploads', $fileName);

        $data = [
            'uploaded_file' => $fileName,
            'date_submitted' => date('Y-m-d H:i:s')
        ];

        $this->assignmentSubmissionModel->updateSubmission($data, $id);
        return redirect()->to('student_assignment_details' . $submission['assignment_id']);
    }
}
