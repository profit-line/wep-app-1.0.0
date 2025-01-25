<?php

namespace App\Models;

use Libraries\Database\Database;
use Libraries\Auth\Auth;

class Rentals
{

    private $db;
    private $pdo;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function findRentalById($id)
    {
        $sql = 'SELECT `rentals`.`id` FROM `rentals` WHERE `rentals`.`id` = :id;';
        $this->db->query($sql);
        $this->db->bind(':id', $id);
        $row = $this->db->fetch();
        return $row ? true : false;
    }

    public function rentalInsert($data)
    {
        $clientData = [
            'family_name' => $data['family_name'],
            'last_name' => $data['last_name'],
            'phone_number' => $data['phone'],
            'address' => $data['address'],
            'agency_Id' => $data['consultant_id']
        ];

        $rentalData = [
            'rental_date_start' => $data['start_date'],
            'rental_date_end' => $data['end_date'],
            'price' => $data['price'],
            'description' => $data['description']
        ];

        $sql = "SELECT * FROM `estate` WHERE id = :id;";
        $this->db->query($sql);
        $this->db->bind(':id' , $data['estate_id']);
        $estate = $this->db->fetch();

        $clientSql = "INSERT INTO clients (family_name, last_name, phone_number, agency_Id  , city) 
                          VALUES (:family_name, :last_name, :phone_number ,:agency_Id  , :city)";
        $this->db->query($clientSql);
        $this->db->bindArray([
            ':family_name' => $clientData['family_name'],
            ':last_name' => $clientData['last_name'],
            ':phone_number' => $clientData['phone_number'],
            ':agency_Id' => $clientData['agency_Id'],
            ':city' => $estate->city
        ]);
        $clientResult = $this->db->execute();

        $clientId = $this->db->lastInsertId();
        $rentalData['buyer_Id'] = $clientId;



        $rentalSql = "INSERT INTO rentals ( buyer_Id, estate_id, rental_date_start, rental_date_end,rental_price, description) 
                          VALUES ( :buyer_Id, :estate_id, :rental_date_start, :rental_date_end, :rental_price , :description)";
        $this->db->query($rentalSql);
        $this->db->bindArray([
            ':buyer_Id' => (int)$rentalData['buyer_Id'],
            ':estate_id' => (int)$data['estate_id'],
            ':rental_date_start' => $rentalData['rental_date_start'],
            ':rental_date_end' => $rentalData['rental_date_end'],
            ':rental_price' => $rentalData['price'],
            ':description' => $rentalData['description'],
        ]);
       
        $rentalResult = $this->db->execute();
        
        if($rentalResult && $clientResult){
            return true;
        }else{
            return false;
        }
    }


    public function editRentalById($id, $data)
    {
        return $this->db->updateById('rentals', $id, $data);
    }

    public function deleteRentalById($id)
    {
    $tableName = 'rentals'; 
    $data = [
        'deleted_at' => date('Y-m-d H:i:s') 
    ];

    $result = $this->db->updateById($tableName, $id, $data);
    
    if($result){
        return true;
    }else{
        return false;
    }

    }

    public function getTotalRentalsCount($consultantId, $type = null, $startDays = null, $endDays = null)
    {
        $sql = 'SELECT COUNT(*) as total FROM `rentals`
                JOIN `estate` ON `rentals`.`estate_Id` = `estate`.`id`
                WHERE `estate`.`agency_id` = :consultantId
                AND `rentals`.`deleted_at` IS NULL';

        if ($type !== null) {
            $sql .= ' AND `estate`.`type` = :type';
        }

        if ($startDays !== null && $endDays !== null) {
            $sql .= ' AND `rentals`.`rental_date_end` BETWEEN CURDATE() + INTERVAL :startDays DAY AND CURDATE() + INTERVAL :endDays DAY';
        } elseif ($startDays === null && $endDays !== null) {
            $sql .= ' AND `rentals`.`rental_date_end` BETWEEN CURDATE() AND CURDATE() + INTERVAL :endDays DAY';
        }

        $this->db->query($sql);
        $this->db->bind(':consultantId', $consultantId);

        if ($type !== null) {
            $this->db->bind(':type', $type);
        }

        if ($startDays !== null && $endDays !== null) {
            $this->db->bind(':startDays', $startDays);
            $this->db->bind(':endDays', $endDays);
        } elseif ($startDays === null && $endDays !== null) {
            $this->db->bind(':endDays', $endDays);
        }
        return $this->db->fetch()->total;
    }

