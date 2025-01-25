<?php

namespace App\models;

use Libraries\Database\Database;

class Investor
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllInvestors($id)
    {
        $sql = "SELECT * FROM investors WHERE agency_id = :id AND deleted_at IS NULL ORDER BY `investors`.`id` DESC;"; 
        $this->db->query($sql);
        $this->db->bind(':id' , $id);
        
        $results = $this->db->fetchAll();
        return $results;
    }

    public function addInvestor($data)
    {

            $sql = 'INSERT INTO `investors`(`first_name`, `last_name`, `address_line1`, `budget`, `city`, `phone_number`, `investment_type`, `description`, `agreement` , `agency_id`) VALUES (:first_name, :last_name, :address_line1, :budget, :city, :phone_number, :investment_type, :description, :agreement , :agency_id);';
            $this->db->query($sql);
            $this->db->bindArray([
                ':first_name' => $data['first_name'], 
                ':last_name' => $data['last_name'], 
                ':address_line1' => $data['address_line1'], 
                ':budget' => $data['budget'], 
                ':city' => $data['city'], 
                ':phone_number' => $data['phone_number'], 
                ':investment_type' => $data['investment_type'],
                ':description' => $data['description'], 
                ':agreement' => (int)$data['agreement'],
                ':agency_id' => (int)$data['agency_id']
            ]);
            
            return $this->db->execute();

    }
    
    
    
    public function deleteInvestor($id){

    $tableName = 'investors'; 
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


}
