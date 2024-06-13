<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function register()
    {
        $this->validation->setRules([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required|valid_email|is_unique[user.email]',
        ]);

        if ($this->validation->withRequest($this->request)->run() === FALSE) {
            return view('register', [
                'validation' => $this->validation,
            ]);
        } else {
            $data = [
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'email' => $this->request->getPost('email'),
                'role' => $this->request->getPost('role'),
            ];

            $this->userModel->register($data);
            return redirect()->to('auth/login');
        }
    }

    public function login()
    {
        $this->validation->setRules([
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($this->validation->withRequest($this->request)->run() === FALSE) {
            return view('login', [
                'validation' => $this->validation,
            ]);
        } else {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $user = $this->userModel->login($email, $password);

            if ($user) {
                $this->session->set([
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'role' => $user['role'],
                    'logged_in' => TRUE,
                ]);
                return redirect()->to('/');
            } else {
                $this->session->setFlashdata('login_failed', 'Invalid username or password');
                return redirect()->to('auth/login');
            }
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/');
    }
}
