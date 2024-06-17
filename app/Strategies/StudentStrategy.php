<?php

namespace App\Strategies;

class StudentStrategy implements RoleStrategy
{
    public function getView()
    {
        return 'beranda_siswa';
    }
}