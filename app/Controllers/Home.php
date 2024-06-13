<?php

namespace App\Controllers;

use App\Strategies\RoleStrategy;
use App\Strategies\StudentStrategy;
use App\Strategies\MentorStrategy;

class Home extends BaseController
{
    private $strategy;

    public function index()
    {
        // Check if the user is logged in
        $isLoggedIn = $this->session->get('logged_in');
        
        if ($isLoggedIn) {
            // Get the user's role
            $role = $this->session->get('role');
            
            // Set the appropriate strategy based on the role
            $this->setStrategy($role);

            // Render the view based on the strategy
            return view($this->strategy->getView());
        }

        // If not logged in, show the login view
        return view('login');
    }

    private function setStrategy($role)
    {
        // Determine the strategy based on the user's role
        switch ($role) {
            case 'student':
                $this->strategy = new StudentStrategy();
                break;
            case 'mentor':
                $this->strategy = new MentorStrategy();
                break;
            default:
                throw new \Exception("Invalid role");
        }
    }
}
