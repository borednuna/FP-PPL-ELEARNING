<?php

namespace App\Models;

use CodeIgniter\Model;

class Notification extends Model
{
    protected $table = 'notification';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'content', 'user_id'];

    public function getNotificationsByUserId($user_id)
    {
        // get all users corresponding to class id
        $db = \Config\Database::connect();
        $builder = $db->table('notification'); // Assuming you have a table to store class subscriptions

        $builder->select();
        $builder->where('user_id', $user_id);

        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getAllSubscribers($class_id)
    {
        // get all users corresponding to class id
        $db = \Config\Database::connect();
        $builder = $db->table('class_user'); // Assuming you have a table to store class subscriptions

        $builder->select('user_id');
        $builder->where('class_id', $class_id);

        $query = $builder->get();

        return $query->getResultArray();
    }

    public function subscribe($class_id, $user_id)
    {
        // add user to class, supposedly is implemented in class model
        $db = \Config\Database::connect();
        $builder = $db->table('class_user'); // Assuming you have a table to store class subscriptions

        $builder->insert(['class_id' => $class_id, 'user_id' => $user_id]);
    }

    public function unsubscribe($class_id, $user_id)
    {
        // remove user from class, supposedly is implemented in class model
        $db = \Config\Database::connect();
        $builder = $db->table('class_user'); // Assuming you have a table to store class subscriptions

        $builder->where('class_id', $class_id);
        $builder->where('user_id', $user_id);
        $builder->delete();
    }

    public function notify($class_id, $data)
    {
        // get all users corresponding to class id
        $subscribers = $this->getAllSubscribers($class_id);

        // send notification to all users, insert new row at notification table
        $notifications = [];
        foreach ($subscribers as $subscriber) {
            $notification = [
                'title' => $data['title'],
                'content' => $data['content'],
                'user_id' => $subscriber['user_id']
            ];
            $notifications[] = $notification;
        }

        $this->insertBatch($notifications);
    }
}
