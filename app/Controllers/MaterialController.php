<?php

namespace App\Controllers;

use App\Models\MaterialModel;
use CodeIgniter\Controller;

class MaterialController extends Controller
{
    protected $materialModel;

    public function __construct()
    {
        $this->materialModel = new MaterialModel();
    }

    public function index($class_id)
    {
        $data['materials'] = $this->materialModel->getMaterialsByClass($class_id);
        return view('material/index', $data);
    }

    public function create($class_id)
    {
        return view('material/create', ['class_id' => $class_id]);
    }

    public function store()
    {
        // Validasi data yang di-submit
        $validationRules = [
            'title' => 'required',
            'material_description' => 'required',
            'material_content' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            // Jika validasi gagal, kembalikan ke halaman create dengan pesan error
            return redirect()->to('material/create')->withInput()->with('validation', $this->validator);
        }

        // Ambil data dari form
        $class_id = $this->request->getPost('class_id');
        $title = $this->request->getPost('title');
        $material_description = $this->request->getPost('material_description');
        $material_content = $this->request->getPost('material_content');
        $video_path = $this->request->getPost('video_path');

        // Simpan data ke dalam database menggunakan model
        $this->materialModel->save([
            'title' => $title,
            'material_description' => $material_description,
            'class_id' => $class_id,
            'material_content' => $material_content,
            'video_path' => $video_path,
            'date_created' => date('Y-m-d H:i:s')
        ]);

        // Redirect atau tampilkan pesan sukses
        return redirect()->to('/material/index/' . $class_id)->with('success', 'Materi berhasil ditambahkan!');
    }
}
