<?php

use Libraries\Controller\Controller;
use Libraries\Request\Request;
use Libraries\Validator\Validator;
use Libraries\Auth\Auth;

class Rental extends Controller
{
    private $rentalsModel;
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
        $this->rentalsModel = $this->model('Rentals');
        $this->estateModel = $this->model('Estate');
        $this->logModel = $this->model('Log');
        $this->notificationModel = $this->model('Notifictions');
        $this->userModel = $this->model('Users');
        $this->consultantId = $this->rentalsModel->getConsultantId(Auth::getIdUser());
        $notif = $this->notificationModel->getNotification($this->consultantId);
    
    }


    public function index()
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
        $page = !isEmpty($this->req->page) ? (int)$this->req->page : 1;
        $perPage = 10;

        $data['rentals'] = $this->rentalsModel->getRentalsAllData($this->consultantId, $page, $perPage);
        $data['notif'] = $this->notif;
    
        $this->view('pages/rentals/tables_rentals', $data);
    }
    

    public function expiringIn1Month()
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
        $page = !isEmpty($this->req->page) ? (int)$this->req->page : 1;
        $perPage = 10;
   
        $data['rentals'] = $this->rentalsModel->getRentalsByDateRange($this->consultantId,0, 30, $page, $perPage);
  
        $data['notif'] = $this->notif;
        $this->view('pages/rentals/tables_rentals', $data);
    }
    
    public function konutShow()
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
        $page = !isEmpty($this->req->page) ? (int)$this->req->page : 1;
       $perPage = 10;

        $data['rentals'] = $this->rentalsModel->getRentalsDataByConsultantId($this->consultantId, 'KONUT', $page, $perPage);

        $data['notif'] = $this->notif;
      
        $this->view('pages/rentals/kiralik_konut_table', $data);
    }

    public function ofisShow()
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
        $page = !isEmpty($this->req->page) ? (int)$this->req->page : 1;
        $perPage = 10;

        $data['rentals'] = $this->rentalsModel->getRentalsDataByConsultantId($this->consultantId, 'OFIS', $page, $perPage);
        $data['notif'] = $this->notif;

        $this->view('pages/rentals/kiralik_ofis_table', $data);
    }

    public function villaShow()
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
        $page = !isEmpty($this->req->page) ? (int)$this->req->page : 1;
        $perPage = 10;
        $data['notif'] = $this->notif;
        $data['rentals'] = $this->rentalsModel->getRentalsDataByConsultantId($this->consultantId, 'VILLA', $page, $perPage);

        $this->view('pages/rentals/kiralik_villa_table', $data);
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
        $page = !isEmpty($this->req->page) ? (int)$this->req->page : 1;
        $perPage = 10;
        $data['notif'] = $this->notif;
        $data['rentals'] = $this->rentalsModel->getRentalsDataByConsultantId($this->consultantId, 'SANAYI_ISYERI', $page, $perPage);

        $this->view('pages/rentals/kiralik_sanayiIsyeri_table', $data);
        
    }


    public function addRental($id) {

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
        $data['id'] = $id;
        $data['notif'] = $this->notif;
        if ($this->req->isPostMethod()) {
            
            $validate = $this->validator->Validate([
                'first_name' => ['required' , 'minStr:3' , 'maxStr:45'],
                'last_name' => ['required'  , 'minStr:3' , 'maxStr:45'],
                'block' => ['required'],
                'phone' => ['required' , 'minStr:3' , 'maxStr:45'],
                'address' => ['required' , 'minStr:5' , 'maxStr:255'],
                'start_date' => ['required','minStr:3' , 'maxStr:45'],
                'end_date' => ['required', 'minStr:3' , 'maxStr:45'],
                'price' => ['required'],
                'description' => ['required' , 'minStr:5' , 'maxStr:255']
            ]);

            if ($validate->hasError()) {
                $data['errors'] = $validate->getErrors();
                $data['requests'] = $this->req->getAttribute();
            } else {
               
                $rentalData = [
                    'family_name' => $this->req->last_name,
                    'last_name' => $this->req->first_name,
                    'block' => $this->req->block,
                    'phone' => $this->req->phone,
                    'address' => $this->req->address,
                    'start_date' => $this->req->start_date,
                    'end_date' => $this->req->end_date,
                    'price' => $this->req->price,
                    'description' => $this->req->description,
                    'consultant_id' => $this->consultantId,
                    'estate_id' => $id
                ];


              $result = $this->rentalsModel->rentalInsert($rentalData);
               
                if ($result) {
                    flash('RentalAdded', 'Kiralama başarıyla eklendi', 'alert alert-success');
                    redirect('rental/addRental/' . $id);
                } else {
                    flash('RentalAdded', 'Kira eklenirken bir hata oluştu', 'alert alert-danger');
                }
            }
        }


        $this->view('pages/rentals/forms_eklemek', $data);
    }
    
    public function deleteRentalById($id){
        
        
              if (!Auth::isAuthenticated()) {
            if(Auth::isAuthenticatedCookie()){
                $data = $this->userModel->getUserDataById(Auth::getDataCookie()[0]);
                Auth::loginUser(get_object_vars($data));
                redirect('');
            } else {
                redirect('user/login');
            }
        }
        
        if($this->rentalsModel->deleteRentalById($id)){
            flash('deletedEstate' , 'Mülkiyet kaldırıldı');
            redirect('rental/index');
        }else{
            flash('deletedEstate' , 'Mülk silinmedi' , 'alert alert-danger');
            redirect('rental/index');
        }
        
    }
    
    
    public function deleteRental($id){
          if (!Auth::isAuthenticated()) {
            if(Auth::isAuthenticatedCookie()){
                $data = $this->userModel->getUserDataById(Auth::getDataCookie()[0]);
                Auth::loginUser(get_object_vars($data));
                redirect('');
            } else {
                redirect('user/login');
            }
        }
        if($this->estateModel->deleteEstate($id)){
            flash('deletedEstate' , 'Mülkiyet kaldırıldı');
            redirect('pages/index');
        }else{
            flash('deletedEstate' , 'Mülk silinmedi' , 'alert alert-danger');
            redirect('pages/index');
        }
        
        
    }
}