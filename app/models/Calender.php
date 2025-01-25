<?php

namespace App\Models;

use Libraries\Database\Database;

class Calender
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllEvents()
    {
        $sql = "SELECT * FROM calendar_events"; 
        $this->db->query($sql);
        $results = $this->db->fetchAll();
        return $results;
    }

    public function add($data){

        $sql = "INSERT INTO calendar (title, start_date, end_date , category , :user_id) VALUES (:title, :start_date, :end_date , :category , :user_id)";
        $this->db->query($sql);
        $this->db->bindArray([
            ':title' => $data['title'],
            ':start_date' => $data['start_date'],
            ':end_date' => $data['end_date'],
            ':category' => $data['category'],
            ':user_id' => $data['user_id']
        ]);
        return $this->db->execute();
    }


}