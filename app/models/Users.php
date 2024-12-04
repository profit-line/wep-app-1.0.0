<?php
namespace App\models;

use Libraries\Database\Database;

class Users{

    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function findUserByUserName($UserName)
    {

        $sql = "SELECT `users`.`user_name` FROM `users` WHERE `users`.`user_name` = :user_name";
        $this->db->query($sql);


        $this->db->bind(':user_name', $UserName);

        $this->db->fetch();

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function userInsert($data_user){

        if($this->findUserByUserName($data_user['user_name'])){
            return "exists";
        }
        $data_user['password'] = password_hash($data_user['password'] . "DRdgr33e" , PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (`user_name`, `family_name`, `last_name`, `profile_image`, `phone_number` , `mobile_phone_number` , `house_phone_number` , `email` , `password` , `verify_token` , `verify_token_expire`)VALUES (:user_name, :family_name, :last_name, :profile_image, :phone_number , :mobile_phone_number , :house_phone_number , :email , :password , :verify_token , :verify_token_expire);";
        $this->db->query($sql);

        $bind = [
            ':user_name' => $data_user['user_name'],
            ':family_name' => $data_user['family_name'],
            ':last_name' =>  $data_user['last_name'],
            ':profile_image' => $data_user['profile_image_name'],
            ':phone_number' => $data_user['phone_number'],
            ':mobile_phone_number' => $data_user['mobile_phone_number'],
            ':house_phone_number' => $data_user['house_phone_number'],
            ':email' => $data_user['email'] ,
            ':password' => $data_user['password'],
            ':verify_token' => generateToken(),
            ':verify_token_expire' => time() + 3600
        ];

        $this->db->bindArray($bind);

        if($this->db->execute()){
            return ['status' => true , 'verify_token' => $bind[':verify_token']];
        }else{
            return false;
        }
    }


    public function loginCheck($userData){
          
        $sql = "SELECT `users`.`id` , `users`.`password`  FROM `users` WHERE `users`.`user_name` = :user_name;";
            $this->db->query($sql);
    
            $this->db->bind(':user_name', $userData['user_name']);
    
            $row = $this->db->fetch();
            $password_hash = $row->password;
    
            if ($this->db->rowCount() > 0) {
                if(password_verify($userData['password'] , $password_hash)){
                    return $row;                
                }else{
                    return false;
                }
            }
            return false;    

    }

    public function creatCookieToken($id){
        $sql = "UPDATE `users` SET `users`.`cookie_token` = :token WHERE `users`.`id` = :id;";

        $this->db->query($sql);

        $this->db->bindArray([
            'id' => $id,
            'token' => generateToken()
        ]);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }


}