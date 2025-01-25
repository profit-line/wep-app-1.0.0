<?php

use Libraries\Controller\Controller;
use Libraries\Request\Request;
use Libraries\Validator\Validator;
use Libraries\Auth\Auth;

class Admin extends Controller
{

    private $userModel;
    private $messageModel;
    private $logModel;
    private $validate;
    private $req;
    public function __construct()
    {
        $this->userModel = $this->model('Users');
        $this->messageModel = $this->model('Messages');
        $this->logModel = $this->model('Log');
        $this->req = new Request();
        $this->validate = new Validator($this->req);
    }

    public function usersShow()
    {

        if (!Auth::isAuthenticated()) {

            if (Auth::isAuthenticatedCookie()) {
                $data = $this->userModel->getUserDataById(Auth::getDataCookie()[0]);
                Auth::loginUser(get_object_vars($data));
                redirect('user/login');
            }
        }
        Auth::isAuthenticatedAdmin();
        $this->logModel->updateLastActivity(Auth::getIdUser());
        $page = !isEmpty($this->req->page) ? (int)$this->req->page : 1;
        $perPage = 10;


        $data['users'] = $this->userModel->getUsersData();
        $data['errors'] = [];
        $data['requests'] = [];

        $this->view("users/add-or-remove", $data);
    }


    public function showTicket()
    {
        if (!Auth::isAuthenticated()) {

            if (Auth::isAuthenticatedCookie()) {
                $data = $this->userModel->getUserDataById(Auth::getDataCookie()[0]);
                Auth::loginUser(get_object_vars($data));
                redirect('user/login');
            }
        }
        Auth::isAuthenticatedAdmin();
        
        $this->logModel->updateLastActivity(Auth::getIdUser());
        $page = !isEmpty($this->req->page) ? (int)$this->req->page : 1;
        $perPage = 10;

        $totalMessages = $this->messageModel->totalMessages();
        $totalMessagesAdmin = $this->messageModel->totalMessagesAdmin();
        $data['totalMessageAdmin'] = $totalMessagesAdmin->total;
        $totalAdminResponses = $this->messageModel->totalAdminResponses();
        $data['totalAdminResponses'] = $totalAdminResponses;
        if ($totalMessages->total > 0) {
            $data['messages'] = $this->messageModel->getMessagesAll($page, $perPage);
        }
 
        $this->view('tickets/extra_app_ticket', $data);
    }
}
