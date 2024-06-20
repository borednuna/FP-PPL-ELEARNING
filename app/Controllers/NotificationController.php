<?php

namespace App\Controllers;

use App\Models\Notification;
use CodeIgniter\Controller;

class NotificationController extends Controller
{
    public function showNotifications()
    {
        $notificationModel = new Notification();
        $notifications = $notificationModel->findAll();

        return view('mentor_notifications', [
            'notifications' => $notifications,
            'pageTitle' => 'Mentor Notifications'
        ]);
    }

    public function readNotifications()
    {
        $notificationModel = new Notification();
        $notifications = $notificationModel->findAll();

        return view('student_notifications', [
            'notifications' => $notifications,
            'pageTitle' => 'Student Notifications'
        ]);
    }
}
