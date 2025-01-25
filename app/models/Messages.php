<?php

namespace App\Models;

use Libraries\Database\Database;

class Messages
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function sendMessage($data)
    {
        $sql = 'INSERT INTO `messages` (`sender_id`, `receiver_id`, `message`) VALUES (:sender_id, :receiver_id, :message)';
        $this->db->query($sql);
        $this->db->bindArray([
            ':sender_id' => $data['sender_id'],
            ':receiver_id' => $data['receiver_id'],
            ':message' => $data['message']
        ]);
        return $this->db->execute();
    }

    public function getMessages($sender_id, $receiver_id)
    {
        $sql = 'SELECT * FROM `messages` WHERE (`sender_id` = :sender_id AND `receiver_id` = :receiver_id) OR (`sender_id` = :receiver_id AND `receiver_id` = :sender_id) ORDER BY `created_at` ASC';
        $this->db->query($sql);
        $this->db->bind(':sender_id', $sender_id);
        $this->db->bind(':receiver_id', $receiver_id);
        return $this->db->fetchAll();
    }

    public function usersChatById($id)
    {
        $sql = "SELECT DISTINCT
    u.id AS user_id,
    u.user_name,
    u.family_name,
    u.last_name,
    u.profile_image
        FROM
    messages m
        JOIN
    users u
        ON
    (m.sender_id = u.id AND m.receiver_id = :id)
        OR
    (m.receiver_id = u.id AND m.sender_id = :id);
    ";

        $this->db->query($sql);
        $this->db->bind(':id' , $id);
        $rows = $this->db->fetchAll();
        if($this->db->rowCount() > 0){
            return $rows;
        }else{
            return false;
        }
    }


    public function getMessagesAll($page, $perPage = 10){

        $offset = ($page - 1) * $perPage;
        $sql = 'SELECT 
        u1.id AS sender_id,
    u1.user_name AS sender_name, 
    u1.email AS sender_email,
    u2.id AS receiver_id, 
    u2.user_name AS receiver_name, 
    u2.email AS receiver_email, 
    m.message ,
    m.created_at
FROM 
    messages m
JOIN 
    users u1 ON m.sender_id = u1.id
JOIN 
    users u2 ON m.receiver_id = u2.id 
    ORDER BY m.id DESC;';
         $this->db->query($sql);
        $rows = $this->db->fetchAll();
        if($this->db->rowCount() > 0){
            return $rows;
        }else{
            return false;
        }

    }

    public function totalMessages(){
        $sql = 'SELECT COUNT(id) as total FROM messages WHERE deleted_at IS NULL;';
        $this->db->query($sql);

        return $this->db->fetch();
    }


        public function totalMessagesAdmin(){
            $sql = 'SELECT COUNT(messages.id) as total 
                    FROM messages 
                    INNER JOIN users ON messages.receiver_id = users.id 
                    WHERE messages.deleted_at IS NULL AND users.role = "ticket_admin"';
            $this->db->query($sql);
        
            return $this->db->fetch();  
    }

    public function totalAdminResponses() {
        $sql = 'SELECT COUNT(messages.id) as total 
                FROM messages 
                INNER JOIN users ON messages.sender_id = users.id 
                WHERE messages.deleted_at IS NULL AND users.role = "ticket_admin"';
        $this->db->query($sql);
    
        $result = $this->db->fetch();
        $result = (int) $result->total;
        return $result > 0 ? $result : 0;
    }


    public function getMessagesById($senderId, $receiverId)
    {
        $sql = 'SELECT 
        u1.id AS sender_id,
    u1.user_name AS sender_name, 
    u1.email AS sender_email,
    u2.id AS receiver_id, 
    u2.user_name AS receiver_name, 
    u2.email AS receiver_email, 
    m.message ,
    m.created_at
FROM 
    messages m
JOIN 
    users u1 ON m.sender_id = u1.id
JOIN 
    users u2 ON m.receiver_id = u2.id 
    WHERE u1.id = :sender_id AND u2.id = :receiver_id 
    ORDER BY m.id DESC;';
        $this->db->query($sql);
        $this->db->bind(':sender_id', $senderId);
        $this->db->bind(':receiver_id', $receiverId);

        return $this->db->fetchAll();
    }
    

}
