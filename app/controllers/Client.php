<?php

use Libraries\Controller\Controller;
use Libraries\Request\Request;
use Libraries\Validator\Validator;

class Client extends Controller
{
    private $req;
    private $validator;
    private $clientModel;

    public function __construct()
    {
        $this->req = new Request();
        $this->validator = new Validator($this->req);
        $this->clientModel = $this->model('Clients');
    }

    public function index()
    {
        $clients = $this->clientModel->getClientsData();
        $data['clients'] = $clients ? $clients : [];
        $this->view('clients/index', $data);
    }

    public function addClient()
    {
        $data['errors'] = [];
        $data['requests'] = [];

        if ($this->req->isPostMethod()) {
            $validate = $this->validator->Validate([
                'family_name' => ['required', 'minStr:3', 'maxStr:35'],
                'last_name' => ['required', 'minStr:3', 'maxStr:35'],
                'phone_number' => ['required', 'isNumber', 'minNumberLenth:9', 'maxNumberLenth:13'],
                'house_phone_number' => ['isNumber'],
                'city' => ['required', 'minStr:3', 'maxStr:45'],
                'agency_Id' => ['required', 'isNumber']
            ]);

            if ($validate->hasError()) {
                $data = [
                    'errors' => $validate->getErrors(),
                    'requests' => $this->req->getAttribute()
                ];
            } else {
                $clientData = [
                    'family_name' => $this->req->family_name,
                    'last_name' => $this->req->last_name,
                    'profile_image' => !isEmpty($this->req->profile_image['tmp_name']) ? $this->req->profile_image['tmp_name'] : '',
                    'phone_number' => $this->req->phone_number,
                    'house_phone_number' => !isEmpty($this->req->house_phone_number) ? $this->req->house_phone_number : '',
                    'city' => $this->req->city,
                    'agency_Id' => $this->req->agency_Id
                ];

                $result = $this->clientModel->clientInsert($clientData);

                if ($result) {
                    flash('ClientAdded', 'مشتری با موفقیت اضافه شد', 'alert alert-success');
                    redirect('clients/index');
                } else {
                    flash('ClientAddError', 'خطایی در اضافه کردن مشتری رخ داد', 'alert alert-danger');
                }
            }
        }

        if (isset($data)) {
            $this->view('clients/add', $data);
        } else {
            $this->view('clients/add');
        }
    }

    public function editClient($id)
    {
        $data['errors'] = [];
        $data['requests'] = [];

        if ($this->req->isPostMethod()) {
            $validate = $this->validator->Validate([
                'family_name' => ['required', 'minStr:3', 'maxStr:35'],
                'last_name' => ['required', 'minStr:3', 'maxStr:35'],
                'phone_number' => ['required', 'isNumber', 'minNumberLenth:9', 'maxNumberLenth:13'],
                'house_phone_number' => ['isNumber'],
                'city' => ['required', 'minStr:3', 'maxStr:45'],
                'agency_Id' => ['required', 'isNumber'],
                'status' => ['required', 'isNumber']
            ]);

            if ($validate->hasError()) {
                $data = [
                    'errors' => $validate->getErrors(),
                    'requests' => $this->req->getAttribute()
                ];
            } else {
                $clientData = [
                    'family_name' => $this->req->family_name,
                    'last_name' => $this->req->last_name,
                    'profile_image' => !isEmpty($this->req->profile_image['tmp_name']) ? $this->req->profile_image['tmp_name'] : '',
                    'phone_number' => $this->req->phone_number,
                    'house_phone_number' => !isEmpty($this->req->house_phone_number) ? $this->req->house_phone_number : '',
                    'city' => $this->req->city,
                    'agency_Id' => $this->req->agency_Id,
                    'status' => $this->req->status,
                    'updated_at' => date('Y-m-d H:i:s')
                ];

                $result = $this->clientModel->editClientDataById($id, $clientData);

                if ($result) {
                    flash('ClientUpdated', 'اطلاعات مشتری با موفقیت ویرایش شد', 'alert alert-success');
                    redirect('clients/index');
                } else {
                    flash('ClientUpdateError', 'خطایی در ویرایش اطلاعات مشتری رخ داد', 'alert alert-danger');
                }
            }
        }

        $client = $this->clientModel->getClientDataById($id);

        if ($client) {
            $data['client'] = $client;
            $this->view('clients/edit', $data);
        } else {
            flash('ClientNotFound', 'مشتری مورد نظر پیدا نشد', 'alert alert-danger');
            redirect('clients/index');
        }
    }

    public function deleteClient($id)
    {
        if ($this->clientModel->clientDeleteById($id)) {
            flash('ClientDeleted', 'مشتری با موفقیت حذف شد', 'alert alert-success');
        } else {
            flash('ClientDeleteError', 'خطایی در حذف مشتری رخ داد', 'alert alert-danger');
        }
        redirect('clients/index');
    }


}
