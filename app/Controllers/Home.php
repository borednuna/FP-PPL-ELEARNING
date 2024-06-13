<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $isLoggedIn = $this->session->get('logged_in');
        
        if ($isLoggedIn) {
            $role = $this->session->get('role');
            if  ($role == 'student') {
                return view('beranda_siswa');
            } else if ($role == 'mentor') {
                return view(('beranda_mentor'));
            }
        }
        
        return view('login');
    }
}
