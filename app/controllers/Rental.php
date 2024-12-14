<?php

use Libraries\Controller\Controller;
use Libraries\Request\Request;
use Libraries\Validator\Validator;

class Rental extends Controller
{
    private $rentalsModel;
    private $req;
    private $validator;

    public function __construct()
    {
        $this->req = new Request();
        $this->validator = new Validator($this->req);
        $this->rentalsModel = $this->model('Rentals');
    }

    public function index()
    {
        $rentals = $this->rentalsModel->getRentalsData();
        $data['rentals'] = $rentals ? $rentals : [];
        $this->view('rentals/index', $data);
    }

    public function addRental()
    {
        $data['errors'] = [];
        $data['requests'] = [];

        if ($this->req->isPostMethod()) {
            $validate = $this->validator->Validate([
                'estate_id' => ['required', 'isNumber'],
                'buyer_id' => ['required', 'isNumber'],
                'rental_date_start' => ['required', 'date'],
                'rental_date_end' => ['required', 'date'],
                'before_price' => ['required', 'isNumber'],
                'rental_price' => ['required', 'isNumber']
            ]);

            if ($validate->hasError()) {
                $data = [
                    'errors' => $validate->getErrors(),
                    'requests' => $this->req->getAttribute()
                ];
            } else {
                $rentalData = [
                    'estate_id' => $this->req->estate_id,
                    'buyer_id' => $this->req->buyer_id,
                    'rental_date_start' => $this->req->rental_date_start,
                    'rental_date_end' => $this->req->rental_date_end,
                    'before_price' => $this->req->before_price,
                    'rental_price' => $this->req->rental_price
                ];

                $result = $this->rentalsModel->rentalInsert($rentalData);

                if ($result) {
                    flash('RentalAdded', 'اجاره با موفقیت اضافه شد', 'alert alert-success');
                    redirect('rentals/index');
                } else {
                    flash('RentalAddError', 'خطایی در اضافه کردن اجاره رخ داد', 'alert alert-danger');
                }
            }
        }

        if (isset($data)) {
            $this->view('rentals/add', $data);
        } else {
            $this->view('rentals/add');
        }
    }

    public function editRental($id)
    {
        $data['errors'] = [];
        $data['requests'] = [];

        if ($this->req->isPostMethod()) {
            $validate = $this->validator->Validate([
                'estate_id' => ['required', 'isNumber'],
                'buyer_id' => ['required', 'isNumber'],
                'rental_date_start' => ['required', 'date'],
                'rental_date_end' => ['required', 'date'],
                'before_price' => ['required', 'isNumber'],
                'rental_price' => ['required', 'isNumber']
            ]);

            if ($validate->hasError()) {
                $data = [
                    'errors' => $validate->getErrors(),
                    'requests' => $this->req->getAttribute()
                ];
            } else {
                $rentalData = [
                    'estate_id' => $this->req->estate_id,
                    'buyer_id' => $this->req->buyer_id,
                    'rental_date_start' => $this->req->rental_date_start,
                    'rental_date_end' => $this->req->rental_date_end,
                    'before_price' => $this->req->before_price,
                    'rental_price' => $this->req->rental_price,
                    'updated_at' => date('Y-m-d H:i:s') 
                ];

                $result = $this->rentalsModel->editRentalById($id, $rentalData);

                if ($result) {
                    flash('RentalUpdated', 'اطلاعات اجاره با موفقیت ویرایش شد', 'alert alert-success');
                    redirect('rentals/index');
                } else {
                    flash('RentalUpdateError', 'خطایی در ویرایش اطلاعات اجاره رخ داد', 'alert alert-danger');
                }
            }
        }

        $rental = $this->rentalsModel->findRentalById($id);

        if ($rental) {
            $data['rental'] = $rental;
            $this->view('rentals/edit', $data);
        } else {
            flash('RentalNotFound', 'اجاره مورد نظر پیدا نشد', 'alert alert-danger');
            redirect('rentals/index');
        }
    }

    public function deleteRental($id)
    {
        if ($this->rentalsModel->deleteRentalById($id)) {
            flash('RentalDeleted', 'اجاره با موفقیت حذف شد', 'alert alert-success');
        } else {
            flash('RentalDeleteError', 'خطایی در حذف اجاره رخ داد', 'alert alert-danger');
        }
        redirect('rentals/index');
    }


}
