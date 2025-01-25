<?php

use Libraries\Controller\Controller;
use Libraries\Auth\Auth;
use Libraries\Validator\Validator;
use Libraries\Request\Request;

class Calender extends Controller
{

    private $userModel;
    private $logModel;
    private $calendarModel;
    private $req;
    private $validator;

    public function __construct()
    {
        $this->userModel = $this->model('Users');
        $this->logModel = $this->model('Log');
        $this->calendarModel = $this->model('Calender');
        $this->req = new Request();
        $this->validator = new Validator($this->req);
    }
    public function index()
    {

        

        $this->view('pages/calender'); 
    }

    public function addCalender(){

        // if (!Auth::isAuthenticated()) {
            
        //     if(Auth::isAuthenticatedCookie()){
        //         $data = $this->userModel->getUserDataById(Auth::getDataCookie()[0]);
        //         Auth::loginUser(get_object_vars($data));
        //         redirect('');
        //     }else{
        //         redirect('user/login');
        //     }

        // }
   
        $this->logModel->updateLastActivity(Auth::getIdUser());

        $data['errors'] = [];
        $data['requests'] = [];
        if($this->req->isPostMethod()){
            
            $validate = $this->validator->Validate([
                'title' => ['required', 'minStr:3', 'maxStr:255'],
                'start_date' => ['required'],
                'end_date' => ['required'],
                'category' => ['required'],
            ]);
            
            if($validate->hasError()){
                $data['errors'] = $validate->getErrors();
                $data['requests'] = $this->req->getAttribute();
            }else{
                $data = [
                    'title' => $this->req->title,
                    'start_date' => $this->req->start_date,
                    'end_date' => $this->req->end_date,
                    'category' => $this->req->category,
                    'user_id' => Auth::getIdUser(),
                ];
                
                $res = $this->calendarModel->add($data);
                  
                if ($res) {
                    return json_encode(['success' => true]);
                } else {
                    return json_encode(['success' => false, 'message' => 'خطایی در ذخیره رویداد رخ داده است']);
                }
                
            }
        }
    }

}