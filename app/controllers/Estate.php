<?php

use Libraries\Controller\Controller;
use Libraries\Request\Request;
use Libraries\Validator\Validator;
use Libraries\Auth\Auth;

class Estate extends Controller
{
    private $rentalsModel;
    private $userModel;
    private $notificationModel;
    private $estateModel;
    private $ReservModel;
    private $logModel;
    private $req;
    private $validator;
    private $consultantId;
    private $cities = [
        'Altinova' => 'Altinova',
        'Subasi' => 'Subasi',
        'CiftlikKoy' => 'CiftlikKoy',
        'Merkez' => 'Merkez',
        'Termal' => 'Termal',
        'Korukoy' => 'Korukoy',
        'Armutlu' => 'Armutlu',
        'Cinarcik' => 'Cinarcik',
        'Kocadere' => 'Kocadere'
    ];
    private $sleeps = [
        '1+0',
        '1+1',
        '2+1',
        '3+1',
        '4+1',
        '5+1'
    ];
    private $building_age = [
        '0',
        '1',
        '2',
        '3',
        '4',
        '5-10',
        '11-15',
        '16-20',
        '21-25',
        '26-30'
    ];
    private $contract_type = [
        'KIRALIK',
        'SATILIK'
    ];
    private $notif;
    public function __construct()
    {
        $this->req = new Request();
        $this->validator = new Validator($this->req);
        $this->estateModel = $this->model('Estate');
        $this->rentalsModel = $this->model('Rentals');
        $this->ReservModel = $this->model('Reservation');
        $this->userModel = $this->model('Users');
        $this->logModel = $this->model('Log');
        $this->notificationModel = $this->model('Notifictions');
        $this->consultantId = $this->rentalsModel->getConsultantId(get('user')['id']);
        $this->notif = $this->notificationModel->getNotification($this->consultantId);

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
        $estates = $this->estateModel->getEstatesProjectDataById($this->consultantId);
        $data['estates'] = $estates ? $estates : [];
        $data['notif'] = $this->notif;

        $this->view('pages/estates/add_malikler/view-sahib', $data);
    }

    public function addKonut(){

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
        $data['errors'] = [];
        $data['requests'] = [];
        $data['cities'] = $this->cities;
        $data['notif'] = $this->notif;


        if ($this->req->isPostMethod()) {
            $validate = $this->validator->Validate([
                'first_name' => ['required', 'minStr:3', 'maxStr:255'],
                'last_name' => ['required', 'minStr:3', 'maxStr:255'],
                'price' => ['required'],
                'address' => ['required', 'minStr:5', 'maxStr:255'],
                'city' => ['required'],
                'mobile_phone_number' => ['required', 'isNumber'],
                'floor_count' => ['required', 'isNumber'],
                'floor' => ['required', 'isNumber'],
                'building_age' => ['required'],
                'block' => ['required'],
                'unit' => ['required'],
                'sleeps' => ['required'],
                'contract_type' => ['required'],
                'gross_area' => ['required' , 'isNumber'],
                'net_area' => ['required' , 'isNumber'],
                'description' => ['required', 'minStr:5', 'maxStr:255'],
                'accept_rules' => ['required']
            ]);

            $cityResulte = checkList($this->cities, $this->req->city);
            $validate->setError('city', $cityResulte);


            $sleepsResulte = checkList($this->sleeps, $this->req->sleeps);
            $validate->setError('sleeps', $sleepsResulte);

            $buildingAgeResulte = checkList($this->building_age, $this->req->building_age);
            $validate->setError('building_age', $buildingAgeResulte);

            $typeResulte = checkList($this->contract_type, $this->req->contract_type);
            $validate->setError('contract_type', $typeResulte);


            if ($validate->hasError()) {
                
                    $data['errors'] = $validate->getErrors();
                    $data['requests'] = $this->req->getAttribute();
                
            } else {

                if($this->req->accept_rules === "on" && !isEmpty($this->req->contract_type)){
                    $estateData = [
                        'agency_id' => $this->consultantId,
                        'first_name' => $this->req->first_name,
                        'last_name' => $this->req->last_name,
                        'price' => $this->req->price,
                        'address' => $this->req->address,
                        'city' => $this->req->city,
                        'mobile_phone_number' => $this->req->mobile_phone_number,
                        'floor_count' => $this->req->floor_count,
                        'floor' => $this->req->floor,
                        'building_age' => $this->req->building_age,
                        'sleeps' => $this->req->sleeps,
                        'project_name' => $this->req->project_name,
                        'block' => $this->req->block,
                        'unit' => $this->req->unit,
                        'contract_type' => $this->req->contract_type,
                        'gross_area' => $this->req->gross_area,
                        'net_area' => $this->req->net_area,
                        'elevator' => !isEmpty($this->req->elevator) && ($this->req->elevator == "on")  ? 1 : NULL,
                        'parking' => !isEmpty($this->req->parking)  && ($this->req->parking == "on") ? 1: NULL,
                        'balcony' => !isEmpty($this->req->balcony)  && ($this->req->balcony == "on") ? 1 : NULL,
                        'within_site' => !isEmpty($this->req->within_site) && ($this->req->within_site == "on") ? 1 : NULL,
                        'furnished' => !isEmpty($this->req->furnished) && ($this->req->furnished == "on") ? 1 : NULL,
                        'description' => $this->req->description
                    ];
           

                    $result = $this->estateModel->estateInsert($estateData , 'KONUT');
                   
                    if ($result) {
                        flash('EstateAdded', ' Mülk başarıyla eklendi ', 'alert alert-success');
                        redirect('estate/addKonut');
                    } else {
                        flash('EstateAdded', 'Özellik eklenirken bir hata oluştu', 'alert alert-danger');
                    }
                }
            }
        }

        $this->view('pages/estates/add_estate/add_KONUT' , $data);

    } 

