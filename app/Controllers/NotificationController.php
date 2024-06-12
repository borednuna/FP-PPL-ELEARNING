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

        return view('notifikasi', ['notifications' => $notifications]);
    }
}
