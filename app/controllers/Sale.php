<?php

use Libraries\Controller\Controller;
use Libraries\Request\Request;
use Libraries\Validator\Validator;
use Libraries\Auth\Auth;

class Sale extends Controller
{
    private $salesModel;
    private $userModel;
    private $req;
    private $logModel;
    private $validator;
    private $consultantId;
    private $notificationModel;
    private $notif;
    private $estateModel;

    public function __construct()
    {
        $this->req = new Request();
        $this->validator = new Validator($this->req);
        $this->salesModel = $this->model('Sales');
        $this->logModel = $this->model('Log');
        $this->userModel = $this->model('Users');
        $this->consultantId = $this->salesModel->getConsultantId(get('user')['id']);
        $this->notificationModel = $this->model('Notifictions');
        $this->notif = $this->notificationModel->getNotification($this->consultantId);
        $this->estateModel = $this->model('Estate');

    }
    

    public function konutShow(){

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
     

        $data['sales'] = $this->salesModel->getSalesDataByConsultantId($this->consultantId , 'KONUT');
        $data['notif'] = $this->notif;
     
        $this->view('pages/sales/konut_table', $data);
    }

    public function ofisShow(){

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
   
        $data['sales'] = $this->salesModel->getSalesDataByConsultantId($this->consultantId , 'OFIS');
        $data['notif'] = $this->notif;
     

        $this->view('pages/sales/ofis_table', $data);
    }

    public function villaShow(){
   
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
   

        $data['sales'] = $this->salesModel->getSalesDataByConsultantId($this->consultantId , 'VILLA');
        $data['notif'] = $this->notif;
     

        $this->view('pages/sales/villa_table', $data);
    }


    public function araziShow(){
        if (!Auth::isAuthenticated()) {
            
            if(Auth::isAuthenticatedCookie()){
                $data = $this->userModel->getUserDataById(Auth::getDataCookie()[0]);
                Auth::loginUser(get_object_vars($data));
                redirect('');
            }

        }
        $this->logModel->updateLastActivity(Auth::getIdUser());

        $data['sales'] = $this->salesModel->getSalesDataByConsultantId($this->consultantId , 'ARAZI');
        $data['notif'] = $this->notif;
     

        $this->view('pages/sales/arazi_table', $data);
    }
    
        public function sanayiIsyeriShow(){
        
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

        $data['sales'] = $this->salesModel->getSalesDataByConsultantId($this->consultantId , 'SANAYI_ISYERI');
        $data['notif'] = $this->notif;
     

        $this->view('pages/sales/sanayiIsyeri_table', $data);
    }



   
    public function deleteSale($id)
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
        $this->logModel->updateLastActivity(Auth::getIdUser());
           if($this->estateModel->deleteEstate($id)){
            flash('deletedEstate' , 'Mülkiyet kaldırıldı');
            redirect('pages/index');

        }else{
            flash('deletedEstate' , 'Mülk silinmedi' , 'alert alert-danger');
            redirect('pages/index');
        }
    }

}
