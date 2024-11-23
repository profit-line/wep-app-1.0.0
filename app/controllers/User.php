<?php

use Libraries\Controller\Controller;
use Libraries\Request\Request;
use Libraries\Validator\Validator;

class User extends Controller
{

    private $req;
    private $validator;
    private $userModel;

    public function __construct()
    {
        $this->req = new Request();
        $this->validator = new Validator($this->req);
        $this->userModel = $this->model('Users');
    }

    public function index()
    {

    }


    public function login(){

    }

    public function register(){
        header('Content-type: application/json');
        $data['errors'] = [];
        $data['requests'] = [];

        if($this->req->isPostMethod()){
          
            $validate = $this->validator->Validate([
                'user_name' => ['required' , 'minStr:4' , 'maxStr:25'],
                'family_name' => ['required' , 'minStr:3' , 'maxStr:25'],
                'last_name' => ['required' , 'minStr:3' , 'maxStr:25'],
                'profile_image:name' => ['required' , 'minStr:1' , 'maxStr:255' , 'FileSuffix:png'],
                'profile_image:size' => ['fileMinSize:0.5', 'fileMaxSize:9'],
                'phone_number' => ['isNumber' , 'required' , 'minNumberLenth:10' , 'maxNumberLenth:15'],
                'mobile_phone_number' => ['isNumber' , 'required' , 'minNumberLenth:10' , 'maxNumberLenth:15'],
                'house_phone_number' => ['isNumber' , 'minNumberLenth:10' , 'maxNumberLenth:15'],
                'email' => ['minStr:8' , 'maxStr:65'],
                'password' => ['required' , 'minStr:8' , 'maxStr:30' , 'confirm']
            ]);

            if($validate->hasError()){

                http_response_code(404);
                $server__response__error = array(
                    "code" =>http_response_code(404),
                    "status" =>false,
                    "message" =>"Invalid API parameters! ",
                    "errors" => $validate->getErrors(),
                    "requests" => $this->req->getAttribute()
                );
                echo json_encode($server__response__error);

            }else{

    $data_user = [
                    'user_name' => $this->req->user_name,
                    'family_name' => $this->req->family_name,
                    'last_name' => $this->req->last_name,
                    'phone_number' => $this->req->phone_number,
                    'mobile_phone_number' => $this->req->mobile_phone_number,
                    'house_phone_number' => $this->req->house_phone_number,
                    'password' => $this->req->password,
                    'email' => $this->req->email,
                    'profile' => isset($this->req->profile_image['name']) ? $this->req->profile['name'] : '',
                    'profile_path' => isset($this->req->profile_image['tmp_name']) ? $this->req->profile['tmp_name'] : ''
                ];

                move_uploaded_file($data_user['profile_path'], APPROOT . '/public/img/profiles/' . $data_user['profile']);
                $userInsert = $this->userModel->userInsert($data_user);

                if (isset($userInsert['status']) && $userInsert['status'] === true) {
                    $url = url('users/verifyAccount' , ['token' => $userInsert['verify_token'] , 'email' => $data_user['email']]);
                    sendMail(['email' => 'to@receiver.com',
                     'name' => $data_user['family_name'],
                      'subject' => 'Active User Account',
                       'body' => 'Link For Active Account => <br> <a href="' . $url . '">Active account</a>',
                        'altBody' => '']);
                    
                        $server__response__success = array(
                            "code"=>http_response_code(200),
                            "status"=>true,
                            "message"=>"Request Accepted"
                        );
                        echo json_encode($server__response__success);

                }elseif($this->userModel->userInsert($data_user) == "exists"){
                
                    $server__response__success = array(
                        "code"=>http_response_code(404),
                        "status"=> false,
                        "message"=>"User Exists"
                    );
                    echo json_encode($server__response__success);
                
                }else{
                
                    $server__response__success = array(
                        "code"=>http_response_code(404),
                        "status"=> false,
                        "message"=>"Error"
                    );
                    echo json_encode($server__response__success);
                
                }
        }

        } else {

            http_response_code(404);
            $server__response__error = array(
                "code"=>http_response_code(404),
                "status"=>false,
                "message"=>"Bad Request"
            );
            echo json_encode($server__response__error);
        }
    }
}
