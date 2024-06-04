<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'email', 'role'];

    public function register($data)
    {
        return $this->insert($data);
    }

    public function login($email, $password)
    {
        $user = $this->where('email', $email)->first();

        if ($user && $password == $user['password']) {
            return $user;
        }

        return false;
    }

    public function get_user($id)
    {
        return $this->find($id);
    }
}
