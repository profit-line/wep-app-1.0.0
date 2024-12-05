<?php

use Libraries\Controller\Controller;
use Libraries\Request\Request;
use Libraries\Validator\Validator;
use Libraries\Auth\Auth;


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


    public function register()
    {

        $data['errors'] = [];
        $data['requests'] = [];

        if ($this->req->isPostMethod()) {

            $validate = $this->validator->Validate([
                'user_name' => ['required', 'minStr:4', 'max:45'],
                'family_name' => ['required', 'minStr:3', 'maxStr:35'],
                'last_name' => ['required', 'minStr:3', 'maxStr:35'],
                'mobile_phone_number' => ['isNumber', 'minNumberLenth:9', 'maxNumberLenth:13'],
                'phone_number' => ['isNumber'],
                'house_phone_number' => ['isNumber'],
                'email' => ['email', 'required', 'minStr:10', 'maxStr:85'],
                'password' => ['required', 'minStr:8', 'maxStr:35', 'confirm'],
                'profile_image:name' => ['minStr:10', 'maxStr:65', 'FileSuffix:png'],
                'profile_image:size' => ['fileMinSize:0.5', 'fileMaxSize:10']
            ]);

            if ($validate->hasError()) {

                $data = [
                    'errors' => $validate->getErrors(),
                    'requests' => $this->req->getAttribute()
                ];
            } else {

                $userData = [
                    'user_name' => $this->req->user_name,
                    'family_name' => $this->req->family_name,
                    'last_name' => $this->req->last_name,
                    'mobile_phone_number' => $this->req->mobile_phone_number,
                    'phone_number' => $this->req->phone_number,
                    'house_phone_number' => $this->req->house_phone_number,
                    'email' => $this->req->email,
                    'password' => $this->req->password,
                    'profile_image_path' => isset($this->req->profile_image['tmp_name']) ? $this->req->profile_image['tmp_name'] : '',
                    'profile_image_name' => date('Ymd') . rand(10, 99)
                ];

                move_uploaded_file($data['profile_image_psth'], APPROOT . '/public/img/profiles/' . $data['profile_image_name']);
                $resulte = $this->userModel->userInsert($userData);
                if (isset($resulte['status']) && $resulte['status'] == true) {

                    $urlEmail = url('users/varifyAccount', ['token' => $resulte['verify_token'], 'email' => $userData['email']]);
                    sendMail([
                        'email' => 'to@receiver.com',
                        'name' => $userData['first_name'],
                        'subject' => 'فعال سازی حساب کاربری',
                        'body' => 'این ایمیل جهت فعال سازی حساب کاربری شماست لطفا بر روی لینک زیر کلیک کرده تا به صفحه مورد نظر منتقل شوید و دقت کنید که این ایمیل تا ۵ دقیقه بعد از ارسال اعتبار دارد  <br> <a href="' . $urlEmail . '">Active account</a>',
                        'altBody' => 'This is the plain text message body'
                    ]);
                    redirect('users/login');
                } elseif ($resulte == "exists") {
                    flash('ErrorRegisterInUser', " مشکلی پیش آمده یا کاربری از قبل با این ایمیل ایجاد شده است ", "alert alert-danger");
                } else {
                    flash('ErrorRegisterInUser', " مشکلی پیش آمده  است ", "alert alert-danger");
                }
            }
        }

        if (isset($data)){
            $this->view("users/register", $data);
        }else{
            $this->view("users/register");
        }
    
    }
    
    
    public function login() {

        $data['errors'] = [];
        $data['requests'] = [];
        if($this->req->isPostMethod()){

            $validate = $this->validator->Validate([
                'user_name' => ['required' , 'minStr:4' , 'maxStr:45'],
                'password' => ['required' , 'minStr:8' , 'maxStr:30']
            ]);

            if($validate->hasError()){
           
                $data = [
                    'errors' => $validate->getErrors(),
                    'requests' => $this->req->getAttribute()
                ];

            }else{


                $userData = [
                    'user_name' => $this->req->user_name,
                    'password' => $this->req->password
                ];

                if($this->userModel->findUserByUserName($userData['user_name'])){
                   
                    $loggedUser = $this->userModel->login($userData);
                    if($loggedUser){

                        if($this->req->remember === 'ok'){
                            $this->userModel->creatCookieToken($loggedUser->id);
                        }
                        $loggedUser = $this->userModel->getUserDataById($loggedUser->id);

                    }
                    if ($loggedUser) {
                        if ($loggedUser->is_active === "1") {

                            if (Auth::loginUser(get_object_vars($loggedUser))) {
                                 redirect("");
                            } else {
                                flash('ErrorLoggedInUser', "خطایی رخ داده است(ورود نا موفق)", "alert alert-danger");
                            }

                        }else{

                            flash('ErrorLoggedInUser', " حساب کاربری شما تایید نشده است ", "alert alert-danger");

                        }
                        
                    } else {
                        flash('ErrorLoggedInUser', "پسورد نادرست است", "alert alert-danger");
                    }
                } else {

                    flash('ErrorLoggedInUser', "همچین کاربری وجود ندارد", "alert alert-danger");
                }

                }

            }
            
            if (isset($data)){
            $this->view("users/login", $data);
            }else{
            $this->view("users/login");
            }

        }

    }