    public function addArazi(){

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
        $data['errors'] = [];
        $data['requests'] = [];
        $data['cities'] = $this->cities;
        $data['notif'] = $this->notif;


        if ($this->req->isPostMethod()) {
            $validate = $this->validator->Validate([
                'first_name' => ['required', 'minStr:3', 'maxStr:255'],
                'last_name' => ['required', 'minStr:3', 'maxStr:255'],
                'price' => ['required'],
                'address' => ['required', 'minStr:5', 'maxStr:255'],
                'city' => ['required'],
                'block' => ['required'],
                'mobile_phone_number' => ['required'],
                'gross_area' => ['required' , 'isNumber'],
                'net_area' => ['required' , 'isNumber'],
                'description' => ['required', 'minStr:5', 'maxStr:255'],
                'accept_rules' => ['required']
            ]);

            $cityResulte = checkList($this->cities, $this->req->city);
            $validate->setError('city', $cityResulte);

            if ($validate->hasError()) {
                
                    $data['errors'] = $validate->getErrors();
                    $data['requests'] = $this->req->getAttribute();
                
            } else {

                if($this->req->accept_rules === "on" && !isEmpty($this->req->contract_type)){
                    $estateData = [
                        'agency_id' => $this->consultantId,
                        'first_name' => $this->req->first_name,
                        'last_name' => $this->req->last_name,
                        'price' => $this->req->price,
                        'address' => $this->req->address,
                        'city' => $this->req->city,
                        'mobile_phone_number' => $this->req->mobile_phone_number,
                        'gross_area' => $this->req->gross_area,
                        'net_area' => $this->req->net_area,
                        'floor_count' => NULL,
                        'floor' => NULL,
                        'building_age' => NULL,
                        'sleeps' => NULL,
                        'block' => $this->req->block,
                        'project_name' => $this->req->project_name,
                        'contract_type' => 'SATILIK',
                        'elevator' => NULL,
                        'parking' => NULL,
                        'balcony' => NULL,
                        'within_site' => NULL,
                        'furnished' => NULL,
                        'description' => $this->req->description
                    ];
           
                    $result = $this->estateModel->estateInsert($estateData , 'ARAZI');
                   
                    if ($result) {
                        flash('EstateAdded', 'Mülk başarıyla eklendi', 'alert alert-success');
                        redirect('estate/addArazi');
                    } else {
                        flash('EstateAdded', 'Özellik eklenirken bir hata oluştu', 'alert alert-danger');
                        redirect('estate/addArazi');
                    }
                }
            }
        }

        $this->view('pages/estates/add_estate/add_ARAZI', $data);

    }

    
    public function addOfis(){


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
        $data['errors'] = [];
        $data['requests'] = [];
        $data['cities'] = $this->cities;
        $data['notif'] = $this->notif;


        if ($this->req->isPostMethod()) {
            $validate = $this->validator->Validate([
                'first_name' => ['required', 'minStr:3', 'maxStr:255'],
                'last_name' => ['required', 'minStr:3', 'maxStr:255'],
                'price' => ['required'],
                'address' => ['required', 'minStr:5', 'maxStr:255'],
                'city' => ['required'],
                'mobile_phone_number' => ['required'],
                'floor_count' => ['required', 'isNumber'],
                'floor' => ['required', 'isNumber'],
                'block' => ['required'],
                'unit' => ['required'],
                'building_age' => ['required'],
                'sleeps' => ['required'],
                'contract_type' => ['required'],
                'gross_area' => ['required' , 'isNumber'],
                'net_area' => ['required' , 'isNumber'],
                'description' => ['required', 'minStr:5', 'maxStr:255'],
                'accept_rules' => ['required']
            ]);

            $cityResulte = checkList($this->cities, $this->req->city);
            $validate->setError('city', $cityResulte);


            $sleepsResulte = checkList($this->sleeps, $this->req->sleeps);
            $validate->setError('sleeps', $sleepsResulte);

            $buildingAgeResulte = checkList($this->building_age, $this->req->building_age);
            $validate->setError('building_age', $buildingAgeResulte);

            $typeResulte = checkList($this->contract_type, $this->req->contract_type);
            $validate->setError('contract_type', $typeResulte);


            if ($validate->hasError()) {
                
                    $data['errors'] = $validate->getErrors();
                    $data['requests'] = $this->req->getAttribute();
                
            } else {
                
                if($this->req->accept_rules === "on" && !isEmpty($this->req->contract_type)){
                    $estateData = [
                        'agency_id' => $this->consultantId,
                        'first_name' => $this->req->first_name,
                        'last_name' => $this->req->last_name,
                        'price' => $this->req->price,
                        'address' => $this->req->address,
                        'city' => $this->req->city,
                        'mobile_phone_number' => $this->req->mobile_phone_number,
                        'floor_count' => $this->req->floor_count,
                        'floor' => $this->req->floor,
                        'building_age' => $this->req->building_age,
                        'sleeps' => $this->req->sleeps,
                        'block' => $this->req->block,
                        'unit' => $this->req->unit,
                        'project_name' => $this->req->project_name,
                        'contract_type' => $this->req->contract_type,
                        'gross_area' => $this->req->gross_area,
                        'net_area' => $this->req->net_area,
                        'elevator' => !isEmpty($this->req->elevator) && ($this->req->elevator == "on")  ? 1 : NULL,
                        'parking' => !isEmpty($this->req->parking)  && ($this->req->parking == "on") ? 1: NULL,
                        'balcony' => !isEmpty($this->req->balcony)  && ($this->req->balcony == "on") ? 1 : NULL,
                        'within_site' => !isEmpty($this->req->within_site) && ($this->req->within_site == "on") ? 1 : NULL,
                        'furnished' => !isEmpty($this->req->furnished) && ($this->req->furnished == "on") ? 1 : NULL,
                      
                        'description' => $this->req->description
                    ];
           

                    $result = $this->estateModel->estateInsert($estateData , 'OFIS');
                   
                    if ($result) {
                        flash('EstateAdded', 'Mülk başarıyla eklendi', 'alert alert-success');
                        redirect('estate/addOfis');
                    } else {
                        flash('EstateAdded', 'Özellik eklenirken bir hata oluştu', 'alert alert-danger');
                    }
                }
            }
        }


        $this->view('pages/estates/add_estate/add_OFIS', $data);

    }

