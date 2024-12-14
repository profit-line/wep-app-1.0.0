<?php

use Libraries\Controller\Controller;
use Libraries\Request\Request;
use Libraries\Validator\Validator;

class Message extends Controller
{
    private $messagesModel;
    private $req;
    private $validator;

    public function __construct()
    {
        $this->req = new Request();
        $this->validator = new Validator($this->req);
        $this->messagesModel = $this->model('Messages');
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
                    flash('MessageSent', 'پیام با موفقیت ارسال شد', 'alert alert-success');
                } else {
                    flash('MessageSendError', 'خطایی در ارسال پیام رخ داد', 'alert alert-danger');
                }
            }
        }

        if (isset($data)) {
            $this->view('messages/send', $data);
        } else {
            $this->view('messages/send');
        }
    }

    public function getMessages($sender_id, $receiver_id)
    {
        $messages = $this->messagesModel->getMessages($sender_id, $receiver_id);
        $data['messages'] = $messages ? $messages : [];
        $this->view('messages/index', $data);
    }
}
