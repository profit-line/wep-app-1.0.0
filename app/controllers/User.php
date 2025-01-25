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
    private $RealEstateConsultantModel;
    private $logModel;
    private $rentalsModel;
    private $notificationModel;
    private $notif;
    private $consultantId;
    private $citiesTurkiye = [
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


    public function __construct()
    {
        $this->req = new Request();
        $this->validator = new Validator($this->req);
        $this->userModel = $this->model('Users');
        $this->logModel = $this->model('Log');
        $this->rentalsModel = $this->model('Rentals');
        $this->RealEstateConsultantModel = $this->model('RealEstateConsultant');
        $this->notificationModel = $this->model('Notifictions');
        $this->notif = $this->notificationModel->getNotification($this->consultantId);

    }


    public function register()
    {
        
        if (!Auth::isAuthenticated()) {

            if (Auth::isAuthenticatedCookie()) {
                $data = $this->userModel->getUserDataById(Auth::getDataCookie()[0]);
                Auth::loginUser(get_object_vars($data));
                redirect('');
            }
        }
    
        $data['citys'] = $this->citiesTurkiye;
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
                'city' => ['required', 'minStr:3', 'maxStr:10'],
                'profile_image:name' => ['required', 'minStr:1', 'maxStr:65'],
                'profile_image:size' => ['fileMinSize:0.5', 'fileMaxSize:1000'],
                'csrf_token' => ['checkCsrfToken']
            ]);


            $cityResulte = checkList($this->citiesTurkiye, $this->req->city);
            $validate->setError('city', $cityResulte);

            if ($validate->hasError()) {

                $data = [
                    'errors' => $validate->getErrors(),
                    'requests' => $this->req->getAttribute(),
                    'citys' => $this->citiesTurkiye
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
                    'profile_image_name' => !isEmpty($this->req->profile_image['name']) ? date('Ymdhis') . rand(10, 99) . "." . pathinfo($this->req->profile_image['name'], PATHINFO_EXTENSION) : '',
                    'ip_address' => $_SERVER['REMOTE_ADDR']
                ];


                $resulte = $this->userModel->userInsert($userData);

                if (isset($resulte['status']) && $resulte['status'] == true) {
                    
                    if (!fileUpload($userData['profile_image_path'], APPROOT . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR .  "ev-admin-dashboard-template.multipurposethemes.com" . DIRECTORY_SEPARATOR . "bs5" . DIRECTORY_SEPARATOR . "images" . DIRECTORY_SEPARATOR . "avatar" . DIRECTORY_SEPARATOR . $userData['profile_image_name'])) {

                        flash('ErrorAddImageProfile', "  ", "alert alert-danger");
                    }
                                    
                    $urlEmail = url('users/varifyAccount', ['token' => $resulte['verify_token'], 'email' => $userData['email']]);

                    // $resulteMail = sendMail([
                    //     'email' => 'to@receiver.com',
                    //     'name' => $userData['family_name'],
                    //     'subject' => 'Hesabı etkinleştir',
                    //     'body' => 'Bu e-posta kullanıcı hesabınızı aktive etmek içindir, aşağıdaki bağlantıya tıklayarak istediğiniz sayfaya gidin ve bu e-postanın gönderildikten sonra 5 dakika süreyle geçerli olduğundan emin olun. <br> <a href="' . $urlEmail . '"> Aktivasyon </a>',
                    //     'altBody' => 'This is the plain text message body'
                    // ]);
                    
                    $this->logModel->createLog([
                        'user_id' => Auth::getIdUser(),
                        'action' => 'true',
                        'description' => 'Creat User',
                        'ip_address' => $_SERVER['REMOTE_ADDR']
                    ]);
                    redirect('user/verifyAccount', ['token' => $resulte['verify_token'], 'email' => $userData['email']]);
                    // redirect('user/login');
                } elseif ($resulte == "exists") {
                    flash('ErrorRegisterInUser', " Bir sorun var veya bu e-postayla zaten bir kullanıcı oluşturuldu ", "alert alert-danger");
                } else {
                    flash('ErrorRegisterInUser', " Bir sorun var ", "alert alert-danger");
                }
            }
        }


        $this->view("users/auth_register", $data);
    }
    public function login()
    {

        if (!Auth::isAuthenticated()) {

            if (Auth::isAuthenticatedCookie()) {
                $data = $this->userModel->getUserDataById(get('user')['id']);
                Auth::loginUser(get_object_vars($data));
                redirect('');
            }
        }
  
        $data['errors'] = [];
        $data['requests'] = [];

        if ($this->req->isPostMethod()) {


            $validate = $this->validator->Validate([
                'user_name' => ['required', 'minStr:4', 'maxStr:45'],
                'password' => ['required', 'minStr:8', 'maxStr:30'],
                'csrf_token' => ['checkCsrfToken']
            ]);

            if ($validate->hasError()) {
                $data = [
                    'errors' => $validate->getErrors(),
                    'requests' => $this->req->getAttribute()
                ];
            } else {


                $userData = [
                    'user_name' => $this->req->user_name,
                    'password' => $this->req->password
                ];

                if ($this->userModel->findUserByUserName($userData['user_name'])) {

                    $loggedUser = $this->userModel->loginCheck($userData);

                    if ($loggedUser) {


                        if ($loggedUser['status'] == "2" || $loggedUser['status'] == "1" && $loggedUser['is_active'] === "1") {


                            if ($this->req->remember === 'ok') {
                                $this->userModel->creatCookieToken($loggedUser['id']);
                            }
                            $loggedUserData = $this->userModel->getUserDataById($loggedUser['id']);
                            
                            if (Auth::loginUser(get_object_vars($loggedUserData))) {
                                $this->logModel->createLog([
                                    'user_id' => Auth::getIdUser(),
                                    'action' => 'true',
                                    'description' => 'Login User',
                                    'ip_address' => $_SERVER['REMOTE_ADDR']
                                ]);
                                redirect("");
                            } else {
                                flash('ErrorLoggedInUser', "Bir hata oluştu (giriş başarısız oldu)", "alert alert-danger");
                            }
                        } else {

                            flash('ErrorLoggedInUser', " Hesabınız doğrulanmadı ", "alert alert-danger");
                        }
                    } else {
                        flash('ErrorLoggedInUser', " Şifre yanlış ", "alert alert-danger");
                    }
                } else {

                    flash('ErrorLoggedInUser', " Böyle bir kullanıcı yok ", "alert alert-danger");
                }
            }
        }


        $this->view("users/auth_login", $data);
    }

    public function editUser($id)
    {

        $this->logModel->updateLastActivity(Auth::getIdUser());
        $this->consultantId = $this->rentalsModel->getConsultantId(Auth::getIdUser());
       
        if (!Auth::isAuthenticated()) {
            if (Auth::isAuthenticatedCookie()) {
                
                $data = $this->userModel->getUserDataById(Auth::getDataCookie()[0]);
                Auth::loginUser(get_object_vars($data));
                redirect('');
            } else {
                redirect('user/login');
            }
        }

        $data['citys'] = $this->citiesTurkiye;
        $data['consultant'] = $this->RealEstateConsultantModel->findConsultantByUserName(get('user')['user_name']);
        $data['errors'] = [];
        $data['requests'] = [];


        if ($this->req->isPostMethod()) {
            $validate = $this->validator->Validate([
                'user_name' => ['required', 'minStr:4', 'maxStr:45'],
                'family_name' => ['required', 'minStr:3', 'maxStr:35'],
                'last_name' => ['required', 'minStr:3', 'maxStr:35'],
                'about_me' => ['required'],
                'mobile_phone_number' => ['isNumber', 'minNumberLenth:9', 'maxNumberLenth:13'],
                'house_phone_number' => ['isNumber'],
                'office_phone_number' => ['isNumber'],
                'address_agency' => ['required', 'minStr:8', 'maxStr:255'],
                'email' => ['email', 'required', 'minStr:10', 'maxStr:85'],
                'city' => ['required', 'minStr:3', 'maxStr:45'],
                'agency_image:name' => ['minStr:4', 'maxStr:65'],
                'agency_image:size' => ['fileMinSize:0.5', 'fileMaxSize:1000'],
                'csrf_token' => ['checkCsrfToken']
            ]);

            $cityResulte = checkList($this->citiesTurkiye, $this->req->city);
            $validate->setError('city', $cityResulte);

            if ($validate->hasError()) {
                $data['errors'] = $validate->getErrors();
                $data['requests'] = $this->req->getAttribute();
            } else {
                $userData = [
                    'user_name' => !isEmpty($this->req->user_name) ? $this->req->user_name : get('user')['user_name'],
                    'family_name' => !isEmpty($this->req->family_name) ? $this->req->family_name : get('user')['family_name'],
                    'last_name' => !isEmpty($this->req->last_name) ? $this->req->last_name : get('user')['last_name'],
                    'mobile_phone_number' => !isEmpty($this->req->mobile_phone_number) ? $this->req->mobile_phone_number : get('user')['mobile_phone_number'],
                    'house_phone_number' => !isEmpty($this->req->house_phone_number) ? $this->req->house_phone_number : get('user')['house_phone_number'],
                    'email' => !isEmpty($this->req->email) ? $this->req->email : get('user')['email'],
                    'city' => !isEmpty($this->req->city) ? $this->req->city : get('user')['city'],
                    'profile_image' => !isEmpty($this->req->profile_image['name']) ? date('Ymdhis') . rand(10, 99) . "." . pathinfo($this->req->profile_image['name'], PATHINFO_EXTENSION) : get('user')['profile_image'],
                    'status' => !isEmpty($data['consultant']->agency_image) ? 1 : 2,
                    'updated_at' => date('Y-m-d H:i:s')
                ];
                $image = [
                    'profile_image_path' => !isEmpty($this->req->profile_image['tmp_name']) ? $this->req->profile_image['tmp_name'] : '',
                    'profile_image_name' => $userData['profile_image']
                ];
                $result = $this->userModel->editUserDataById($id, $userData);
                
                $consultantData = [
                    'address' => !isEmpty($this->req->address_agency) ? $this->req->address_agency : '',
                    'office_phone_number' => !isEmpty($this->req->office_phone_number) ? $this->req->office_phone_number : '',
                    'about_me' => !isEmpty($this->req->about_me) ? $this->req->about_me : '',
                    'social_fb' => !isEmpty($this->req->social_fb) ? $this->req->social_fb : '',
                    'social_tw' => !isEmpty($this->req->social_tw) ? $this->req->social_tw : '',
                    'social_insta' => !isEmpty($this->req->social_insta) ? $this->req->social_insta : '',
                    'social_lin' => !isEmpty($this->req->social_lin) ? $this->req->social_lin : '',
                    'agency_image' => !isEmpty($this->req->agency_image['name']) ? date('Ymdhis') . rand(10, 99) . "." . pathinfo($this->req->agency_image['name'], PATHINFO_EXTENSION) : $data['consultant']->agency_image
                ];


                $resultConsultant = $this->userModel->editConsultantDataByUserId($data['consultant']->idC, $consultantData);
            
                $image1 = [
                    'agency_image_path' => !isEmpty($this->req->agency_image['tmp_name']) ? $this->req->agency_image['tmp_name'] : '',
                    'agency_image_name' =>  !isEmpty($consultantData['agency_image']) ? $consultantData['agency_image'] : $data['consultant']->agency_image,
                ];
                $image = array_merge($image, $image1);
         
                if ($result && $resultConsultant) {
                   if(!isEmpty($image['agency_image_path'])){
                    if (!fileUpload($image['agency_image_path'], APPROOT . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . "ev-admin-dashboard-template.multipurposethemes.com" . DIRECTORY_SEPARATOR . "bs5" .DIRECTORY_SEPARATOR . "images" . DIRECTORY_SEPARATOR . "agency" . DIRECTORY_SEPARATOR . $image['agency_image_name'])) {
                        flash('ErrorAddImageProfile', 'Kullanıcı bilgileri başarıyla düzenlendi', "alert alert-danger");
                    }
                }elseif(!isEmpty($image['profile_image_path'])){
                    if (!fileUpload($image['profile_image_path'], APPROOT . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR .  "ev-admin-dashboard-template.multipurposethemes.com" . DIRECTORY_SEPARATOR . "bs5" . DIRECTORY_SEPARATOR . "images" . DIRECTORY_SEPARATOR . "avatar" . DIRECTORY_SEPARATOR . $image['profile_image_name'])) {
                        flash('ErrorAddImageProfile', 'Kullanıcı bilgileri başarıyla düzenlendi', "alert alert-danger");
                    }
                }
                    flash('UserUpdated', 'Kullanıcı bilgileri başarıyla düzenlendi', 'alert alert-success');
                    $this->logModel->createLog([
                        'user_id' => Auth::getIdUser(),
                        'action' => 'true',
                        'description' => 'Update Data User',
                        'ip_address' => $_SERVER['REMOTE_ADDR']
                    ]);
                    if (Auth::isAuthenticatedCookie()) {
                        $data = $this->userModel->getUserDataById(Auth::getDataCookie()[0]);
                        Auth::loginUser(get_object_vars($data));
                        redirect('user/editUser/' . Auth::getIdUser());
                    } else {
                        redirect('user/login');
                    }
                } else {
                    flash('UserUpdated', "Kullanıcı bilgileri düzenlenirken bir hata oluştu", 'alert alert-danger');
                }
            }
        }

     
        if (Auth::getIdUser() == $id) {
            $this->view('users/extra_profile', $data);
        } else {
            flash('UserNotFound', 'İstenen kullanıcı bulunamadı', 'alert alert-danger');
            redirect('user/editUser/' . Auth::getIdUser());
        }
    }

    public function setting()
    {

        if (!Auth::isAuthenticated()) {

            if (Auth::isAuthenticatedCookie()) {
                $data = $this->userModel->getUserDataById(Auth::getDataCookie()[0]);
                Auth::loginUser(get_object_vars($data));
                redirect('');
            } else {
                redirect('user/login');
            }
        }
        $this->logModel->updateLastActivity(Auth::getIdUser());
        $this->consultantId = $this->rentalsModel->getConsultantId(Auth::getIdUser());

        $data = [];
        $data['logs'] =  $this->logModel->getLogsByUserId(Auth::getIdUser());
 

        $this->view('users/setting', $data);
    }

    public function deleteActivityLogSetting($id)
    {
        $this->logModel->updateLastActivity(Auth::getIdUser());
        if ($this->logModel->deleteLogById((int)$id)) {
            redirect('user/setting');
        }
        redirect('user/setting');
    }

    public function deleteUser($id)
    {

        $this->logModel->updateLastActivity(Auth::getIdUser());
        if (!Auth::isAuthenticated()) {

            if (Auth::isAuthenticatedCookie()) {
                $this->logModel->createLog([
                    'user_id' => Auth::getIdUser(),
                    'action' => 'true',
                    'description' => 'Delete User',
                    'ip_address' => $_SERVER['REMOTE_ADDR']
                ]);
                $data = $this->userModel->getUserDataById(Auth::getDataCookie()[0]);
                Auth::loginUser(get_object_vars($data));
                redirect('');
            } else {
                redirect('user/login');
            }
        }
        $this->consultantId = $this->rentalsModel->getConsultantId(Auth::getIdUser());

        $user = $this->userModel->getUserDataById($id);

        if ($user) {
            $result = $this->userModel->deleteUserById($id, $user->profile_image, $user->agency_image);

            if ($result) {
                flash('UserDeleted', 'Kullanıcı başarıyla silindi', 'alert alert-success');
            } else {
                flash('UserDelete', "Kullanıcı silinirken bir hata oluştu", 'alert alert-danger');
            }
        } else {
            flash('UserNotFound', 'İstenen kullanıcı bulunamadı', 'alert alert-danger');
        }

        redirect('user/index');
    }

    public function verifyAccount()
    {

        
        if ($this->req->isGetMethod()) {
            $user = $this->userModel->getUserDataByEmail($this->req->email);

            if ($user && $user->verify_token === $this->req->token && time() < $user->verify_token_expire) {
                $this->logModel->createLog([
                    'user_id' => $user->id,
                    'action' => 'true',
                    'description' => 'verify Account User',
                    'ip_address' => $_SERVER['REMOTE_ADDR']
                ]);
                $this->userModel->verifyUser($user->id, [
                    'verify_token' => null,
                    'verify_token_expire' => null,
                    'updated_at' => date('Y-m-d H:i:s'),
                    'status' => 3
                ]);
        
                redirect('user/login');
            }
            redirect('user/login');

        }
        redirect('user/login');

    }

    public function activeAccount($id)
    {

        if (!Auth::isAuthenticated()) {
            
            if(Auth::isAuthenticatedCookie()){
                $data = $this->userModel->getUserDataById(Auth::getDataCookie()[0]);
                Auth::loginUser(get_object_vars($data));
                redirect('user/login');
            }
            
        }
        Auth::isAuthenticatedAdmin();
            $user = $this->userModel->getUserDataByid($id);


            if ($user && $user->status ==  '3') {
                if($this->userModel->activeUserById($id)){
                    $this->RealEstateConsultantModel->insertConsultant($id);
                $this->logModel->createLog([
                    'user_id' => Auth::getIdUser(),
                    'action' => 'true',
                    'description' => 'active Account User ' . $id,
                    'ip_address' => $_SERVER['REMOTE_ADDR']
                ]);
                flash('userActiveAccount' , 'Başarıyla kaydedildi ' , 'alert alert-success');
                }
                
            }else{
                flash('userActiveAccount' , '  Bir hata oluştu ' , 'alert alert-danger');
                redirect('admin/usersShow');
            }

        redirect('admin/usersShow');
    }

    public function requestPasswordReset()
    {

        $data['errors'] = [];

        if ($this->req->isPostMethod()) {
            $validate = $this->validator->Validate([
                'email' => ['email', 'required']
            ]);

            if ($validate->hasError()) {
                $data = [
                    'errors' => $validate->getErrors(),
                    'requests' => $this->req->getAttribute()
                ];
            } else {
                $user = $this->userModel->getUserDataByEmail($this->req->email);
                if ($user) {
                    $data = [
                        'reset_token' => generateToken(),
                        'reset_token_expire' => time() + 3600,
                        'updated_at' => date('Y-m-d H:i:s')
                    ];
                    $this->userModel->setPasswordResetToken($user->id, $data);

                    $url = url('user/resetPassword', ['token' => $data['reset_token'], 'email' => $user->email]);
                    dd(sendMail([
                        'email' => $user->email,
                        'name' => $user->family_name,
                        'subject' => 'Password Reset Request',
                        'body' => 'Please click on the following link to reset your password: <a href="' . $url . '">Reset Password</a>',
                        'altBody' => 'Please visit the following URL to reset your password: ' . $url
                    ]) , 1);

                    flash('resetPass', 'Şifreniz başarıyla e-posta adresinize gönderildi', 'alert alert-success');
                    $this->logModel->createLog([
                        'user_id' => Auth::getIdUser(),
                        'action' => 'true',
                        'description' => 'Send Request Edit Password User',
                        'ip_address' => $_SERVER['REMOTE_ADDR']
                    ]);

                    redirect('user/requestPasswordReset');
                } else {
                    flash('resetPass', 'Bu kullanıcının e-posta adresi bulunamadı', 'alert alert-danger');
                    redirect('user/requestPasswordReset');
                }
            }
        }
        $this->view("users/auth_user_pass", $data);
    }


    public function resetPassword()
    {
        $this->logModel->updateLastActivity(Auth::getIdUser());
        $data['errors'] = [];
        $data['email'] = $this->req->email;
        $data['token'] = $this->req->token;

        if ($this->req->isPostMethod()) {
            $validate = $this->validator->Validate([
                'password' => ['required', 'minStr:8', 'maxStr:35', 'confirm'],
                'email' => ['required', 'minStr:5', 'maxStr:85', 'email'],
                'token' => ['required'],
                'csrf_token' => ['checkCsrfToken']
            ]);

            if ($validate->hasError()) {
                $data['errors'] = $validate->getErrors();
            } else {
                $email = $this->req->email;
                $token = $this->req->token;
                $user = $this->userModel->getUserDataByEmail($email);

                if ($user && $user->reset_token === $token && time() < $user->reset_token_expire) {
                    $new_password = password_hash($this->req->password, PASSWORD_DEFAULT);
                    $this->userModel->updatePassword($user->id, [
                        'password' => $new_password,
                        'reset_token' => null,
                        'reset_token_expire' => null,
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                    $this->logModel->createLog([
                        'user_id' => Auth::getIdUser(),
                        'action' => 'true',
                        'description' => 'Edit Password User',
                        'ip_address' => $_SERVER['REMOTE_ADDR']
                    ]);
                    flash('resetPass', "Şifre başarıyla değiştirildi", "alert alert-success");
                    redirect('user/login');
                } else {
                    flash('resetPass', "Şifre düzenleme bağlantısının süresi doldu", "alert alert-danger");
                }
            }
        }

        $this->view("users/auth_user_pass_reset", $data);
    }


    public function logout()
    {
        $id = Auth::getIdUser();
        if ($this->userModel->deleteCookieToken(Auth::getIdUser())) {
            if (!Auth::removeUserCookie()) {
                redirect("pages/index");
            }
        } else {
            redirect("pages/index");
        }
        if (Auth::logoutUser()) {
            $this->logModel->createLog([
                'user_id' => $id,
                'action' => 'true',
                'description' => 'Logout User',
                'ip_address' => $_SERVER['REMOTE_ADDR']
            ]);
            redirect("user/login");
        } else {
            redirect("pages/index");
        }
    }
}