    public function addVilla(){   

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
        $data['errors'] = [];
        $data['requests'] = [];
        $data['cities'] = $this->cities;
        $data['notif'] = $this->notif;


        if ($this->req->isPostMethod()) {
            $validate = $this->validator->Validate([
                'first_name' => ['required', 'minStr:3', 'maxStr:255'],
                'last_name' => ['required', 'minStr:3', 'maxStr:255'],
                'price' => ['required'],
                'address' => ['required', 'minStr:5', 'maxStr:255'],
                'city' => ['required'],
                'mobile_phone_number' => ['required'],
                'floor_count' => ['required', 'isNumber'],
                'floor' => ['required', 'isNumber'],
                'block' => ['required'],
                'unit' => ['required'],
                'building_age' => ['required'],
                'sleeps' => ['required'],
                'contract_type' => ['required'],
                'gross_area' => ['required' , 'isNumber'],
                'net_area' => ['required' , 'isNumber'],
                'description' => ['required', 'minStr:5', 'maxStr:255'],
                'accept_rules' => ['required']
            ]);

            $cityResulte = checkList($this->cities, $this->req->city);
            $validate->setError('city', $cityResulte);


            $sleepsResulte = checkList($this->sleeps, $this->req->sleeps);
            $validate->setError('sleeps', $sleepsResulte);

            $buildingAgeResulte = checkList($this->building_age, $this->req->building_age);
            $validate->setError('building_age', $buildingAgeResulte);

            $typeResulte = checkList($this->contract_type, $this->req->contract_type);
            $validate->setError('contract_type', $typeResulte);


            if ($validate->hasError()) {
                
                    $data['errors'] = $validate->getErrors();
                    $data['requests'] = $this->req->getAttribute();
                
            } else {

                if($this->req->accept_rules === "on" && !isEmpty($this->req->contract_type)){
                    $estateData = [
                        'agency_id' => $this->consultantId,
                        'first_name' => $this->req->first_name,
                        'last_name' => $this->req->last_name,
                        'price' => $this->req->price,
                        'address' => $this->req->address,
                        'city' => $this->req->city,
                        'mobile_phone_number' => $this->req->mobile_phone_number,
                        'floor_count' => $this->req->floor_count,
                        'floor' => $this->req->floor,
                        'building_age' => $this->req->building_age,
                        'sleeps' => $this->req->sleeps,
                        'project_name' => $this->req->project_name,
                        'block' => $this->req->block,
                        'unit' => $this->req->unit,
                        'contract_type' => $this->req->contract_type,
                        'gross_area' => $this->req->gross_area,
                        'net_area' => $this->req->net_area,
                        'elevator' => !isEmpty($this->req->elevator) && ($this->req->elevator == "on")  ? 1 : NULL,
                        'parking' => !isEmpty($this->req->parking)  && ($this->req->parking == "on") ? 1: NULL,
                        'balcony' => !isEmpty($this->req->balcony)  && ($this->req->balcony == "on") ? 1 : NULL,
                        'within_site' => !isEmpty($this->req->within_site) && ($this->req->within_site == "on") ? 1 : NULL,
                        'furnished' => !isEmpty($this->req->furnished) && ($this->req->furnished == "on") ? 1 : NULL,
                        'description' => $this->req->description
                    ];

                  
                    $result = $this->estateModel->estateInsert($estateData , 'VILLA');
                   
                    if ($result) {
                        flash('EstateAdded', 'Mülk başarıyla eklendi', 'alert alert-success');
                        redirect('estate/addVilla');
                    } else {
                        flash('EstateAdded', 'Özellik eklenirken bir hata oluştu', 'alert alert-danger');
                    }
                }
            }
        }

        $this->view('pages/estates/add_estate/add_VILLA', $data);

    }

