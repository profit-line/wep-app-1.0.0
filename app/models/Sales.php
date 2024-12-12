<?php

namespace App\Models;

use Libraries\Database\Database;

class Sales {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function findSaleById($id) {
        $sql = 'SELECT `sales`.`id` FROM `sales` WHERE `sales`.`id` = :id;';
        $this->db->query($sql);
        $this->db->bind(':id', $id);
        $row = $this->db->fetch();
        return $row ? true : false;
    }

    public function saleInsert($data) {
        $sql = 'INSERT INTO `sales`(`estate_id`, `buyer_id`, `sale_date`, `price`) VALUES (:estate_id, :buyer_id, :sale_date, :price);';
        $this->db->query($sql);
        $this->db->bindArray([
            ':estate_id' => $data['estate_id'],
            ':buyer_id' => $data['buyer_id'],
            ':sale_date' => $data['sale_date'],
            ':price' => $data['price']
        ]);
        return $this->db->execute();
    }

    public function editSaleById($id, $data) {
        return $this->db->updateById('sales', $id, $data);
    }

    public function deleteSaleById($id) {
        $sql = 'DELETE FROM `sales` WHERE `id` = :id';
        $this->db->query($sql);
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function getSalesData() {
        return $this->db->getAllData(
            'sales',
            ['id', 'estate_id', 'buyer_id', 'sale_date', 'price']
        );
    }
}
