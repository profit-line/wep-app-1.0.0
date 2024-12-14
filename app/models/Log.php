<?php

namespace App\Models;

use Libraries\Database\Database;

class Log {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function createLog($data) {
        $sql = 'INSERT INTO `logs` (`user_id`, `action`, `description`) VALUES (:user_id, :action, :description)';
        $this->db->query($sql);
        $this->db->bindArray([
            ':user_id' => $data['user_id'],
            ':action' => $data['action'],
            ':description' => $data['description'] 
        ]);
        return $this->db->execute();
    }

    public function getLogs() {
        return $this->db->getAllData('logs');
    }
}