    public function addSanayiIsyeri(){

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
        $data['errors'] = [];
        $data['requests'] = [];
        $data['cities'] = $this->cities;
        $data['notif'] = $this->notif;


        if ($this->req->isPostMethod()) {
            $validate = $this->validator->Validate([
                'first_name' => ['required', 'minStr:3', 'maxStr:255'],
                'last_name' => ['required', 'minStr:3', 'maxStr:255'],
                'price' => ['required'],
                'address' => ['required', 'minStr:5', 'maxStr:255'],
                'city' => ['required'],
                'mobile_phone_number' => ['required'],
                'floor_count' => ['required', 'isNumber'],
                'floor' => ['required', 'isNumber'],
                'building_age' => ['required'],
                'sleeps' => ['required'],
                'contract_type' => ['required'],
                'block' => ['required'],
                'unit' => ['required'],
                'gross_area' => ['required' , 'isNumber'],
                'net_area' => ['required' , 'isNumber'],
                'description' => ['required', 'minStr:5', 'maxStr:255'],
                'accept_rules' => ['required']
            ]);

            $cityResulte = checkList($this->cities, $this->req->city);
            $validate->setError('city', $cityResulte);

            $sleepsResulte = checkList($this->sleeps, $this->req->sleeps);
            $validate->setError('sleeps', $sleepsResulte);

            $buildingAgeResulte = checkList($this->building_age, $this->req->building_age);
            $validate->setError('building_age', $buildingAgeResulte);

            $typeResulte = checkList($this->contract_type, $this->req->contract_type);
            $validate->setError('contract_type', $typeResulte);


            if ($validate->hasError()) {
                
                    $data['errors'] = $validate->getErrors();
                    $data['requests'] = $this->req->getAttribute();
             
            } else {

                if($this->req->accept_rules === "on" && !isEmpty($this->req->contract_type)){
                    $estateData = [
                        'agency_id' => $this->consultantId,
                        'first_name' => $this->req->first_name,
                        'last_name' => $this->req->last_name,
                        'price' => $this->req->price,
                        'address' => $this->req->address,
                        'city' => $this->req->city,
                        'block' => $this->req->block,
                        'unit' => $this->req->unit,
                        'mobile_phone_number' => $this->req->mobile_phone_number,
                        'floor_count' => $this->req->floor_count,
                        'floor' => $this->req->floor,
                        'building_age' => $this->req->building_age,
                        'sleeps' => $this->req->sleeps,
                        'project_name' => $this->req->project_name,
                        'contract_type' => $this->req->contract_type,
                        'gross_area' => $this->req->gross_area,
                        'net_area' => $this->req->net_area,
                        'elevator' => !isEmpty($this->req->elevator) && ($this->req->elevator == "on")  ? 1 : NULL,
                        'parking' => !isEmpty($this->req->parking)  && ($this->req->parking == "on") ? 1: NULL,
                        'balcony' => !isEmpty($this->req->balcony)  && ($this->req->balcony == "on") ? 1 : NULL,
                        'within_site' => !isEmpty($this->req->within_site) && ($this->req->within_site == "on") ? 1 : NULL,
                        'furnished' => !isEmpty($this->req->furnished) && ($this->req->furnished == "on") ? 1 : NULL,
                        'description' => $this->req->description
                    ];
           

                    $result = $this->estateModel->estateInsert($estateData , 'SANAYI_ISYERI');
                   
                    if ($result) {
                        flash('EstateAdded', 'Mülk başarıyla eklendi', 'alert alert-success');
                        redirect('estate/addSanayiIsyeri');
                    } else {
                        flash('EstateAdded', 'Özellik eklenirken bir hata oluştu', 'alert alert-danger');
                    }
                }
            }
        }

        $this->view('pages/estates/add_estate/add_SANAYI-ISYERI', $data);

    }



    public function addAKASYA(){   

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
        $data['errors'] = [];
        $data['requests'] = [];
        $data['cities'] = $this->cities;
        $data['notif'] = $this->notif;


        if ($this->req->isPostMethod()) {
            $validate = $this->validator->Validate([
                'first_name' => ['required', 'minStr:3', 'maxStr:255'],
                'last_name' => ['required', 'minStr:3', 'maxStr:255'],
                'address' => ['required', 'minStr:5', 'maxStr:255'],
                'city' => ['required'],
                'price' => ['required'],
                'mobile_phone_number' => ['required'],
                'block' => ['required'],
                'unit' => ['required'],
                'floor' => ['required', 'isNumber'],
                'floor_count' => ['required', 'isNumber'],
                'building_age' => ['required'],
                'sleeps' => ['required'],
                'contract_type' => ['required'],
                'gross_area' => ['required' , 'isNumber'],
                'net_area' => ['required' , 'isNumber'],
                'description' => ['required', 'minStr:5', 'maxStr:255'],
                'accept_rules' => ['required']
            ]);

            $cityResulte = checkList($this->cities, $this->req->city);
            $validate->setError('city', $cityResulte);



            $sleepsResulte = checkList($this->sleeps, $this->req->sleeps);
            $validate->setError('sleeps', $sleepsResulte);

            $buildingAgeResulte = checkList($this->building_age, $this->req->building_age);
            $validate->setError('building_age', $buildingAgeResulte);

            $typeResulte = checkList($this->contract_type, $this->req->contract_type);
            $validate->setError('contract_type', $typeResulte);


            if ($validate->hasError()) {
                
                    $data['errors'] = $validate->getErrors();
                    $data['requests'] = $this->req->getAttribute();
                  
            } else {

                if($this->req->accept_rules === "on" && !isEmpty($this->req->contract_type)){
                    $estateData = [
                        'agency_id' => $this->consultantId,
                        'first_name' => $this->req->first_name,
                        'last_name' => $this->req->last_name,
                        'address' => $this->req->address,
                        'city' => $this->req->city,
                        'price' => $this->req->price,
                        'mobile_phone_number' => $this->req->mobile_phone_number,
                        'floor_count' => $this->req->floor_count,
                        'floor' => $this->req->floor,
                        'building_age' => $this->req->building_age,
                        'sleeps' => $this->req->sleeps,
                        'unit' => $this->req->unit,
                        'contract_type' => $this->req->contract_type,
                        'gross_area' => $this->req->gross_area,
                        'net_area' => $this->req->net_area,
                        'elevator' => !isEmpty($this->req->elevator) && ($this->req->elevator == "on")  ? 1 : NULL,
                        'parking' => !isEmpty($this->req->parking)  && ($this->req->parking == "on") ? 1: NULL,
                        'balcony' => !isEmpty($this->req->balcony)  && ($this->req->balcony == "on") ? 1 : NULL,
                        'within_site' => !isEmpty($this->req->within_site) && ($this->req->within_site == "on") ? 1 : NULL,
                        'furnished' => !isEmpty($this->req->furnished) && ($this->req->furnished == "on") ? 1 : NULL,
                        'project_name' => 'AKASYA',
                        'block' => $this->req->block,
                       'description' => $this->req->description
                    ];
           

                    $result = $this->estateModel->estateProjectInsert($estateData);
                   
                    if ($result) {
                        flash('EstateAdded', 'Mülk başarıyla eklendi', 'alert alert-success');
                        redirect('estate/addAKASYA');
                    } else {
                        flash('EstateAdded', 'Özellik eklenirken bir hata oluştu', 'alert alert-danger');
                    }
                }
            }
        }

        $this->view('pages/estates/add_malikler/add_sahib_AKASYA' , $data);
    }


