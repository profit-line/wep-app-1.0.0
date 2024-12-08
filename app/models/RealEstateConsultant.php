<?php

namespace App\models;

use Libraries\Database\Database;

class RealEstateConsultant{

    private $db;

    public function __construct(){

        $this->db = new Database();

    }

    public function AddConsultant($userId){

        $sql = 'INSERT INTO `users`(`user_id`) VALUE (:user_id);';
        $this->db->query($sql);

        $this->db->bind(':user_id' , $userId);
        
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }

}