    public function getConsultantId($userId)
    {
        $sql = 'SELECT id FROM real_estate_consultant WHERE user_id = :userId AND deleted_at IS NULL';
        $this->db->query($sql);
        $this->db->bind(':userId', $userId);
        return $this->db->fetch()->id;
    }

    public function getRentalsDataByConsultantId($consultantId, $type = null, $page = 1, $perPage = 10)
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
LEFT JOIN rentals r ON e.id = r.estate_id  
WHERE 
  e.agency_id = :consultantId 
  AND e.contract_type = :contract_type
  AND e.deleted_at IS NULL
  AND e.displayed = 1';     

        if ($type !== null) {
            $sql .= ' AND e.type = :type';
        }

        $sql .= ' ORDER BY 
    e.id DESC;';

        $this->db->query($sql);
        $this->db->bind(':consultantId', $consultantId);
        $this->db->bind(':contract_type', 'KIRALIK');

        if ($type !== null) {
            $this->db->bind(':type', $type);
        }

    
        return $this->db->fetchAll();
    }

    public function getRentalsByDateRange($consultantId, $startDays, $endDays, $page = 1, $perPage = 10)
    {
        $offset = ($page - 1) * $perPage;

        $sql = 'SELECT 
                       `rentals`.`id`, 
                    `clients`.`family_name`, 
                    `clients`.`phone_number`, 
                    `estate`.`id`, 
                    `estate`.`address`, 
                    `estate`.`notification_time`, 
                    `rentals`.`rental_date_start`, 
                    `rentals`.`rental_date_end`,
                    `estate`.`block`,
                    `rentals`.`rental_price`,
                    `clients`.`email`,
                    `rentals`.description
                FROM 
                    `rentals`
                JOIN 
                    `clients` ON `rentals`.`buyer_Id` = `clients`.`id`
                JOIN 
                    `estate` ON `rentals`.`estate_Id` = `estate`.`id`
                WHERE 
                    `estate`.`agency_id` = :consultantId
                    AND `rentals`.`deleted_at` IS NULL
                    AND `rentals`.`rental_date_end` BETWEEN CURDATE() + INTERVAL :startDays DAY AND CURDATE() + INTERVAL :endDays DAY
                ORDER BY 
                    `rentals`.`rental_date_end` ASC;';

        $this->db->query($sql);
        $this->db->bind(':consultantId', $consultantId);
        $this->db->bind(':startDays', $startDays);
        $this->db->bind(':endDays', $endDays);


        return $this->db->fetchAll();
    }

    public function getRentalsAllData($consultantId, $page = 1, $perPage = 10)
    {
        $offset = 0;
        if($page > 1){
        $offset = ($page - 1) * $perPage;
        }
        $sql = 'SELECT 
    r.id, 
    c.family_name, 
    c.phone_number, 
    e.address, 
    r.rental_date_start, 
    r.rental_date_end, 
    r.rental_price,
    e.block, 
    c.email, 
    r.description
FROM 
    rentals r
JOIN 
    clients c ON r.buyer_Id = c.id
JOIN 
    estate e ON r.estate_Id = e.id
WHERE 
    e.agency_id = :consultantId 
    AND r.deleted_at IS NULL;
ORDER BY 
    r.rental_date_end ASC;';

        $this->db->query($sql);
        $this->db->bind(':consultantId', $consultantId);

        return $this->db->fetchAll();
    }
 


    public function getExpiringRentals($currentDate, $id)
    {
        $sql = "
           SELECT
    r.*,
    e.id,
    e.agency_id,
    e.notification_time,
    c.*
FROM
    rentals r
INNER JOIN
    estate e ON r.estate_id = e.id
INNER JOIN
    clients c ON r.buyer_Id = c.id 
WHERE
    r.rental_date_end <= :currentDate
    AND r.deleted_at IS NULL
    AND e.agency_id = :id;"; 
    
        $this->db->query($sql);
        $this->db->bind(':currentDate', $currentDate);
        $this->db->bind(':id', $id);
        return $this->db->fetchAll();
    }
    
    public function getExpiredRentals($rentals, $currentDate) {
        $expiredRentals = [];
        $twoDaysAgo = strtotime('-2 days', strtotime($currentDate));
        
        foreach ($rentals as $rental) {
            if($rental->notification_time == NULL){
            $endDate = strtotime($rental->rental_date_end);
            if ($endDate <= $twoDaysAgo) {
                $expiredRentals[] = $rental;
            }
        }
        }
    
        return $expiredRentals;
    }
}
