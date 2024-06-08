<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $isLoggedIn = $this->session->get('logged_in');

        if ($isLoggedIn) {
            return view(('beranda'));
        }
        
        return view('student_assignment_details');
    }
}
