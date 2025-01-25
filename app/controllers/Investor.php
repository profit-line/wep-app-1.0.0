<?php


use Libraries\Controller\Controller;
use Libraries\Request\Request;
use Libraries\Validator\Validator;
use Libraries\Auth\Auth;

class Investor extends Controller
{
    private $investorModel;
    private $userModel;
    private $notificationModel;
    private $req;
    private $logModel;
    private $validator;
    private $list_investment_type = [
        'SANAYI YATIRIMCISI',
        'ARAZI YATIRIMCISI',
        'KONUT YATIRIMCISI',
        'MUTAHIT'
    ];
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
    private $notif;
    private $consultantId;
    private $rentalsModel;
    public function __construct()
    {
        $this->req = new Request();
        $this->validator = new Validator($this->req);
        $this->investorModel = $this->model('Investor');
        $this->logModel = $this->model('Log');
        $this->userModel = $this->model('Users');
        $this->rentalsModel = $this->model('Rentals');
        $this->notificationModel = $this->model('Notifictions');
        $this->consultantId = $this->rentalsModel->getConsultantId(Auth::getIdUser());
        $this->notif = $this->notificationModel->getNotification($this->consultantId);

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
        $investors = $this->investorModel->getAllInvestors($this->consultantId); 

        $data['investors'] = $investors;
        $data['notif'] = $this->notif;
        $this->view('pages/investor/view_Investor' , $data);
    
    }

    public function addInvestor()
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
        $data['errors'] = [];
        $data['requests'] = [];
        $data['cities'] = $this->cities;
        $data['notif'] = $this->notif;
        if ($this->req->isPostMethod()) {
            $validate = $this->validator->Validate([
                'first_name' => ['required'],
                'last_name' => ['required'],
                'address_line1' => ['required'],
                'budget' => ['required' , 'isNumber'],
                'city' => ['required'],
                'phone_number' => ['required'],
                'investment_type' => ['required'],
                'description' => ['required'],
                'agreement' => ['required']
            ]);
            
            $cityResulte = checkList($this->cities, $this->req->city);
            $validate->setError('city', $cityResulte);

            $investment_type_Resulte = checkList($this->list_investment_type, $this->req->investment_type);
            $validate->setError('investment_type', $investment_type_Resulte);
          
            if ($validate->hasError()) {
                
                    $data['errors'] = $validate->getErrors();
                    $data['requests'] = $this->req->getAttribute();
                
            } else {
            
                $investorData = [
                    'first_name' => $this->req->first_name,
                    'last_name' => $this->req->last_name,
                    'address_line1' => $this->req->address_line1,
                    'city' => $this->req->city,
                    'phone_number' => $this->req->phone_number,
                    'investment_type' => $this->req->investment_type,
                    'description' => $this->req->description,
                    'agreement' => $this->req->agreement === 'on' ? 1 : 0,
                    'agency_id' => $this->consultantId,
                    'budget' => $this->req->budget
                ];

                $result = $this->investorModel->addInvestor($investorData);

                if ($result) {
                    flash('InvestorAdded', 'Yatırımcı başarıyla eklendi', 'alert alert-success');
                    redirect('investor/index');
                } else {
                    flash('InvestorAdded', 'Yatırımcı eklenirken bir hata oluştu', 'alert alert-danger');
                }
            }
        }

        $this->view('pages/investor/add_Investor', $data);
    }
    
    
    public function deleteInvestor($id){
        
           if (!Auth::isAuthenticated()) {
            if(Auth::isAuthenticatedCookie()){
                $data = $this->userModel->getUserDataById(Auth::getDataCookie()[0]);
                Auth::loginUser(get_object_vars($data));
                redirect('');
            } else {
                redirect('user/login');
            }
        }
        
        if($this->investorModel->deleteInvestor($id)){
            flash('deleteInvestor' , 'Yatırımcı kaldırıldı');
            redirect('investor/index');
        }else{
            flash('deleteInvestor' , 'Yatırımcı kaldırıldı' , 'alert alert-danger');
            redirect('investor/index');
        }
        
    }
    
}
