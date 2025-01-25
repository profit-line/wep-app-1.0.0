<?php

namespace App\models;

use Libraries\Database\Database;

class Users
{

    private $db;
    private $roles = ['admin', 'ticket_admin', 'user'];
    public function __construct()
    {
        $this->db = new Database();
    }

    public function findUserByUserName($UserName)
    {

        $sql = "SELECT `users`.`user_name` FROM `users` WHERE `users`.`user_name` = :user_name";
        $this->db->query($sql);


        $this->db->bind(':user_name', $UserName);

        $row = $this->db->fetch();

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function userInsert($data_user)
    {

        if ($this->findUserByUserName($data_user['user_name'])) {
            return "exists";
        }
        if (isset($data_user['role']) && !in_array($data_user['role'], $this->roles)) {
            return false;
        }
        $data_user['password'] = password_hash($data_user['password'] . "DRdgr33e", PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (`user_name`, `family_name`, `last_name`, `profile_image` , `mobile_phone_number` , `house_phone_number` , `email` , `password` , `city`  ,  `ip_address` ,  `verify_token` , `verify_token_expire`)VALUES (:user_name, :family_name, :last_name, :profile_image,  :mobile_phone_number , :house_phone_number , :email , :password , :city  , :ip_address  , :verify_token , :verify_token_expire);";
        $this->db->query($sql);

        $bind = [
            ':user_name' => $data_user['user_name'],
            ':family_name' => $data_user['family_name'],
            ':last_name' =>  $data_user['last_name'],
            ':profile_image' => $data_user['profile_image_name'],
            ':mobile_phone_number' => $data_user['mobile_phone_number'],
            ':house_phone_number' => $data_user['house_phone_number'],
            ':email' => $data_user['email'],
            ':password' => $data_user['password'],
            ':city' => $data_user['city'],
            ':ip_address' => $data_user['ip_address'],
            ':verify_token' => generateToken(),
            ':verify_token_expire' => time() + 3600
        ];

        $this->db->bindArray($bind);

        if ($this->db->execute()) {
            return ['status' => true, 'verify_token' => $bind[':verify_token']];
        } else {
            return false;
        }
    }

    public function editUserDataById($id, $data)
    {

        return $this->db->updateById('users', $id, $data);
    }

    public function loginCheck($userData)
    {

        $sql = "SELECT `users`.`id` , `users`.`status` , `users`.`is_active` , `users`.`password`  FROM `users` WHERE `users`.`user_name` = :user_name;";
        $this->db->query($sql);

        $this->db->bind(':user_name', $userData['user_name']);

        $row = $this->db->fetch();
        $password_hash = $row->password;

        if ($this->db->rowCount() > 0) {
            if (password_verify($userData['password'] . "DRdgr33e", $password_hash)) {

                $data = [
                    'id' => $row->id,
                    'status' => $row->status,
                    'is_active' => $row->is_active
                ];

                return $data;
            } else {
                return false;
            }
        }
        return false;
    }


    public function editConsultantDataByUserId($userId, $data)
    {

        return $this->db->updateById('real_estate_consultant', $userId, $data);
    }

    public function getUserDataById($id)
    {
        $sql = "SELECT * FROM `users` WHERE `id` = :id;";
        $this->db->query($sql);
        $this->db->bind(':id', $id);
        $row = $this->db->fetch(\PDO::FETCH_OBJ); 
    
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }
    

    public function setPasswordResetToken($id , $data){
        return $this->db->updateById('users' , $id , $data);
    }


    public function getUserDataByEmail($email)
    {

        $sql = 'SELECT * FROM `users` WHERE `users`.`email` = :email;';
        $this->db->query($sql);

        $this->db->bind(':email', $email);
        $row = $this->db->fetch();
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function deleteUserById($id, $image_profile, $agency_image)
    {

        $sql = 'UPDATE `users` SET `users`.`deleted_at` = NOW() , `users`.`is_active` = 0 , `users`.`status` = 0, `users`.`profile_image` = NULL  WHERE `users`.`id` = :id;';
        $this->db->query($sql);
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {

            $sql = 'UPDATE `real_estate_consultant` SET `real_estate_consultant`.`deleted_at` = NOW() ,`users`.`agency_image` = NULL  WHERE `users`.`user_id` = :user_id;';
            $this->db->query($sql);
            $this->db->bind(':user', $id);

            if ($this->db->execute()) {
                if (fileDelete(APPROOT . '/public/ev-admin-dashboard-template.multipurposethemes.com/bs5/images/avatar/'. $image_profile) && fileDelete(APPROOT . '/public/ev-admin-dashboard-template.multipurposethemes.com/bs5/images/agency/' . $agency_image)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function verifyUser($id , $data)
    {

        return $this->db->updateById('users' , $id , $data);

    }


    public function activeUserById($id)
    {

        $sql = 'UPDATE `users` SET `users`.`is_active` = 1 , `users`.`status` = 2  WHERE `users`.`id` = :id;';
        $this->db->query($sql);

        $this->db->bindArray([
            ':id' => $id
        ]);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getUsersData()
    {   
        $sql = "SELECT * FROM `users` ORDER BY `id` DESC";
        $this->db->query($sql);
        $rows = $this->db->fetchAll();
        if($this->db->rowCount() > 0){
            return $rows;
        }else{
            return false;
        }
    }

    public function getActiveConsultantUsers()
    {
        $sql = "
            SELECT 
                u.id AS user_id, 
                u.user_name, 
                u.family_name, 
                u.last_name,
                u.email, 
                u.mobile_phone_number, 
                u.profile_image,
                rec.id AS consultant_id, 
                rec.address, 
                rec.location 
            FROM 
                `users` AS u
            INNER JOIN 
                `real_estate_consultant` AS rec
            ON 
                u.id = rec.user_id
            WHERE 
                u.status = 1";

        $this->db->query($sql);
        return $this->db->fetchAll();
    }


    public function creatCookieToken($id)
    {
        $sql = "UPDATE `users` SET `users`.`cookie_token` = :token WHERE `users`.`id` = :id;";

        $this->db->query($sql);

        $this->db->bindArray([
            ':id' => $id,
            ':token' => generateToken()
        ]);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function isOnlineUsersCount(){
        $sql = "SELECT COUNT(id) as total FROM users WHERE last_activity >= NOW() - INTERVAL 3 MINUTE;";
        $this->db->query($sql);

        $row = $this->db->fetch();
        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    public function AllUsersCount(){
        $sql = "SELECT COUNT(id) as total FROM users;";
        $this->db->query($sql);

        $row = $this->db->fetch();
        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    public function deleteCookieToken($id)
    {

        $sql = 'UPDATE `users` SET `users`.`cookie_token` = NULL WHERE `users`.`id` = :id;';
        $this->db->query($sql);

        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
