<?php

namespace App\Models;

use CodeIgniter\Model;

class Notification extends Model
{
    protected $table = 'notification';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'content', 'user_id'];

    public function getAllSubscribers($class_id) {
        // get all users corresponding to class id
    }

    public function subscribe($class_id, $user_id) {
        // add user to class, supposedly is implemented in class model
    }

    public function unsubscribe($class_id, $user_id) {
        // remove user from class, supposedly is implemented in class model
    }

    public function notify($class_id, $data) {
        // get all users corresponding to class id
        // send notification to all users, insert new row at notification table
    }
}
