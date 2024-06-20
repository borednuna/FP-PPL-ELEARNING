<?php

namespace App\Controllers;

use App\Models\Notification;
use CodeIgniter\Controller;

class NotificationController extends BaseController
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
        $user_id = $this->session->get('id');
        $notificationModel = new Notification();
        $notifications = $notificationModel->getNotificationsByUserId($user_id);

        return view('student_notifications', [
            'notifications' => $notifications,
            'pageTitle' => 'Student Notifications'
        ]);
    }
}
