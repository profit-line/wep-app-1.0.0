<?php

use Libraries\Controller\Controller;
use Libraries\Request\Request;
use Libraries\Validator\Validator;

    class Admin extends Controller{

        private $userModel;
        private $validate;
        private $req;
        public function __construct()
        {
            $this->userModel = $this->model('Users');
            $this->req = new Request();
            $this->validate = new Validator($this->req);
        }


        public function viewAllUsers(){
     
            if($this->req->isPostMethod()){
            $data = $this->userModel->getUsersData();
            }

            $this->view('' , $data);
        }
    }