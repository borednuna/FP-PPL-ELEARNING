<?php

namespace App\Models;

use CodeIgniter\Model;

class Notification extends Model
{
    protected $table = 'notification';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'content', 'user_id'];

    public function getAllSubscribers($class_id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('class_user'); // Assuming you have a table to store class subscriptions

        $builder->select('user_id');
        $builder->where('class_id', $class_id);

        $query = $builder->get();

        return $query->getResultArray();
    }

    public function subscribe($class_id, $user_id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('class_user'); // Assuming you have a table to store class subscriptions

        $builder->insert(['class_id' => $class_id, 'user_id' => $user_id]);
    }

    public function unsubscribe($class_id, $user_id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('class_user'); // Assuming you have a table to store class subscriptions

        $builder->where('class_id', $class_id);
        $builder->where('user_id', $user_id);
        $builder->delete();
    }

    public function notify($class_id, $data)
    {
        $subscribers = $this->getAllSubscribers($class_id);

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
