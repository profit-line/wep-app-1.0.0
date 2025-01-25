<?php

use Libraries\Controller\Controller;
use Libraries\Request\Request;
use Libraries\Validator\Validator;
use Libraries\Auth\Auth;


    class Pages extends Controller{

        private $userModel;
        private $validate;
        private $estateModel;
        private $rentalsModel;
        private $salesModel;
        private $logModel;
        private $notificationModel;
        private $req;
        private $consultantId;
        private $ReservModel;
        public function __construct()
        {
            $this->userModel = $this->model('Users');
            $this->logModel = $this->model('Log');
            $this->estateModel = $this->model('Estate');
            $this->rentalsModel = $this->model('Rentals');
            $this->salesModel = $this->model('Sales');
            $this->notificationModel = $this->model('Notifictions');
            $this->req = new Request();
            $this->validate = new Validator($this->req);
            $this->consultantId = $this->rentalsModel->getConsultantId(get('user')['id']);
            $this->ReservModel = $this->model('Reservation');
            $this->sendNotification();
   
        }

        public function index(){

            if (!Auth::isAuthenticated()) {
            
                if(Auth::isAuthenticatedCookie()){
                    $data = $this->userModel->getUserDataById(Auth::getDataCookie()[0]);
                    Auth::loginUser(get_object_vars($data));
                    redirect('');
                }else{
                    redirect('user/login');
                }
    
            }
           
            $this->logModel->updateLastActivity(Auth::getIdUser());
        //    $data['users'] = $this->userModel->getUsersData();
           $data['isOnlineUsersCount'] = $this->userModel->isOnlineUsersCount()->total;
           $data['AllUsersCount'] = $this->userModel->AllUsersCount()->total;
            $data['AllEstatesCount'] = $this->estateModel->AllEstatesCountByUserId(Auth::getIdUser())->total;
            $data['rentalsCount'] = $this->rentalsModel->getTotalRentalsCount(Auth::getIdUser());
            $data['salesCount'] = $this->salesModel->AllSalesCount(Auth::getIdUser())->total;
            $data24Hours = $this->rentalsModel->getTotalRentalsCount(Auth::getIdUser(), null, -1, 0);
            $data30Days = $this->rentalsModel->getTotalRentalsCount(Auth::getIdUser(), null, -30, 0);
            $data1Year = $this->rentalsModel->getTotalRentalsCount(Auth::getIdUser(), null, -365, 0);
            $data['data24Hours'] = $data24Hours;
            $data['data30Days'] = $data30Days;
            $data['data1Year'] = $data1Year;
            
            $data['notif'] = $this->notificationModel->getNotification($this->consultantId);
            $this->view('pages/index-2' , $data);

        }



        public function notifications(){

            if (!Auth::isAuthenticated()) {
            
                if(Auth::isAuthenticatedCookie()){
                    $data = $this->userModel->getUserDataById(Auth::getDataCookie()[0]);
                    Auth::loginUser(get_object_vars($data));
                    redirect('');
                }else{
                    redirect('user/login');
                }

            }
            $data['notif'] = $this->notificationModel->getNotification($this->consultantId);

            $this->view('users/notifications' , $data);
        }
        

        public function eslestirmeler(){
            view('comming-soon/sample_coming_soon_1_dark');
        }

    public function sendNotification()
    {
        if (!Auth::isAuthenticated()) {
            
            if(Auth::isAuthenticatedCookie()){
                $data = $this->userModel->getUserDataById(Auth::getDataCookie()[0]);
                Auth::loginUser(get_object_vars($data));
                redirect('');
            }else{
                redirect('user/login');
            }

        }
        $currentDate = new DateTime();
        $currentDateStr = $currentDate->format('Y-m-d');

        $rentals = $this->rentalsModel->getRentalsByDateRange($this->consultantId , 1 , 2);    
        $reservs = $this->ReservModel->getExpiringReservation($this->consultantId);
        $rentals2 = $this->rentalsModel->getExpiringRentals($currentDateStr , $this->consultantId);
        $rentals2 = $this->rentalsModel->getExpiredRentals($rentals2 , $currentDateStr);
        $reservs2 = $this->ReservModel->getExpiring2Reservation($this->consultantId);


        if (is_array($rentals) && count($rentals) > 0) {
            foreach ($rentals as $rental) {
                if($rental->notification_time == NULL){
                    $notificationData = [
                    'user_id' => $this->consultantId, 
                    'message' => 'Bir müşterinin kiralama panelindeki süresi bitmek üzere. numara:' . $rental->phone_number . ' adı: ' . $rental->family_name,
                    'status' => 'warning'
                ];
                $this->notificationModel->createNotification($notificationData);
                $this->estateModel->addNotificationTimeByIdEstate($rental->id);
                }
            }
        }
            if(is_array($reservs) && count($reservs) > 0){
            foreach ($reservs as $reserv) {
if($reserv->notification_time == NULL){
                $notificationData = [
                    'user_id' => $this->consultantId, 
                    'message' => 'Hatırlatma olarak kaydettiğiniz bir müşterinin süresi bitmek üzere. numara:' . $reserv->phone . ' adı: ' . $reserv->first_name . ' ' . $reserv->last_name,
                    'status' => 'ban'
                ];
                $this->notificationModel->createNotification($notificationData);
                $this->ReservModel->addNotificationTimeByIdReserv($reserv->id);
}
            }
        }
        if(is_array($rentals2) && count($rentals2) > 0){
            foreach ($rentals2 as $rental) {
             if($rental->notification_time == NULL){
                $notificationData = [
                    'user_id' => $this->consultantId, 
                    'message' => 'Bir müşterinin kiralama panelindeki süresi bitti. numara:' . $rental->phone_number . ' adı: ' . $rental->family_name,
                    'status' => 'ban'
                ];
                $this->notificationModel->createNotification($notificationData);
                $this->estateModel->addNotificationTimeByIdEstate($rental->id);
             }
            }
        }
            if(is_array($reservs2) && count($reservs2) > 0){
            foreach ($reservs2 as $reserv) {
                     if($reserv->notification_time == NULL){
                $notificationData = [
                    'user_id' => $this->consultantId, 
                    'message' => 'Hatırlatma olarak kaydettiğiniz bir müşterinin süresi bitti. numara:' . $reserv->phone . ' adı: ' . $reserv->first_name . ' ' . $reserv->last_name,
                    'status' => 'warning'
                ];
                $this->notificationModel->createNotification($notificationData);
                $this->ReservModel->addNotificationTimeByIdReserv($reserv->id);
           }
            }
            }
    }

    }