<?php

namespace App\Models;

use Libraries\Database\Database;

class Clients {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function findClientById($id) {
        $sql = 'SELECT `clients`.`id` FROM `clients` WHERE `id` = :id';
        $this->db->query($sql);
        $this->db->bind(':id', $id);
        $row = $this->db->fetch();
        return $row ? true : false;
    }

    public function clientInsert($data) {
        $sql = 'INSERT INTO `clients` (`family_name`, `last_name`, `profile_image`, `phone_number`, `house_phone_number`, `city` ,`agency_Id` , `status`) VALUES (:family_name, :last_name, :profile_image, :phone_number, :house_phone_number, :city , :agency_Id , :status)';
        $this->db->query($sql);
        $this->db->bindArray($data);
        return $this->db->execute();
    }

    public function getClientDataById($id) {
        $sql = 'SELECT * FROM `clients` WHERE `id` = :id AND `deleted_at` IS NULL';
        $this->db->query($sql);
        $this->db->bind(':id', $id);
        $row = $this->db->fetch();
        return $row ? $row : false;
    }

    public function editClientDataById($id, $data) {

        return $this->db->updateById('clients' , $id , $data);

    }

    public function clientDeleteById($id, $image_profile) {
        $sql = 'UPDATE `clients` SET `deleted_at` = NOW(), `status` = 0, `profile_image` = NULL WHERE `id` = :id';
        $this->db->query($sql);
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            if (fileDelete(APPROOT . '/public/img/profilesClients/' . $image_profile)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getClientsData($filters = [], $fields = ['*'], $page = 1, $perPage = 10) {
   
        return $this->db->getAllData(
            'clients',
            ['id' , 'family_name' , 'last_name' , 'profile_image' ,  'phone_number' , 'house_phone_number' , 'city' , 'agency_Id' , 'status']
        );

    }
}