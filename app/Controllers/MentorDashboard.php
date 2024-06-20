<?php

namespace App\Controllers;

class MentorDashboard extends BaseController{
    public function index(){
        return view(('mentor_beranda'));
    }
}