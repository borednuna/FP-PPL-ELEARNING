<?php

namespace App\Controllers;

use App\Models\ClassModel;
use PhpParser\Node\Expr\FuncCall;

class ClassController extends BaseController
{
    protected $ClassModel;

    public function __construct()
    {
        $this->ClassModel = new ClassModel();
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

        $data = [
            'class_name' => $this->request->getPost('class_name'),
            'class_description' => $this->request->getPost('class_description'),
            'mentor_id' => 1,
            'quota' => $this->request->getPost('quota')
        ];

        $this->ClassModel->insertClass($data);
        return redirect()->to("class");
    }

   public function view($id = null)
    {
        $class = $this->ClassModel->find($id); // Mengambil data kelas berdasarkan ID

        if (!$class) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Class with ID ' . $id . ' not found');
        }

        $data = [
            'class' => $class
        ];

        return view('mentor_view_class', $data);
    }
    public function detailClass($id){
        return view('mentor_detail_class', [$id]);
    }
    public function updateClass($id)
    {
        $class = $this->ClassModel->find($id);

        if (!$class) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Class with ID ' . $id . ' not found');
        }

        $data = [
            'class' => $class
        ];
        return view('mentor_update_class',[$data]);
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

        $data = [
            'class_name' => $this->request->getPost('class_name'),
            'class_description' => $this->request->getPost('class_description'),
            'mentor_id' => 1,
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
        $data = [
            'title' => 'Student Class',
            'classes' => $this->ClassModel->getClass()
        ];

        return view('student_class', $data);
    }
    public function studentClassDetail($id){
        return view('student_detail_class', [$id]);
    }
}