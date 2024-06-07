<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        $isLoggedIn = $this->session->get('logged_in');

        if ($isLoggedIn) {
            return view(('beranda'));
        }
        
        return view('mentor_assignment_details');
    }
}
