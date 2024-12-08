<?php

namespace App\models;

use Libraries\Database\Database;

class Clients
{

    private $db;
    public function __construct()
    {

        $this->db = new Database();
    }

    public function clientInsert($data)
    {

        $sql = "INSERT INTO `clients` (`family_name`, `last_name`, `profile_image`, `phone_number`, `house_phone_number`, `agency_Id`) VALUES (:family_name, :last_name, :profile_image, :phone_number, :house_phone_number,  :agency_Id);";
        $this->db->query($sql);
        $this->db->bindArray([
            ':family_name' => $data['family_name'],
            ':last_name' => $data['last_name'],
            ':profile_image' => $data['profile_image'],
            ':phone_number' => $data['phone_number'],
            ':house_phone_number' => $data['house_phone_number'],
            'city' => $data['city'],
            ':agency_Id' => $data['agency_Id']
        ]);
        
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function getClientDataById($id) {

        $sql = 'SELECT ``';

    }

    public function editClientDatabyId($data) {

    }

        public function clientDeleteById($id , $image_profile){

            $sql = 'UPDATE `clients` SET `clients`.`deleted_at` = NOW() , `clients`.`status` = 0 , `clients`.`profile_image` = NULL  WHERE `clients`.`id` = :id;';
            $this->db->query($sql);
            $this->db->bind(':id' , $id);

            if($this->db->execute()){
    
                    if(fileDelete(APPROOT . '/public/img/profilesClients/' . $image_profile)){
                        return true;
                    }else{
                        return false;
                    }
    
            }else{
                return false;
            }
    
        }

}
