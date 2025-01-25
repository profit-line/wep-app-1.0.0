<?php

namespace App\Models;

use Libraries\Database\Database;

class Sales
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function findSaleById($id)
    {
        $sql = 'SELECT `sales`.`id` FROM `sales` WHERE `sales`.`id` = :id;';
        $this->db->query($sql);
        $this->db->bind(':id', $id);
        $row = $this->db->fetch();
        return $row ? true : false;
    }

    public function AllSalesCount($id){
        $sql = "SELECT COUNT(id) as total FROM sales WHERE estate_id = :id;";
        $this->db->query($sql);
$this->db->bind(':id', $id);
        $row = $this->db->fetch();
        if($this->db->rowCount() > 0){
            return $row;
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

    public function getSalesDataByConsultantId($consultantId, $type = null, $page = 1, $perPage = 10)
    {

        $offset = 0;
        if($page > 1){
        $offset = ($page - 1) * $perPage;
        }
     
        $sql = 'SELECT 
        e.id,
     c.family_name, 
        c.last_name, 
        c.phone_number, 
        e.*
FROM 
    clients c
JOIN 
    estate e ON c.id = e.client_id 
WHERE 
    e.agency_id = :consultantId 
    AND e.contract_type = :contract_type
    AND e.deleted_at IS NULL
    AND e.displayed = 1';

        if ($type !== null) {
            $sql .= ' AND e.type = :type';
        }


        $sql .= ' ORDER BY 
    e.created_at DESC';

        $this->db->query($sql);
        $this->db->bind(':consultantId', $consultantId);
        $this->db->bind(':contract_type', 'SATILIK');

        if ($type !== null) {
            $this->db->bind(':type', $type);
        }


        return $this->db->fetchAll();
    
    }

    public function getSalesData()
    {
        return $this->db->getAllData(
            'sales',
            ['id', 'estate_id', 'buyer_id', 'sale_date', 'price']
        );
    }
}
