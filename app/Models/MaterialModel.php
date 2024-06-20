<?php

namespace App\Models;

use CodeIgniter\Model;

class MaterialModel extends Model
{
    protected $table = 'material'; // Sesuaikan dengan nama tabel di database Anda
    protected $primaryKey = 'id'; // Sesuaikan dengan primary key tabel Anda
    protected $allowedFields = ['title', 'material_description', 'class_id', 'date_created', 'material_content', 'video_path'];

    // Metode untuk mengambil semua data material
    public function getAllMaterials()
    {
        return $this->findAll();
    }

    // Metode untuk menyimpan data material baru
    public function saveMaterial($data)
    {
        return $this->insert($data);
    }

    // Metode untuk mencari data material berdasarkan ID
    public function findMaterial($id)
    {
        return $this->find($id);
    }

    // Metode untuk mengupdate data material
    public function updateMaterial($id, $data)
    {
        return $this->update($id, $data);
    }

    // Metode untuk menghapus data material
    public function deleteMaterial($id)
    {
        return $this->delete($id);
    }

    // Metode untuk mendapatkan data materi berdasarkan ID kelas
    public function getMaterialsByClassId($class_id)
    {
        $query = "SELECT 
            material.id AS material_id,
            material.title,
            material.material_description,
            material.class_id,
            material.date_created AS date_created,
            material.material_content,
            material.video_path,
            assignment.id AS assignment_id,
            assignment.name AS assignment_name,
            assignment.description AS assignment_description,
            assignment.material_id,
            assignment.deadline
        FROM 
            material 
        LEFT JOIN 
            assignment 
        ON 
            material.id = assignment.material_id 
        WHERE 
            material.class_id = $class_id;
        ";
        
        return $this->db->query($query)->getResultArray();
    }
}
