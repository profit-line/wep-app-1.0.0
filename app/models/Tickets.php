<?php

namespace App\models;

use Libraries\Database\Database;

class Tickets{

    private $db;
    public function __construct(){

        $this->db = new Database();

    }



}