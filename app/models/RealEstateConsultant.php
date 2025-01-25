<?php

namespace App\models;

use Libraries\Database\Database;

class RealEstateConsultant {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function findConsultantById($id) {
        $sql = 'SELECT * FROM `real_estate_consultant` WHERE `id` = :id';
        $this->db->query($sql);
        $this->db->bind(':id', $id);
        $row = $this->db->fetch();
        return $row ? $row : false;
    }

    public function findConsultantByUserName($username) {
        $sql = 'SELECT * , `real_estate_consultant`.`id` AS idC FROM `real_estate_consultant` INNER JOIN `users` ON `real_estate_consultant`.`user_id` = `users`.`id` WHERE `users`.`user_name` = :username';
        $this->db->query($sql);
        $this->db->bind(':username', $username);
        $row = $this->db->fetch();
        return $row ? $row : false;
    }

    public function insertConsultant($userId) {
        $sql = 'INSERT INTO `real_estate_consultant`(`user_id`) VALUES (:user_id)';
        $this->db->query($sql);
        $this->db->bind(':user_id', $userId);
        return $this->db->execute();
    }

    public function updateConsultantById($id, $data) {
       
        return $this->db->updateById('real_estate_consultant' , $id , $data);

    }
     	 	 	 	 	 
    public function getConsultantsData() {
    
        return $this->db->getAllData(
            'real_estate_consultant',
            ['id' , 'user_id' , 'agency_image' , 'address' , 'location' , 'office_phone_number']
        );
    
    }
}