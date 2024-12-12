<?php

namespace App\Models;

use Libraries\Database\Database;

class Notifications{

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function createNotification($data) {
        $sql = 'INSERT INTO `notifications` (`user_id`, `message`) VALUES (:user_id, :message)';
        $this->db->query($sql);
        $this->db->bindArray([
            ':user_id' => $data['user_id'],
            ':message' => $data['message']
        ]);
        return $this->db->execute();
    }
}
