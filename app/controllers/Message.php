<?php

use Libraries\Controller\Controller;
use Libraries\Request\Request;
use Libraries\Validator\Validator;
use Libraries\Auth\Auth;

class Message extends Controller
{
    private $messagesModel;
    private $RealEstateConsultantModel;
    private $userModel;
    private $logModel;
    private $req;
    private $validator;
    private $rentalsModel;
    private $consultantId;

    public function __construct()
    {
        $this->req = new Request();
        $this->validator = new Validator($this->req);
        $this->messagesModel = $this->model('Messages');
        $this->userModel = $this->model('Users');
        $this->logModel = $this->model('Log');
        $this->rentalsModel = $this->model('Rentals');
        $this->RealEstateConsultantModel = $this->model('RealEstateConsultant');
        $this->consultantId = $this->rentalsModel->getConsultantId(get('user')['id']);
       
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
        $data['users'] = $this->userModel->getActiveConsultantUsers();
        $data['users_chat'] = $this->messagesModel->usersChatById(Auth::getIdUser());
    //    $this->view('tickets/contact_app_chat' , $data);
       $this->view('tickets/chat' , $data);
      
    }

    public function getUsers(){
        $data['users'] = $this->userModel->getActiveConsultantUsers();

        echo json_encode($data['users']);
    }
 
    public function sendMessage()
    {
       
        $data['errors'] = [];
        $data['requests'] = [];

        if ($this->req->isPostMethod()) {
            $validate = $this->validator->Validate([
                'sender_id' => ['required', 'isNumber'],
                'receiver_id' => ['required', 'isNumber'],
                'message' => ['required', 'minStr:1', 'maxStr:1000']
            ]);

            if ($validate->hasError()) {
                $data = [
                    'errors' => $validate->getErrors(),
                    'requests' => $this->req->getAttribute()
                ];
            } else {
                $messageData = [
                    'sender_id' => $this->req->sender_id,
                    'receiver_id' => $this->req->receiver_id,
                    'message' => $this->req->message
                ];

                $result = $this->messagesModel->sendMessage($messageData);

                if ($result) {
                    echo json_encode(['status' => 'Message sent']);
                } else {
                    echo json_encode(['status' => 'Message Not Sent']);
                }
            }
        }

      
    }

    public function getMessages()
    {

        $userId = $this->req->userId;
        $otherUserId = $this->req->otherUserId;

        if (empty($userId) || empty($otherUserId)) {
            echo json_encode(['error' => 'Missing parameters']);
            exit;
        }

        $messages = $this->messagesModel->getMessagesById($userId, $otherUserId);

        $data['messages'] = $messages ? $messages : [];

        echo json_encode($data['messages']);
    }


}
