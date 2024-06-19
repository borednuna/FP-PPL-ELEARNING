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
        return redirect()->to('/material');
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
        return redirect()->to('/material');
    }

    public function delete($id)
    {
        $model = new MaterialModel();
        $model->deleteMaterial($id);
        return redirect()->to('/material');
    }
}