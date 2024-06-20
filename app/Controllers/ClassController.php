<?php

namespace App\Controllers;

use App\Models\ClassModel;
use App\Models\ExamModel;
use App\Models\Notification;
use PhpParser\Node\Expr\FuncCall;

class ClassController extends BaseController
{
    protected $ClassModel;
    protected $NotificationModel;
    protected $ExamModel;

    public function __construct()
    {
        $this->ClassModel = new ClassModel();
        $this->ExamModel = new ExamModel();
        $this->NotificationModel = new Notification();
    }

    public function index()
    {
        $data = [
            'title' => 'Class',
            'classes' => $this->ClassModel->getClass() // Ubah 'class' menjadi 'classes'
        ];

        return view('class/index', $data);
    }

    public function create()
    {
        return view('mentor_create_class');
    }

    public function saveCreate()
    {
        if (!$this->validate([
            'class_name' => 'required',
            'class_description' => 'required',
            'quota' => 'required',
        ])) {
            return redirect()->to('class/create')->withInput();
        }

        $mentor_id = $this->session->get('id');

        $data = [
            'class_name' => $this->request->getPost('class_name'),
            'class_description' => $this->request->getPost('class_description'),
            'mentor_id' => $mentor_id,
            'quota' => $this->request->getPost('quota')
        ];

        $this->ClassModel->insertClass($data);
        return redirect()->to("class");
    }

    public function searchClass()
    {
        $user_id = $this->session->get('id');
        $class_name = $this->request->getPost('kelas');
        $class = $this->ClassModel->getClassByName($class_name, $user_id);

        $data = [
            'class' => $class
        ];

        return view('student_search_class', $data);
    }

    public function enrollClass($class_id)
    {
        $user_id = $this->session->get('id');
        $this->NotificationModel->subscribe($class_id, $user_id);
        return view('beranda_siswa');
    }

   public function view($id = null)
    {
        $mentor_id = $this->session->get('id');
        $class = $this->ClassModel->getClassByMentor($mentor_id);

        if (!$class) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Class with ID ' . $id . ' not found');
        }

        $data = [
            'class' => $class
        ];

        return view('mentor_view_class', $data);
    }
    public function detailClass($id){
        $exams = $this->ExamModel->getExamByClass($id);
        $data = [
            'exams' => $exams,
            'id' => $id
        ];

        return view('mentor_detail_class', $data);
    }
    public function updateClass($id)
    {
        $class = $this->ClassModel->find($id);

        if (!$class) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Class with ID ' . $id . ' not found');
        }

        $data = [
            'class_data' => $class
        ];

        return view('mentor_update_class', $data);
    }
    // public function saveUpdate($data, $id)
    // {
    //     if (!$this->validate([
    //         'class_name' => 'required',
    //         'class_description' => 'required',
    //         'quota' => 'required',
    //     ])) {
    //         return redirect()->back()->withInput();
    //     }

    //     $data = [
    //         'class_name' => $this->request->getPost('class_name'),
    //         'class_description' => $this->request->getPost('class_description'),
    //         'mentor_id' => 1,  
    //         'quota' => $this->request->getPost('quota')
    //     ];

    //     $this->ClassModel->updateClass($data, $id);
    //     return redirect()->to('class');
    // }

    public function saveUpdate($id)
    {
        if (!$this->validate([
            'class_name' => 'required',
            'class_description' => 'required',
            'quota' => 'required',
        ])) {
            return redirect()->back()->withInput();
        }

        $mentor_id = $this->session->get('id');

        $data = [
            'class_name' => $this->request->getPost('class_name'),
            'class_description' => $this->request->getPost('class_description'),
            'mentor_id' => $mentor_id,
            'quota' => $this->request->getPost('quota')
        ];

        log_message('info', 'Updating class with ID: ' . $id);
        log_message('info', 'Data: ' . print_r($data, true));

        $this->ClassModel->updateClass($data, $id);
        return redirect()->to('class');
    }
    public function delete($id)
    {
        $this->ClassModel->deleteClass($id);
        return redirect()->to('class');
    }

    //student
    public function studentClass()
    {
        $user_id = $this->session->get('id');
        $class = $this->ClassModel->getClassByStudentId($user_id);
        $data = [
            'title' => 'Student Class',
            'classes' => $class
        ];

        return view('student_class', $data);
    }

    public function studentClassDetail($id){
        $exams = $this->ExamModel->getExamByClass($id);
        $data = [
            'exams' => $exams,
            'id' => $id
        ];

        return view('student_detail_class', $data);
    }
}
