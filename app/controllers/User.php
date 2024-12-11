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
    private $citiesTurkiye = [
        'Istanbul',
        'Ankara',
        'İzmir',
        'Bursa',
        'Antalya',
        'Konya',
        'Adana',
        'Şanlıurfa',
        'Gaziantep',
        'Kocaeli',
        'Mersin',
        'Diyarbakır',
        'Hatay',
        'Manisa',
        'Kayseri',
        'Samsun',
        'Balıkesir',
        'Tekirdağ',
        'Aydın',
        'Van'
    ];


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
                'user_name' => ['required', 'minStr:4', 'maxStr:45'],
                'family_name' => ['required', 'minStr:3', 'maxStr:35'],
                'last_name' => ['required', 'minStr:3', 'maxStr:35'],
                'mobile_phone_number' => ['isNumber', 'minNumberLenth:9', 'maxNumberLenth:13'],
                'house_phone_number' => ['isNumber'],
                'email' => ['email', 'required', 'minStr:10', 'maxStr:85'],
                'password' => ['required', 'minStr:8', 'maxStr:35', 'confirm'],
                'city' => ['required' , 'minStr:3' , 'maxStr:10'],
                'profile_image:name' => ['minStr:10', 'maxStr:65', 'FileSuffix:png'],
                'profile_image:size' => ['fileMinSize:0.5', 'fileMaxSize:10'],
                'csrf_token' => ['checkCsrfToken']
            ]);

            $cityResulte = checkList($this->citiesTurkiye , $this->req->city);
            $validate->setError('city' , $cityResulte);

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
                    'mobile_phone_number' => !isEmpty($this->req->mobile_phone_number) ? $this->req->mobile_phone_number : '',
                    'house_phone_number' => !isEmpty($this->req->house_phone_number) ? $this->req->house_phone_number : '',
                    'email' => $this->req->email,
                    'password' => $this->req->password,
                    'city' => $this->req->city,
                    'profile_image_path' => !isEmpty($this->req->profile_image['tmp_name']) ? $this->req->profile_image['tmp_name'] : '',
                    'profile_image_name' => !isEmpty($this->req->profile_image['name']) ? date('Ymdhis') . rand(10, 99) . "." . pathinfo($this->req->profile_image['name'] , PATHINFO_EXTENSION) : ''
                ];

        
                $resulte = $this->userModel->userInsert($userData);
                
                if (isset($resulte['status']) && $resulte['status'] == true) {
                    
                    if(!fileUpload($userData['profile_image_path'] , APPROOT . '/public/img/profiles/' . $userData['profile_image_name'])){
                        dd('sss' , 1);
                        flash('ErrorAddImageProfile', "  ", "alert alert-danger");
                    }
                
                    $urlEmail = url('users/varifyAccount', ['token' => $resulte['verify_token'], 'email' => $userData['email']]);
                    $resulteMail = sendMail([
                        'email' => 'to@receiver.com',
                        'name' => $userData['family_name'],
                        'subject' => 'Hesabı etkinleştir',
                        'body' => 'Bu e-posta kullanıcı hesabınızı aktive etmek içindir, aşağıdaki bağlantıya tıklayarak istediğiniz sayfaya gidin ve bu e-postanın gönderildikten sonra 5 dakika süreyle geçerli olduğundan emin olun. <br> <a href="' . $urlEmail . '"> Aktivasyon </a>',
                        'altBody' => 'This is the plain text message body'
                    ]);
                    
                    redirect('users/login');
                } elseif ($resulte == "exists") {
                    flash('ErrorRegisterInUser', " Bir sorun var veya bu e-postayla zaten bir kullanıcı oluşturuldu ", "alert alert-danger");
                } else {
                    flash('ErrorRegisterInUser', " Bir sorun var ", "alert alert-danger");
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
                'password' => ['required' , 'minStr:8' , 'maxStr:30'],
                'csrf_token' => ['checkCsrfToken']
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
                   
                    $loggedUser = $this->userModel->loginCheck($userData);

             
                        
                        if ($loggedUser) {

                           
                            if ($loggedUser['status'] === "1" && $loggedUser['is_active'] === "1") {
                               
                                $loggedUserData = $this->userModel->getUserDataById($loggedUser['id']);
                            
                                if($this->req->remember === 'ok'){
                                    $this->userModel->creatCookieToken($loggedUserData->id);
                                }

                                if (Auth::loginUser(get_object_vars($loggedUserData))) {
                                     redirect("");
                                } else {
                                    flash('ErrorLoggedInUser', "Bir hata oluştu (giriş başarısız oldu)", "alert alert-danger");
                                }
    
                            }else{
    
                                flash('ErrorLoggedInUser', " Hesabınız doğrulanmadı ", "alert alert-danger");
    
                            }
                            
                        } else {
                            flash('ErrorLoggedInUser', " Şifre yanlış " , "alert alert-danger");
                        }
                    

                } else {

                    flash('ErrorLoggedInUser', " Böyle bir kullanıcı yok ", "alert alert-danger");
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


