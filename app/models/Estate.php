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


        public function estateInsert($data, $type) {

            $sql = 'INSERT INTO clients (
  family_name,
  last_name,
  phone_number,
  city,
  agency_Id
)
VALUES (
:family_name,
  :last_name,
  :phone_number,
  :city,
  :agency_Id
);';
$this->db->query($sql);
$this->db->bindArray([
    ':family_name' => $data['first_name'],
  ':last_name' => $data['last_name'],
  ':phone_number' => $data['mobile_phone_number'],
  ':city' => $data['city'],
  ':agency_Id' => $data['agency_id']
]);


if($this->db->execute()){
$clientId = $this->db->lastInsertId();
}else{
    return false;
}


$sql = 'INSERT INTO estate (
    agency_id,
    client_id,
    description,
    address,
    city,
    type,
    floor_count,
    floor,
    building_age,
    sleeps,
    block,
    unit,
    contract_type,
    gross_area,
    net_area,
    elevator,
    parking,
    balcony,
    within_site,
    furnished,
    price,
    project_name
  )
  VALUES (
    :agency_id,
    :client_id,
    :description,
    :address,
    :city,
    :type,
    :floor_count,
    :floor,
    :building_age,
    :sleeps,
    :block,
    :unit,
    :contract_type,
    :gross_area,
    :net_area,
    :elevator,
    :parking,
    :balcony,
    :within_site,
    :furnished,
    :price,
    :project_name
  );';
  
        
            $this->db->query($sql);
            $this->db->bindArray([
                ':agency_id' => (int)$data['agency_id'],
                ':client_id' => (int)$clientId,
                ':description' => $data['description'],
                ':address' => $data['address'],
                ':city' => $data['city'],
                ':type' => $type,
                ':floor_count' => (int)$data['floor_count'],
                ':floor' => (int)$data['floor'],
                ':building_age' => $data['building_age'],
                ':sleeps' => $data['sleeps'],
                ':block' => $data['block'],
                ':unit' => $data['unit'],
                ':contract_type' => $data['contract_type'],
                ':gross_area' => (int)$data['gross_area'],
                ':net_area' => (int)$data['net_area'],
                ':elevator' => !empty($data['elevator']) ? 1 : NULL,
                ':parking' => !empty($data['parking']) ? 1 : NULL,
                ':balcony' => !empty($data['balcony']) ? 1 : NULL,
                ':within_site' => !empty($data['within_site']) ? 1 : NULL,
                ':furnished' => !empty($data['furnished']) ? 1 : NULL,
                ':price' => $data['price'],
                ':project_name' => $data['project_name']
            ]);
      
            return $this->db->execute();
        }
        

        public function estateProjectInsert($data) {

           
            $sql = 'INSERT INTO clients (
                family_name,
                last_name,
                phone_number,
                city,
                agency_Id
              )
              VALUES (
              :family_name,
                :last_name,
                :phone_number,
                :city,
                :agency_Id
              );';
              $this->db->query($sql);
              $this->db->bindArray([
                 ':family_name' => $data['last_name'],
                ':last_name' => $data['first_name'],
                ':phone_number' => $data['mobile_phone_number'],
                ':city' => $data['city'],
                ':agency_Id' => $data['agency_id']
              ]);
              
              
              $addClientCheck = $this->db->execute();
             
              $clientId = $this->db->lastInsertId();
            $sql = 'INSERT INTO `estate` (
                        `agency_id` , `client_id`, `description`, `address`, `city`, 
                        `floor_count`, `floor`, `unit` ,`building_age`, `sleeps`, 
                        `furnished`, `parking`, `balcony`, `within_site`, 
                        `gross_area`, `net_area`, `contract_type`, `project_name`, `price` ,`block`, `elevator`
                    ) VALUES (
                        :agency_id , :client_id,:description, :address, :city, 
                        :floor_count, :floor, :unit, :building_age, :sleeps, 
                        :furnished, :parking, :balcony, :within_site, 
                        :gross_area, :net_area, :contract_type, :project_name, :price , :block, :elevator
                    )';
        
            $this->db->query($sql);
            $this->db->bindArray([
                ':agency_id' => $data['agency_id'],
                ':client_id' => $clientId,
                ':description' => $data['description'],
                ':address' => $data['address'],
                ':city' => $data['city'],
                ':floor_count' => $data['floor_count'],
                ':floor' => $data['floor'],
                ':unit' => $data['unit'],
                ':building_age' => $data['building_age'],
                ':sleeps' => $data['sleeps'],
                ':furnished' => !empty($data['furnished']) ? 1 : NULL,
                ':parking' => !empty($data['parking']) ? 1 : NULL,
                ':balcony' => !empty($data['balcony']) ? 1 : NULL,
                ':within_site' => !empty($data['within_site']) ? 1 : NULL,
                ':gross_area' => $data['gross_area'],
                ':net_area' => $data['net_area'],
                ':contract_type' => $data['contract_type'],
                ':project_name' => $data['project_name'],
                ':block' => $data['block'],
                ':price' => $data['price'],
                ':elevator' => !empty($data['elevator']) ? 1 : NULL,
            ]);
        
            $addEstateCheck = $this->db->execute();
            if($addClientCheck && $addEstateCheck){
                return true;
            }else{
                return true;
            }
        }
        
 public function estateEkleInsert($data) {

           
            $sql = 'INSERT INTO clients (
                family_name,
                last_name,
                phone_number,
                city,
                agency_Id
              )
              VALUES (
              :family_name,
                :last_name,
                :phone_number,
                :city,
                :agency_Id
              );';
              $this->db->query($sql);
              $this->db->bindArray([
                 ':family_name' => $data['last_name'],
                ':last_name' => $data['first_name'],
                ':phone_number' => $data['mobile_phone_number'],
                ':city' => $data['city'],
                ':agency_Id' => $data['agency_id']
              ]);
              
              
              $addClientCheck = $this->db->execute();
             
              $clientId = $this->db->lastInsertId();
            $sql = 'INSERT INTO `estate` (
                        `agency_id` , `client_id`, `description`, `address`, `city`, 
                        `floor_count`, `floor`, `unit` , `building_age`, `sleeps`, 
                        `furnished`, `parking`, `balcony`, `within_site`, 
                        `gross_area`, `net_area`, `type` , `contract_type`, `project_name`, `sold_out` , `rented` , `wrong_number` , `did_not_answer` , `does_not_sell` , `not_available` ,   `do_not_disturb`  , `sale` , `not_sale` , `rent` , `not_rent` , `displayed` , `opportunity`, `price` ,`block`, `elevator`
                    ) VALUES (
                        :agency_id , :client_id,:description, :address, :city, 
                        :floor_count, :floor, :unit , :building_age, :sleeps, 
                        :furnished, :parking, :balcony, :within_site, 
                        :gross_area, :net_area, :type , :contract_type, :project_name, :sold_out , :rented , :wrong_number , :did_not_answer , :does_not_sell , :not_available ,  :do_not_disturb ,  :sale , :not_sale , :rent , :not_rent , :displayed, :opportunity , :price , :block, :elevator
                    );';
     
            $this->db->query($sql);
            $this->db->bindArray([
                ':agency_id' => $data['agency_id'],
                ':client_id' => $clientId,
                ':description' => $data['description'],
                ':address' => $data['address'],
                ':city' => $data['city'],
                ':floor_count' => $data['floor_count'],
                ':floor' => $data['floor'],
                ':unit' => $data['unit'],
                ':building_age' => $data['building_age'],
                ':sleeps' => $data['sleeps'],
                ':furnished' => !empty($data['furnished']) ? 1 : NULL,
                ':parking' => !empty($data['parking']) ? 1 : NULL,
                ':balcony' => !empty($data['balcony']) ? 1 : NULL,
                ':within_site' => !empty($data['within_site']) ? 1 : NULL,
                ':gross_area' => $data['gross_area'],
                ':net_area' => $data['net_area'],
                ':type' => 'KONUT',
                ':contract_type' => ($data['sale'] == 1) ? 'SATILIK' : 'KIRALIK',
                ':project_name' => $data['project_name'],
                ':block' => $data['block'],
                ':price' => $data['price'],
                ':elevator' => !empty($data['elevator']) ? 1 : NULL,
                ':sold_out' =>  !empty($data['sold_out']) ? 1 : NULL,
                ':rented' =>  !empty($data['rented']) ? 1 : NULL,
                ':wrong_number' =>  !empty($data['wrong_number']) ? 1 : NULL,
                ':did_not_answer' => !empty($data['did_not_answer']) ? 1 : NULL,
                ':does_not_sell' => !empty($data['does_not_sell']) ? 1 : NULL,
                ':not_available' => !empty($data['not_available']) ? 1 : NULL,
                ':do_not_disturb' => !empty($data['do_not_disturb']) ? 1 : NULL,
                ':sale' =>  !empty($data['sale']) ? 1 : NULL,
                ':not_sale' => !empty($data['not_sale']) ? 1 : NULL,
                ':rent' => !empty($data['rent']) ? 1 : NULL,
                ':not_rent' => !empty($data['not_rent']) ? 1 : NULL,
                ':displayed' => ($data['not_sale'] == 1 || $data['not_rent'] == 1) ? 0 : 1,
                ':opportunity' => !empty($data['opportunity']) ? 1 : NULL
            ]);

            $addEstateCheck = $this->db->execute();
            
            if($addClientCheck && $addEstateCheck){
                return true;
            }else{
                return false;
            }
        }
        

    public function getEstatesDataById($id) {
        
        return $this->db->getAllData(
            'estate',
            ['*'],
            ['agency_id' => $id]
        );
    }

    public function getEstatesProjectDataById($id , $type = null) {
        
           
        $sql = 'SELECT 
    c.family_name, 
    c.last_name, 
    c.phone_number,
    c.email,
    e.*
FROM 
    clients c
JOIN 
    estate e ON c.id = e.client_id 
WHERE 
    e.agency_id = :consultantId 
    AND e.project_name IS NOT NULL
    AND e.deleted_at IS NULL';

        if ($type !== null) {
            $sql .= ' AND e.type = :type;';
        }

        $this->db->query($sql);
        $this->db->bind(':consultantId', $id);

        if ($type !== null) {
            $this->db->bind(':type', $type);
        }

        return $this->db->fetchAll();

    }
    
    public function addNotificationTimeByIdEstate($id){
        return $this->db->updateById('estate' , $id , ['notification_time' => date('Y-m-d H:i:s')]);
    }

    public function AllEstatesCountByUserId($id){
        $sql = "SELECT COUNT(id) as total FROM estate WHERE agency_id = :id;";
        $this->db->query($sql);
        $this->db->bind(':id' , $id);
        $row = $this->db->fetch();
        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return 0;
        }
    }
    
    public function deleteEstate($estateId){
    $sql = "SELECT client_id FROM estate WHERE id = :id;";
    $this->db->query($sql);
    $this->db->bind(':id' , $estateId);
    $row = $this->db->fetch();

    if(!$row){
         return false;
    }
    $tableName = 'estate'; 
    $data = [
        'deleted_at' => date('Y-m-d H:i:s') 
    ];

    $result = $this->db->updateById($tableName, $estateId, $data);
    
    
    $tableName = 'clients'; 

    $result2 = $this->db->updateById($tableName, $row->client_id, $data);

    if($result && $result2){
    return true;
}else{
    return false;
}
    }
}