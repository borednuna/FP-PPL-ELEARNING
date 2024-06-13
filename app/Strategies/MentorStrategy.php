<?php

namespace App\Strategies;

class MentorStrategy implements RoleStrategy
{
    public function getView()
    {
        return 'beranda_mentor';
    }
}