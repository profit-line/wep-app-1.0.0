<?php

namespace App\Models;

use Libraries\Database\Database;

class Estate {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function findEstateById($id) {
        $sql = 'SELECT `estate`.`id` FROM `estate` WHERE `estate`.`id` = :id;';
        $this->db->query($sql);
        $this->db->bind(':id', $id);
        $row = $this->db->fetch();
        return $row ? true : false;
    }

    public function estateInsert($data) {
        $sql = 'INSERT INTO `estate`(`owner_id`, `agency_id`, `title`, `description`, `address`, `location`, `type`, `unite`, `status`) VALUES (:owner_id, :agency_id, :title, :description, :address, :location, :type, :unite, :status)';
        $this->db->query($sql);
        $this->db->bindArray($data);
        return $this->db->execute();
    }

    public function editEstateById($id, $data) {
        return $this->db->updateById('estate' , $id , $data);
    }

    public function deleteEstateById($id) {
        $sql = 'DELETE FROM `estate` WHERE `id` = :id';
        $this->db->query($sql);
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function getEstatesData() {
        return $this->db->getAllData(
            'estate',
            ['id' , 'owner_id' , 'agency_id' , 'title' , 'description' , 'address' , 'location' , 'type' , 'unite' , 'status']
        );
    }
}