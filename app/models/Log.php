<?php

namespace App\Models;

use Libraries\Database\Database;

class Log
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function createLog($data)
    {
        $sql = 'INSERT INTO `logs` (`user_id`, `action`, `description` , `ip_address` , `user_agent`) VALUES (:user_id, :action, :description , :ip_address , :user_agent)';
        $this->db->query($sql);
        $this->db->bindArray([
            ':user_id' => $data['user_id'],
            ':action' => $data['action'],
            ':description' => $data['description'],
            ':ip_address' => $data['ip_address'],
            ':user_agent' => $_SERVER['HTTP_USER_AGENT']
        ]);
        return $this->db->execute();
    }

    public function getLogsByUserId($id)
    {
        $sql = "SELECT `logs`.`id`,`logs`.`user_id`,`logs`.`action`,`logs`.`ip_address`,`logs`.`user_agent`,`logs`.`description`,`logs`.`created_at`,`logs`.`deleted_at` FROM `logs` WHERE `logs`.`user_id` = :user_id AND `logs`.`deleted_at` IS NULL AND `logs`.`description` = :description LIMIT 10 OFFSET 0;";
        $this->db->query($sql);
        $this->db->bindArray([
            ':user_id' => (int)$id,
            ':description' => 'Login User'
        ]);
         
        $rows = $this->db->fetchAll();
        if ($this->db->rowCount() > 0) {
            return $rows;
        } else {
            return false;
        }
    }

    public function deleteLogById($id){

        $sql = 'UPDATE `logs` SET `deleted_at` = NOW() WHERE `logs`.`id` = :id;';
        $this->db->query($sql);

        $this->db->bind(':id' , $id);

        return ($this->db->execute()) ? true : false;
    }

    public function updateLastActivity($id){
        $sql = 'UPDATE `users` SET `last_activity` = NOW() WHERE `users`.`id` = :id;';
        $this->db->query($sql);

        $this->db->bind(':id' , $id);

        return ($this->db->execute()) ? true : false;
    }


}
