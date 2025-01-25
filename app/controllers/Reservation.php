<?php

use Libraries\Controller\Controller;
use Libraries\Request\Request;
use Libraries\Validator\Validator;
use Libraries\Auth\Auth;

class Reservation extends Controller
{

    private $userModel;
    private $ReservModel;
    private $logModel;
    private $validator;
    private $req;
    private $consultantId;
    private $notificationModel;
    private $notif;

    public function __construct()
    {
        $this->userModel = $this->model('Users');
        $this->ReservModel = $this->model('Reservation');
        $this->logModel = $this->model('Log');
        $this->req = new Request();
        $this->validator = new Validator($this->req);
        $this->consultantId = $this->ReservModel->getConsultantId(Auth::getIdUser());
        $this->notificationModel = $this->model('Notifictions');
        $this->notif = $this->notificationModel->getNotification($this->consultantId);

    }


    public function index(){


        $data['reservs']= $this->ReservModel->getReservation($this->consultantId);
        $data['notif'] = $this->notif;

        $this->view('pages/reservation/tables_reservation' , $data);

    }

 
    public function expiringIn3Day(){
        
        $data['reservs'] = $this->ReservModel->getExpiringReservation($this->consultantId);
        $data['notif'] = $this->notif;
     
        $this->view('pages/reservation/tables_reservation' , $data);

    }

    public function addReservation(){

        if (!Auth::isAuthenticated()) {
            if(Auth::isAuthenticatedCookie()){
                $data = $this->userModel->getUserDataById(Auth::getDataCookie()[0]);
                Auth::loginUser(get_object_vars($data));
                redirect('');
            } else {
                redirect('user/login');
            }
        }
        $this->logModel->updateLastActivity(Auth::getIdUser());


        $data = [
            'errors' => [], 
            'requests' => []
        ];
        $data['notif'] = $this->notif;


        if ($this->req->isPostMethod()) {
            
            $validate = $this->validator->Validate([
                'first_name' => ['required' , 'minStr:3' , 'maxStr:45'],
                'last_name' => ['required'  , 'minStr:3' , 'maxStr:45'],
                'phone' => ['required' , 'minStr:3' , 'maxStr:45'],
                'address' => ['required' , 'minStr:5' , 'maxStr:255'],
                'start_date' => ['required','minStr:3' , 'maxStr:45'],
                'end_date' => ['required', 'minStr:3' , 'maxStr:45'],
                'description' => ['required' , 'minStr:5' , 'maxStr:255']
            ]);

            if ($validate->hasError()) {
         
                    $data['errors'] = $validate->getErrors();
                    $data['requests'] = $this->req->getAttribute();
            } else {
               
                $datareserv = [
                    'first_name' => $this->req->first_name,
                    'last_name' => $this->req->last_name,
                    'phone' => $this->req->phone,
                    'address' => $this->req->address,
                    'project_name' => $this->req->project_name,
                    'start_date' => $this->req->start_date,
                    'end_date' => $this->req->end_date,
                    'description' => $this->req->description,
                    'agency_id' => $this->consultantId
                ];

                $result = $this->ReservModel->addReserv($datareserv);

                if ($result) {
                    flash('resevationAdded', 'Başarıyla kaydedildi', 'alert alert-success');
                    redirect('reservation/addReservation');
                } else {
                    flash('resevationAdded', 'Bir hata oluştu', 'alert alert-danger');
                }
            }
        }
        $this->view('pages/reservation/gorevler-eklemek' , $data);

    }
    
    public function deleteReserv($id){
        
         if (!Auth::isAuthenticated()) {
            if(Auth::isAuthenticatedCookie()){
                $data = $this->userModel->getUserDataById(Auth::getDataCookie()[0]);
                Auth::loginUser(get_object_vars($data));
                redirect('');
            } else {
                redirect('user/login');
            }
        }
        
        if($this->ReservModel->deleteReservById($id)){
            flash('deletedReserv' , 'Mülkiyet kaldırıldı');
            redirect('reservation/index');
        }else{
            flash('deletedReserv' , 'Mülk silinmedi' , 'alert alert-danger');
            redirect('reservation/index');
        }
        
        
    }

}