    public function addBegonyaSuite(){

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
        $data['errors'] = [];
        $data['requests'] = [];
        $data['cities'] = $this->cities;
        $data['notif'] = $this->notif;


        if ($this->req->isPostMethod()) {
            $validate = $this->validator->Validate([
                'first_name' => ['required', 'minStr:3', 'maxStr:255'],
                'last_name' => ['required', 'minStr:3', 'maxStr:255'],
                'address' => ['required', 'minStr:5', 'maxStr:255'],
                'city' => ['required'],
                'mobile_phone_number' => ['required'],
                'block' => ['required'],
                'floor' => ['required', 'isNumber'],
                'floor_count' => ['required', 'isNumber'],
                'building_age' => ['required'],
                'sleeps' => ['required'],
                'unit' => ['required'],
                'contract_type' => ['required'],
                'gross_area' => ['required' , 'isNumber'],
                'net_area' => ['required' , 'isNumber'],
                'description' => ['required', 'minStr:5', 'maxStr:255'],
                'accept_rules' => ['required'],
                'price' => ['required']
            ]);

            $cityResulte = checkList($this->cities, $this->req->city);
            $validate->setError('city', $cityResulte);


            $sleepsResulte = checkList($this->sleeps, $this->req->sleeps);
            $validate->setError('sleeps', $sleepsResulte);

            $buildingAgeResulte = checkList($this->building_age, $this->req->building_age);
            $validate->setError('building_age', $buildingAgeResulte);

            $typeResulte = checkList($this->contract_type, $this->req->contract_type);
            $validate->setError('contract_type', $typeResulte);


            if ($validate->hasError()) {
                
                    $data['errors'] = $validate->getErrors();
                    $data['requests'] = $this->req->getAttribute();
                
            } else {

                if($this->req->accept_rules === "on" && !isEmpty($this->req->contract_type)){
                    $estateData = [
                        'agency_id' => $this->consultantId,
                        'first_name' => $this->req->first_name,
                        'last_name' => $this->req->last_name,
                        'address' => $this->req->address,
                        'city' => $this->req->city,
                        'mobile_phone_number' => $this->req->mobile_phone_number,
                        'price' => $this->req->price,
                        'floor_count' => $this->req->floor_count,
                        'floor' => $this->req->floor,
                        'building_age' => $this->req->building_age,
                        'sleeps' => $this->req->sleeps,
                        'contract_type' => $this->req->contract_type,
                        'gross_area' => $this->req->gross_area,
                        'net_area' => $this->req->net_area,
                        'project_name' => 'BEGONYA_SUITE',
                        'block' => $this->req->block,
                        'unit' => $this->req->unit,
                        'elevator' => !isEmpty($this->req->elevator) && ($this->req->elevator == "on")  ? 1 : NULL,
                        'parking' => !isEmpty($this->req->parking)  && ($this->req->parking == "on") ? 1: NULL,
                        'balcony' => !isEmpty($this->req->balcony)  && ($this->req->balcony == "on") ? 1 : NULL,
                        'within_site' => !isEmpty($this->req->within_site) && ($this->req->within_site == "on") ? 1 : NULL,
                        'furnished' => !isEmpty($this->req->furnished) && ($this->req->furnished == "on") ? 1 : NULL,
                        'description' => $this->req->description
                    ];
           

                    $result = $this->estateModel->estateProjectInsert($estateData);
                   
                    if ($result) {
                        flash('EstateAdded', 'Mülk başarıyla eklendi', 'alert alert-success');
                        redirect('estate/addBegonyaSuite');
                    } else {
                        flash('EstateAdded', 'Özellik eklenirken bir hata oluştu', 'alert alert-danger');
                    }
                }
            }
        }
        $this->view('pages/estates/add_malikler/add_sahib_BEGONYA_SUITE', $data);
    }

