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

    // public function detailClass() {
    //     return view('mentor_detail_class');
    // }

    // public function getDetail($id)
    // {
    //     $sql = "SELECT * FROM class 
    //     JOIN user ON class.mentor_id = mentor.id 
    //     WHERE class.id = ?";

    //     $query = $this->db->query($sql, [$id]);
    //     $results = $query->getResultArray();

    //     return $results;
    // }

    public function detailClass($id)
    {
        // $details = $this->ClassModel->getDetail($id);

        // $classes = [
        //     'classes' => $details
        // ];

        return view('mentor_detail_class', [$id]);
    }

    // public function update($id){
 
    //     if (!$this->validate([
    //         'class_name' => 'required',
    //         'class_description' => 'required',
    //         'quota' => 'required',
    //     ])) {
    //         return redirect()->to("/class/update/{$id}");
    //     }

    //     $class = $this->ClassModel->getClass($id);
    //     $data = [
    //         'name' => $this->request->getPost('class_name'),
    //         'description' => $this->request->getPost('class_description'),
    //         'mentor_id' => $class['mentor_id'], 
    //         'quota' => $this->request->getPost('quota'),
    //     ];

    //     $this->ClassModel->updateClass($data, $id);

    //     return redirect()->to("/class/update/{$id}");
    // }
    public function updateClass($id)
    {
        return view('mentor_update_class',[$id]);
    }

    // public function saveUpdate($data, $id)
    // {
    //     if (!$this->validate([
    //         'class_name' => 'required',
    //         'class_description' => 'required',
    //         'quota' => 'required',
    //     ])) {
    //         return redirect()->to('class/update')->withInput();
    //     }

    //     $data = [
    //         'class_name' => $this->request->getPost('class_name'),
    //         'class_description' => $this->request->getPost('class_description'),
    //         'mentor_id' => 1,
    //         'quota' => $this->request->getPost('quota')
    //     ];

    //     $this->ClassModel->updateClass($data, $id);
    //     return redirect()->to("class");
    // }
    public function saveUpdate($data, $id)
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

        $this->ClassModel->updateClass($data, $id);
        return redirect()->to('class');
    }


    public function delete($id)
    {
        $this->ClassModel->deleteClass($id);
        return redirect()->to('class');
    }
}