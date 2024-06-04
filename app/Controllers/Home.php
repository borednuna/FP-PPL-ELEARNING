<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        $isLoggedIn = $this->session->get('logged_in');

        $userData = [];
        if ($isLoggedIn) {
            $userId = $this->session->get('user_id');
            $userModel = new UserModel();
            $userData = $userModel->find($userId);
        }

        $data = [
            'isLoggedIn' => $isLoggedIn,
            'userData' => $userData,
        ];

        return view('home', $data);
    }
}
