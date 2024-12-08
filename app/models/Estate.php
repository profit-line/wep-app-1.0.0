<?php

namespace App\models;
use Libraries\Database\Database;


class Properties{

    private $db;
    public function __construct()
    {
        
        $this->db = new Database();

    }

    public function estateInsert($data){

        $sql = "";

    }

    public function getEstateById($id){

    }

    public function editEstateById($id){

    }

}