    public function addBesinciLevent(){

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
        $data['errors'] = [];
        $data['requests'] = [];
        $data['cities'] = $this->cities;
        $data['notif'] = $this->notif;


        if ($this->req->isPostMethod()) {
            $validate = $this->validator->Validate([
                'first_name' => ['required', 'minStr:3', 'maxStr:255'],
                'last_name' => ['required', 'minStr:3', 'maxStr:255'],
                'address' => ['required', 'minStr:5', 'maxStr:255'],
                'city' => ['required'],
                'price' => ['required'],
                'mobile_phone_number' => ['required'],
                'block' => ['required'],
                'unit' => ['required'],
                'floor' => ['required', 'isNumber'],
                'floor_count' => ['required', 'isNumber'],
                'building_age' => ['required'],
                'sleeps' => ['required'],
                'contract_type' => ['required'],
                'gross_area' => ['required' , 'isNumber'],
                'net_area' => ['required' , 'isNumber'],
                'description' => ['required', 'minStr:5', 'maxStr:255'],
            'accept_rules' => ['required']
            ]);

            $cityResulte = checkList($this->cities, $this->req->city);
            $validate->setError('city', $cityResulte);


            $sleepsResulte = checkList($this->sleeps, $this->req->sleeps);
            $validate->setError('sleeps', $sleepsResulte);

            $buildingAgeResulte = checkList($this->building_age, $this->req->building_age);
            $validate->setError('building_age', $buildingAgeResulte);

            $typeResulte = checkList($this->contract_type, $this->req->contract_type);
            $validate->setError('contract_type', $typeResulte);


            if ($validate->hasError()) {
                
                    $data['errors'] = $validate->getErrors();
                    $data['requests'] = $this->req->getAttribute();
            } else {

                if($this->req->accept_rules === "on" && !isEmpty($this->req->contract_type)){
                    $estateData = [
                        'agency_id' => $this->consultantId,
                        'first_name' => $this->req->first_name,
                        'last_name' => $this->req->last_name,
                        'address' => $this->req->address,
                        'city' => $this->req->city,
                        'price' => $this->req->price,
                        'mobile_phone_number' => $this->req->mobile_phone_number,
                        'floor_count' => $this->req->floor_count,
                        'floor' => $this->req->floor,
                        'building_age' => $this->req->building_age,
                        'sleeps' => $this->req->sleeps,
                        'contract_type' => $this->req->contract_type,
                        'gross_area' => $this->req->gross_area,
                        'net_area' => $this->req->net_area,
                        'project_name' => 'Besinci_Levent',
                        'block' => $this->req->block,
                        'unit' => $this->req->unit,
                        'elevator' => !isEmpty($this->req->elevator) && ($this->req->elevator == "on")  ? 1 : NULL,
                        'parking' => !isEmpty($this->req->parking)  && ($this->req->parking == "on") ? 1: NULL,
                        'balcony' => !isEmpty($this->req->balcony)  && ($this->req->balcony == "on") ? 1 : NULL,
                        'within_site' => !isEmpty($this->req->within_site) && ($this->req->within_site == "on") ? 1 : NULL,
                        'furnished' => !isEmpty($this->req->furnished) && ($this->req->furnished == "on") ? 1 : NULL,
                        'description' => $this->req->description
                    ];
           

                    $result = $this->estateModel->estateProjectInsert($estateData);
                   
                    if ($result) {
                        flash('EstateAdded', 'Mülk başarıyla eklendi', 'alert alert-success');
                        redirect('estate/addBesinciLevent');
                    } else {
                        flash('EstateAdded', 'Özellik eklenirken bir hata oluştu', 'alert alert-danger');
                    }
                }
            }
        }
        $this->view('pages/estates/add_malikler/add_sahib_BESINCI_LEVENT', $data);
    }

    public function addVadiistanbul(){
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
        $data['errors'] = [];
        $data['requests'] = [];
        $data['cities'] = $this->cities;
        $data['notif'] = $this->notif;


        if ($this->req->isPostMethod()) {
            $validate = $this->validator->Validate([
                'first_name' => ['required', 'minStr:3', 'maxStr:255'],
                'last_name' => ['required', 'minStr:3', 'maxStr:255'],
                'address' => ['required', 'minStr:5', 'maxStr:255'],
                'city' => ['required'],
                'price' => ['required'],
                'mobile_phone_number' => ['required'],
                'block' => ['required'],
                'unit' => ['required'],
                'floor' => ['required', 'isNumber'],
                'floor_count' => ['required', 'isNumber'],
                'building_age' => ['required'],
                'sleeps' => ['required'],
                'contract_type' => ['required'],
                'gross_area' => ['required' , 'isNumber'],
                'net_area' => ['required' , 'isNumber'],
                'description' => ['required', 'minStr:5', 'maxStr:255'],
                 'accept_rules' => ['required']
            ]);

            $cityResulte = checkList($this->cities, $this->req->city);
            $validate->setError('city', $cityResulte);


            $sleepsResulte = checkList($this->sleeps, $this->req->sleeps);
            $validate->setError('sleeps', $sleepsResulte);

            $buildingAgeResulte = checkList($this->building_age, $this->req->building_age);
            $validate->setError('building_age', $buildingAgeResulte);

            $typeResulte = checkList($this->contract_type, $this->req->contract_type);
            $validate->setError('contract_type', $typeResulte);


            if ($validate->hasError()) {
                
                    $data['errors'] = $validate->getErrors();
                    $data['requests'] = $this->req->getAttribute();
                
            } else {

                if($this->req->accept_rules === "on" && !isEmpty($this->req->contract_type)){
                    $estateData = [
                        'agency_id' => $this->consultantId,
                        'first_name' => $this->req->first_name,
                        'last_name' => $this->req->last_name,
                        'address' => $this->req->address,
                        'city' => $this->req->city,
                        'price' => $this->req->price,
                        'mobile_phone_number' => $this->req->mobile_phone_number,
                        'floor_count' => $this->req->floor_count,
                        'floor' => $this->req->floor,
                        'building_age' => $this->req->building_age,
                        'sleeps' => $this->req->sleeps,
                        'contract_type' => $this->req->contract_type,
                        'gross_area' => $this->req->gross_area,
                        'net_area' => $this->req->net_area,
                        'project_name' => 'VADIISTANBUL',
                        'block' => $this->req->block,
                        'unit' => $this->req->unit,
                        'elevator' => !isEmpty($this->req->elevator) && ($this->req->elevator == "on")  ? 1 : NULL,
                        'parking' => !isEmpty($this->req->parking)  && ($this->req->parking == "on") ? 1: NULL,
                        'balcony' => !isEmpty($this->req->balcony)  && ($this->req->balcony == "on") ? 1 : NULL,
                        'within_site' => !isEmpty($this->req->within_site) && ($this->req->within_site == "on") ? 1 : NULL,
                        'furnished' => !isEmpty($this->req->furnished) && ($this->req->furnished == "on") ? 1 : NULL,
                        'description' => $this->req->description
                    ];
           

                    $result = $this->estateModel->estateProjectInsert($estateData);
                   
                    if ($result) {
                        flash('EstateAdded', 'Mülk başarıyla eklendi', 'alert alert-success');
                        redirect('estate/addVadiistanbul');
                    } else {
                        flash('EstateAdded', 'Özellik eklenirken bir hata oluştu', 'alert alert-danger');
                    }
                }
            }
        }
        $this->view('pages/estates/add_malikler/add_sahib_VADIISTANBUL', $data);
    }


