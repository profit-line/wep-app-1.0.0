<?php

namespace App\Models;

use Libraries\Database\Database;

class Messages {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function sendMessage($data) {
        $sql = 'INSERT INTO `messages` (`sender_id`, `receiver_id`, `message`) VALUES (:sender_id, :receiver_id, :message)';
        $this->db->query($sql);
        $this->db->bindArray([
            ':sender_id' => $data['sender_id'],
            ':receiver_id' => $data['receiver_id'],
            ':message' => $data['message']
        ]);
        return $this->db->execute();
    }

    public function getMessages($sender_id, $receiver_id) {
        $sql = 'SELECT * FROM `messages` WHERE (`sender_id` = :sender_id AND `receiver_id` = :receiver_id) OR (`sender_id` = :receiver_id AND `receiver_id` = :sender_id) ORDER BY `created_at` ASC';
        $this->db->query($sql);
        $this->db->bind(':sender_id', $sender_id);
        $this->db->bind(':receiver_id', $receiver_id);
        return $this->db->fetchAll();
    }
}
