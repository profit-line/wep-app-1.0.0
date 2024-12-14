<?php

use Libraries\Controller\Controller;
use Libraries\Request\Request;
use Libraries\Validator\Validator;

class Estate extends Controller
{
    private $rentalsModel;
    private $notificationModel;
    private $estateModel;
    private $req;
    private $validator;

    public function __construct()
    {
        $this->req = new Request();
        $this->validator = new Validator($this->req);
        $this->estateModel = $this->model('Estate');
        $this->rentalsModel = $this->model('Rentals');
        $this->notificationModel = $this->model('Notifications');
    }

    public function addEstate()
    {
        $data['errors'] = [];
        $data['requests'] = [];

        if ($this->req->isPostMethod()) {
            $validate = $this->validator->Validate([
                'owner_id' => ['required', 'isNumber'],
                'agency_id' => ['required', 'isNumber'],
                'title' => ['required', 'minStr:3', 'maxStr:255'],
                'description' => ['required', 'minStr:3', 'maxStr:1000'],
                'address' => ['required', 'minStr:3', 'maxStr:255'],
                'location' => ['required', 'minStr:3', 'maxStr:255'],
                'type' => ['required', 'minStr:3', 'maxStr:255'],
                'unite' => ['required', 'minStr:1', 'maxStr:10']
            ]);

            if ($validate->hasError()) {
                $data = [
                    'errors' => $validate->getErrors(),
                    'requests' => $this->req->getAttribute()
                ];
            } else {
                $estateData = [
                    'owner_id' => $this->req->owner_id,
                    'agency_id' => $this->req->agency_id,
                    'title' => $this->req->title,
                    'description' => $this->req->description,
                    'address' => $this->req->address,
                    'location' => $this->req->location,
                    'type' => $this->req->type,
                    'unite' => $this->req->unite
                ];

                $result = $this->estateModel->estateInsert($estateData);

                if ($result) {
                    flash('EstateAdded', 'ملک با موفقیت اضافه شد', 'alert alert-success');
                    redirect('estates/index');
                } else {
                    flash('EstateAddError', 'خطایی در اضافه کردن ملک رخ داد', 'alert alert-danger');
                }
            }
        }

        if (isset($data)) {
            $this->view('estates/add', $data);
        } else {
            $this->view('estates/add');
        }
    }

    public function editEstate($id)
    {
        $data['errors'] = [];
        $data['requests'] = [];

        if ($this->req->isPostMethod()) {
            $validate = $this->validator->Validate([
                'owner_id' => ['required', 'isNumber'],
                'agency_id' => ['required', 'isNumber'],
                'title' => ['required', 'minStr:3', 'maxStr:255'],
                'description' => ['required', 'minStr:3', 'maxStr:1000'],
                'address' => ['required', 'minStr:3', 'maxStr:255'],
                'location' => ['required', 'minStr:3', 'maxStr:255'],
                'type' => ['required', 'minStr:3', 'maxStr:255'],
                'unite' => ['required', 'minStr:1', 'maxStr:10']
            ]);

            if ($validate->hasError()) {
                $data = [
                    'errors' => $validate->getErrors(),
                    'requests' => $this->req->getAttribute()
                ];
            } else {
                $estateData = [
                    'owner_id' => $this->req->owner_id,
                    'agency_id' => $this->req->agency_id,
                    'title' => $this->req->title,
                    'description' => $this->req->description,
                    'address' => $this->req->address,
                    'location' => $this->req->location,
                    'type' => $this->req->type,
                    'unite' => $this->req->unite,
                    'updated_at' => date('Y-m-d H:i:s') 
                ];

                $result = $this->estateModel->editEstateById($id, $estateData);

                if ($result) {
                    flash('EstateUpdated', 'اطلاعات ملک با موفقیت ویرایش شد', 'alert alert-success');
                    redirect('estates/index');
                } else {
                    flash('EstateUpdateError', 'خطایی در ویرایش اطلاعات ملک رخ داد', 'alert alert-danger');
                }
            }
        }

        $estate = $this->estateModel->findEstateById($id);

        if ($estate) {
            $data['estate'] = $estate;
            $this->view('estates/edit', $data);
        } else {
            flash('EstateNotFound', 'ملک مورد نظر پیدا نشد', 'alert alert-danger');
            redirect('estates/index');
        }
    }

    public function deleteEstate($id)
    {
        if ($this->estateModel->deleteEstateById($id)) {
            flash('EstateDeleted', 'ملک با موفقیت حذف شد', 'alert alert-success');
        } else {
            flash('EstateDeleteError', 'خطایی در حذف ملک رخ داد', 'alert alert-danger');
        }
        redirect('estates/index');
    }

    public function index()
    {
        $estates = $this->estateModel->getEstatesData();
        $data['estates'] = $estates ? $estates : [];
        $this->view('estates/index', $data);
    }

    public function sendNotification()
    {
        $currentDate = new DateTime();
        $currentDateStr = $currentDate->format('Y-m-d');

        $rentals = $this->rentalsModel->getExpiringRentals($currentDateStr);

        if ($rentals) {
            foreach ($rentals as $rental) {
                $notificationData = [
                    'user_id' => $rental->user_id, 
                    'message' => ''
                ];
                $this->notificationModel->createNotification($notificationData);
            }
        }
    }
}
