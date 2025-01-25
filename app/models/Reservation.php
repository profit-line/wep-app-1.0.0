<?php

namespace App\models;

use Libraries\Database\Database;

class Reservation
{

    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getExpiringReservation($agency_id){

        $sql = "SELECT id ,first_name, last_name, phone, address, start_date, end_date, project_name , description , notification_time FROM reservation WHERE `reservation`.`end_date` BETWEEN CURDATE() + INTERVAL 1 DAY AND CURDATE() + INTERVAL 3 DAY AND agency_id = :agency_id AND notification_time IS NULL;";
         $this->db->query($sql);
    $this->db->bind(':agency_id' , $agency_id);

    $rows = $this->db->fetchAll();
    if($this->db->rowCount() > 0){
        return $rows;
    }else{
        return false;
    }

    }

    public function getExpiring2Reservation($agency_id){

        $sql = "SELECT id ,first_name, last_name, phone, address, start_date, end_date, project_name ,  description , notification_time
        FROM reservation 
        WHERE end_date BETWEEN DATE_ADD(CURDATE(), INTERVAL 1 DAY) AND DATE_ADD(CURDATE(), INTERVAL 3 DAY)
        AND agency_id = :agency_id AND notification_time IS NULL;";

$this->db->query($sql);
$this->db->bind(':agency_id', $agency_id);

$rows = $this->db->fetchAll();

if($this->db->rowCount() > 0){
    return $rows;
}else{
    return false;
}
    }
    
        public function addNotificationTimeByIdReserv($id){
        return $this->db->updateById('reservation' , $id , ['notification_time' => date('Y-m-d H:i:s')]);
    }

    public function getReservation($agency_id){
        $sql = "SELECT * FROM `reservation` WHERE `reservation`.`agency_id` = :agency_id AND `reservation`.`deleted_at` IS NULL ORDER BY 
    id DESC;";
        $this->db->query($sql);
        $this->db->bind(':agency_id' , $agency_id);

        $rows = $this->db->fetchAll();

        if($this->db->rowCount() > 0){
            return $rows;
        }else{
            return false;
        }
    }

    public function getConsultantId($userId)
    {
        $sql = 'SELECT id FROM real_estate_consultant WHERE user_id = :userId AND deleted_at IS NULL';
        $this->db->query($sql);
        $this->db->bind(':userId', $userId);
        return $this->db->fetch()->id;
    }

    public function addReserv($data){

        $sql = 'INSERT INTO `reservation`(`first_name`, `last_name`, `phone`, `address` , `start_date`, `end_date`, `project_name` , `description`, `agency_id`) 
VALUES (:first_name , :last_name , :phone , :address , :start_date , :end_date , :project_name , :description , :agency_id);';
$this->db->query($sql);
        $this->db->bindArray([
            ':first_name' => $data['first_name'],
            ':last_name' => $data['last_name'],
            ':phone' => $data['phone'],
            ':address' => $data['address'],
            ':start_date' => $data['start_date'],
            ':end_date' => $data['end_date'],
            ':description' => $data['description'],
            ':project_name' => $data['project_name'],
            ':agency_id' => (int)$data['agency_id'] 
        ]);


        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }
    
    
        public function deleteReservById($id)
    {
        $sql = 'DELETE FROM `reservation` WHERE `id` = :id';
        $this->db->query($sql);
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

}