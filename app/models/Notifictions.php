<?php

namespace App\Models;

use Libraries\Database\Database;

class Notifictions{

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function createNotification($data) {
        $sql = 'INSERT INTO `notifictions` (`user_id`, `message` , `status`) VALUES (:user_id, :message , :status)';
        $this->db->query($sql);
        $this->db->bindArray([
            ':user_id' => $data['user_id'],
            ':message' => $data['message'],
            ':status' => $data['status']
        ]);
        return $this->db->execute();
    }

    public function getNotification($id) {
        $sql = 'SELECT * FROM `notifictions` 
                WHERE user_id = :user_id AND deleted_at IS NULL AND is_read = 0
                ORDER BY id DESC;';
    
        $this->db->query($sql);
        $this->db->bind(':user_id' , $id);
    
        $rows = $this->db->fetchAll();
        if($this->db->rowCount() > 0){
            return $rows;
        } else {
            return false;
        }
    }
    
    public function readNotification($id){
        return $this->db->updateById('notifictions' , $id , ['is_read' => 1]);
    }

}
