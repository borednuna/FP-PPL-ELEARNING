<?php

namespace App\Controllers;

use App\Models\MaterialModel;
use CodeIgniter\Controller;

class MaterialController extends Controller
{
    public function index()
    {
        $model = new MaterialModel();
        $data['material'] = $model->getAllMaterials();
        return view('mentor_detail_class', $data);
    }

    public function create()
    {
        return view('create_material');
    }

    public function store()
    {
        $model = new MaterialModel();

        $data = [
            'title' => $this->request->getPost('title'),
            'material_description' => $this->request->getPost('material_description'),
            'class_id' => $this->request->getPost('class_id'),
            'date_created' => date('Y-m-d H:i:s'), // Tanggal saat ini
            'material_content' => $this->request->getPost('material_content'),
            'video_path' => $this->request->getPost('video_path'),
        ];

        $model->saveMaterial($data);
        $class_id = $this->request->getPost('class_id');
        return redirect()->to('/class/detail/' . $class_id);
    }

    public function edit($id)
    {
        $model = new MaterialModel();
        $data['material'] = $model->findMaterial($id);
        return view('edit_material', $data);
    }

    public function update($id)
    {
        $model = new MaterialModel();

        $data = [
            'title' => $this->request->getPost('title'),
            'material_description' => $this->request->getPost('material_description'),
            'class_id' => $this->request->getPost('class_id'),
            'material_content' => $this->request->getPost('material_content'),
            'video_path' => $this->request->getPost('video_path'),
        ];

        $model->updateMaterial($id, $data);
        $class_id = $this->request->getPost('class_id');
        return redirect()->to('/class/detail/' . $class_id);
    }

    public function delete($id)
    {
        $model = new MaterialModel();
        
        // Temukan materi berdasarkan ID
        $material = $model->findMaterial($id);

        // Hapus materi
        $model->deleteMaterial($id);

        // Redirect ke halaman detail kelas dengan ID kelas yang sesuai
        return redirect()->to('/class/detail/' . $material['class_id']);
    }

    public function getByClassId($class_id)
    {
        $model = new MaterialModel();
        $data['materials'] = $model->getMaterialsByClassId($class_id);
        $data['class_id'] = $class_id; // Sertakan class_id dalam data

        return view('mentor_detail_class', $data);
    }
}