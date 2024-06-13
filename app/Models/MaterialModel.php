<?php

namespace App\Models;

use CodeIgniter\Model;

class MaterialModel extends Model
{
    protected $table = 'materials';
    protected $primaryKey = 'id';
    protected $allowedFields = ['classroom_id', 'title', 'content'];

    // Metode untuk mengambil semua materi berdasarkan ID kelas
    public function getMaterialsByClassroom($classroom_id)
    {
        return $this->where('classroom_id', $classroom_id)->findAll();
    }

    // Metode untuk menyimpan materi
    public function saveMaterial($data)
    {
        return $this->insert($data);
    }

    // Metode untuk mengupdate materi
    public function updateMaterial($id, $data)
    {
        return $this->update($id, $data);
    }

    // Metode untuk menghapus materi
    public function deleteMaterial($id)
    {
        return $this->delete($id);
    }
}