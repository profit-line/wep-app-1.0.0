<?php

namespace App\Models;

use Libraries\Database\Database;

class Rentals {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function findRentalById($id) {
        $sql = 'SELECT `rentals`.`id` FROM `rentals` WHERE `rentals`.`id` = :id;';
        $this->db->query($sql);
        $this->db->bind(':id', $id);
        $row = $this->db->fetch();
        return $row ? true : false;
    }

    public function rentalInsert($data) {
        $sql = 'INSERT INTO `rentals`(`estate_id`, `buyer_id`, `rental_date_start`, `rental_date_end`, `before_price`, `rental_price`) VALUES (:estate_id, :buyer_id, :rental_date_start, :rental_date_end, :before_price, :rental_price);';
        $this->db->query($sql);
        $this->db->bindArray([
            ':estate_id' => $data['estate_id'],
            ':buyer_id' => $data['buyer_id'],
            ':rental_date_start' => $data['rental_date_start'],
            ':rental_date_end' => $data['rental_date_end'],
            ':before_price' => $data['before_price'],
            ':rental_price' => $data['rental_price']
        ]);
        return $this->db->execute();
    }

    public function editRentalById($id, $data) {
        return $this->db->updateById('rentals', $id, $data);
    }

    public function deleteRentalById($id) {
        $sql = 'DELETE FROM `rentals` WHERE `id` = :id';
        $this->db->query($sql);
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function getRentalsData() {
        return $this->db->getAllData(
            'rentals',
            ['id', 'estate_id', 'buyer_id', 'rental_date_start', 'rental_date_end', 'before_price', 'rental_price']
        );
    }

    public function getExpiringRentals($currentDate) {
        $sql = 'SELECT `id` FROM `rentals` WHERE `rental_date_end` <= :currentDate AND `deleted_at` IS NULL';
        $this->db->query($sql);
        $this->db->bind(':currentDate', $currentDate);
        return $this->db->fetchAll();
    }

}