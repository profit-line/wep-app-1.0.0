<?php

namespace App\models;

use Libraries\Database\Database;

class Admin{

    private $db;
    public function __construct(){

        $this->db = new Database();

    }

    
}