    public function addKrystalsehir(){
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
        $data['errors'] = [];
        $data['requests'] = [];
        $data['cities'] = $this->cities;
        $data['notif'] = $this->notif;


        if ($this->req->isPostMethod()) {
            $validate = $this->validator->Validate([
                'first_name' => ['required', 'minStr:3', 'maxStr:255'],
                'last_name' => ['required', 'minStr:3', 'maxStr:255'],
                'address' => ['required', 'minStr:5', 'maxStr:255'],
                'city' => ['required'],
                'price' => ['required'],
                'mobile_phone_number' => ['required'],
                'block' => ['required'],
                'unit' => ['required'],
                'floor' => ['required', 'isNumber'],
                'floor_count' => ['required', 'isNumber'],
                'building_age' => ['required'],
                'sleeps' => ['required'],
                'contract_type' => ['required'],
                'gross_area' => ['required' , 'isNumber'],
                'net_area' => ['required' , 'isNumber'],
                'description' => ['required', 'minStr:5', 'maxStr:255'],
                'accept_rules' => ['required']
            ]);

            $cityResulte = checkList($this->cities, $this->req->city);
            $validate->setError('city', $cityResulte);


            $sleepsResulte = checkList($this->sleeps, $this->req->sleeps);
            $validate->setError('sleeps', $sleepsResulte);

            $buildingAgeResulte = checkList($this->building_age, $this->req->building_age);
            $validate->setError('building_age', $buildingAgeResulte);

            $typeResulte = checkList($this->contract_type, $this->req->contract_type);
            $validate->setError('contract_type', $typeResulte);


            if ($validate->hasError()) {
                
                    $data['errors'] = $validate->getErrors();
                    $data['requests'] = $this->req->getAttribute();
                
            } else {

                if($this->req->accept_rules === "on" && !isEmpty($this->req->contract_type)){
                    $estateData = [
                        'agency_id' => $this->consultantId,
                        'first_name' => $this->req->first_name,
                        'last_name' => $this->req->last_name,
                        'address' => $this->req->address,
                        'city' => $this->req->city,
                        'price' => $this->req->price,
                        'mobile_phone_number' => $this->req->mobile_phone_number,
                        'floor_count' => $this->req->floor_count,
                        'floor' => $this->req->floor,
                        'building_age' => $this->req->building_age,
                        'sleeps' => $this->req->sleeps,
                        'contract_type' => $this->req->contract_type,
                        'gross_area' => $this->req->gross_area,
                        'net_area' => $this->req->net_area,
                        'project_name' => 'Besinci_Levent',
                        'block' => $this->req->block,
                        'unit' => $this->req->unit,
                        'elevator' => !isEmpty($this->req->elevator) && ($this->req->elevator == "on")  ? 1 : NULL,
                        'parking' => !isEmpty($this->req->parking)  && ($this->req->parking == "on") ? 1: NULL,
                        'balcony' => !isEmpty($this->req->balcony)  && ($this->req->balcony == "on") ? 1 : NULL,
                        'within_site' => !isEmpty($this->req->within_site) && ($this->req->within_site == "on") ? 1 : NULL,
                        'furnished' => !isEmpty($this->req->furnished) && ($this->req->furnished == "on") ? 1 : NULL,
                        'description' => $this->req->description
                    ];
           

                    $result = $this->estateModel->estateProjectInsert($estateData);
                   
                    if ($result) {
                        flash('EstateAdded', 'Mülk başarıyla eklendi', 'alert alert-success');
                        redirect('estate/addKrystalsehir');
                    } else {
                        flash('EstateAdded', 'Özellik eklenirken bir hata oluştu', 'alert alert-danger');
                    }
                }
            }
        }
        $this->view('pages/estates/add_malikler/add_sahib_BESINCI_LEVENT', $data);
    }
    
    
    public function ekle(){
        
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
        $data['errors'] = [];
        $data['requests'] = [];
        $data['cities'] = $this->cities;
        $data['notif'] = $this->notif;


        if ($this->req->isPostMethod()) {
            $validate = $this->validator->Validate([
                'first_name' => ['required', 'minStr:3', 'maxStr:255'],
                'last_name' => ['required', 'minStr:3', 'maxStr:255'],
                'address' => ['required', 'minStr:5', 'maxStr:255'],
                'city' => ['required'],
                'price' => ['required'],
                'mobile_phone_number' => ['required'],
                'block' => ['required'],
                'unit' => ['required'],
                'floor' => ['required', 'isNumber'],
                'floor_count' => ['required', 'isNumber'],
                'building_age' => ['required'],
                'sleeps' => ['required'],
                'gross_area' => ['required' , 'isNumber'],
                'net_area' => ['required' , 'isNumber'],
                'project_name' => ['required'],
                'description' => ['required', 'minStr:5', 'maxStr:255'],
                'accept_rules' => ['required']
            ]);

            $cityResulte = checkList($this->cities, $this->req->city);
            $validate->setError('city', $cityResulte);



            $sleepsResulte = checkList($this->sleeps, $this->req->sleeps);
            $validate->setError('sleeps', $sleepsResulte);

            $buildingAgeResulte = checkList($this->building_age, $this->req->building_age);
            $validate->setError('building_age', $buildingAgeResulte);


            if ($validate->hasError()) {
                
                    $data['errors'] = $validate->getErrors();
                    $data['requests'] = $this->req->getAttribute();
                
            } else {

                if($this->req->accept_rules === "on" && !isEmpty($this->req->contract_type)){

                    $estateData = [
                        'agency_id' => $this->consultantId,
                        'first_name' => $this->req->first_name,
                        'last_name' => $this->req->last_name,
                        'address' => $this->req->address,
                        'city' => $this->req->city,
                        'price' => $this->req->price,
                        'mobile_phone_number' => $this->req->mobile_phone_number,
                        'floor_count' => $this->req->floor_count,
                        'floor' => $this->req->floor,
                        'unit' => $this->req->unit,
                        'building_age' => $this->req->building_age,
                        'sleeps' => $this->req->sleeps,
                        'contract_type' => $this->req->contract_type,
                        'gross_area' => $this->req->gross_area,
                        'net_area' => $this->req->net_area,
                        'elevator' => !isEmpty($this->req->elevator) && ($this->req->elevator == "on")  ? 1 : NULL,
                        'parking' => !isEmpty($this->req->parking)  && ($this->req->parking == "on") ? 1: NULL,
                        'balcony' => !isEmpty($this->req->balcony)  && ($this->req->balcony == "on") ? 1 : NULL,
                        'within_site' => !isEmpty($this->req->within_site) && ($this->req->within_site == "on") ? 1 : NULL,
                        'furnished' => !isEmpty($this->req->furnished) && ($this->req->furnished == "on") ? 1 : NULL,
                        'project_name' => $this->req->project_name,
                        'sold_out' => !isEmpty($this->req->soldـout) && ($this->req->soldـout == "on")  ? 1 : NULL,
                        'rented' => !isEmpty($this->req->rented) && ($this->req->rented == "on")  ? 1 : NULL,
                        'wrong_number' => !isEmpty($this->req->wrong_number) && ($this->req->wrong_number == "on")  ? 1 : NULL,
                        'did_not_answer' => !isEmpty($this->req->did_not_answer) && ($this->req->did_not_answer == "on")  ? 1 : NULL,
                        'does_not_sell' => !isEmpty($this->req->does_not_sell) && ($this->req->does_not_sell == "on")  ? 1 : NULL,
                        'not_available' => !isEmpty($this->req->not_available) && ($this->req->not_available == "on")  ? 1 : NULL,
                        'do_not_disturb' => !isEmpty($this->req->do_not_disturb) && ($this->req->do_not_disturb == "on")  ? 1 : NULL,
                        'sale' => !isEmpty($this->req->sale) && ($this->req->sale == "on")  ? 1 : NULL,
                        'not_sale' => !isEmpty($this->req->not_sale) && ($this->req->not_sale == "on")  ? 1 : NULL,
                        'rent' => !isEmpty($this->req->rent) && ($this->req->rent == "on")  ? 1 : NULL,
                        'not_rent' => !isEmpty($this->req->not_rent) && ($this->req->not_rent == "on")  ? 1 : NULL,
                        'opportunity' => !isEmpty($this->req->opportunity) && ($this->req->opportunity == "on")  ? 1 : NULL,
                        'block' => $this->req->block,
                        'description' => $this->req->description
                    ];
           

                    $result = $this->estateModel->estateEkleInsert($estateData);
                   
                    if ($result) {
                        flash('EstateAdded', 'Mülk başarıyla eklendi', 'alert alert-success');
                        redirect('estate/ekle');
                    } else {
                        flash('EstateAdded', 'Özellik eklenirken bir hata oluştu', 'alert alert-danger');
                    }
                }
            }
        }

        $this->view('pages/estates/add_malikler/add_sahib' , $data);
    }
    
    public function deleteMalikler($id){
        
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
            redirect('estate/index');
        }else{
            flash('deletedEstate' , 'Mülk silinmedi' , 'alert alert-danger');
            redirect('estate/index');
        }
        
    }


    
    public function readNotification($id){
        
                if (!Auth::isAuthenticated()) {
            
            if(Auth::isAuthenticatedCookie()){
                $data = $this->userModel->getUserDataById(Auth::getDataCookie()[0]);
                Auth::loginUser(get_object_vars($data));
                redirect('');
            }else{
                redirect('user/login');
            }

        }

        $this->notificationModel->readNotification($id);    
        redirect('pages/notifications');
    }
}
