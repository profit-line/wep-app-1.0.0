<?php

use Libraries\Controller\Controller;
use Libraries\Request\Request;
use Libraries\Validator\Validator;

class Estate extends Controller{

    private $rentalsModel;
    private $notificationModel;
    private $validate;
    private $req;
    public function __construct()
    {
        $this->rentalsModel = $this->model('Rentals');
        $this->notificationModel = $this->model('Notifictions');
        $this->req = new Request();
        $this->validate = new Validator($this->req);
    }


    public function sendNotifiction(){

    $currentDate = new DateTime();
    $currentDateStr = $currentDate->format('Y-m-d');
    
    $rentals = $this->rentalsModel->getExpiringRentals($currentDateStr);
    
    if ($rentals) {
        foreach ($rentals as $rental) {
  
            $notificationData = [
                'user_id' => $rental->user_id, 
                'message' => ''
            ];
            $this->notificationModel->createNotification($notificationData);
        }
    }
    
}
    
}