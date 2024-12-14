<?php

use Libraries\Controller\Controller;
use Libraries\Request\Request;
use Libraries\Validator\Validator;

class Sale extends Controller
{
    private $salesModel;
    private $req;
    private $validator;

    public function __construct()
    {
        $this->req = new Request();
        $this->validator = new Validator($this->req);
        $this->salesModel = $this->model('Sales');
    }
    
    public function index()
    {
        $sales = $this->salesModel->getSalesData();
        $data['sales'] = $sales ? $sales : [];
        $this->view('sales/index', $data);
    }

    public function addSale()
    {
        $data['errors'] = [];
        $data['requests'] = [];

        if ($this->req->isPostMethod()) {
            $validate = $this->validator->Validate([
                'estate_id' => ['required', 'isNumber'],
                'buyer_id' => ['required', 'isNumber'],
                'sale_date' => ['required', 'date'],
                'price' => ['required', 'isNumber']
            ]);

            if ($validate->hasError()) {
                $data = [
                    'errors' => $validate->getErrors(),
                    'requests' => $this->req->getAttribute()
                ];
            } else {
                $saleData = [
                    'estate_id' => $this->req->estate_id,
                    'buyer_id' => $this->req->buyer_id,
                    'sale_date' => $this->req->sale_date,
                    'price' => $this->req->price
                ];

                $result = $this->salesModel->saleInsert($saleData);

                if ($result) {
                    flash('SaleAdded', 'فروش با موفقیت اضافه شد', 'alert alert-success');
                    redirect('sales/index');
                } else {
                    flash('SaleAddError', 'خطایی در اضافه کردن فروش رخ داد', 'alert alert-danger');
                }
            }
        }

        if (isset($data)) {
            $this->view('sales/add', $data);
        } else {
            $this->view('sales/add');
        }
    }

    public function editSale($id)
    {
        $data['errors'] = [];
        $data['requests'] = [];

        if ($this->req->isPostMethod()) {
            $validate = $this->validator->Validate([
                'estate_id' => ['required', 'isNumber'],
                'buyer_id' => ['required', 'isNumber'],
                'sale_date' => ['required', 'date'],
                'price' => ['required', 'isNumber']
            ]);

            if ($validate->hasError()) {
                $data = [
                    'errors' => $validate->getErrors(),
                    'requests' => $this->req->getAttribute()
                ];
            } else {
                $saleData = [
                    'estate_id' => $this->req->estate_id,
                    'buyer_id' => $this->req->buyer_id,
                    'sale_date' => $this->req->sale_date,
                    'price' => $this->req->price,
                    'updated_at' => date('Y-m-d H:i:s')  
                ];

                $result = $this->salesModel->editSaleById($id, $saleData);

                if ($result) {
                    flash('SaleUpdated', 'اطلاعات فروش با موفقیت ویرایش شد', 'alert alert-success');
                    redirect('sales/index');
                } else {
                    flash('SaleUpdateError', 'خطایی در ویرایش اطلاعات فروش رخ داد', 'alert alert-danger');
                }
            }
        }

        $sale = $this->salesModel->findSaleById($id);

        if ($sale) {
            $data['sale'] = $sale;
            $this->view('sales/edit', $data);
        } else {
            flash('SaleNotFound', 'فروش مورد نظر پیدا نشد', 'alert alert-danger');
            redirect('sales/index');
        }
    }

    public function deleteSale($id)
    {
        if ($this->salesModel->deleteSaleById($id)) {
            flash('SaleDeleted', 'فروش با موفقیت حذف شد', 'alert alert-success');
        } else {
            flash('SaleDeleteError', 'خطایی در حذف فروش رخ داد', 'alert alert-danger');
        }
        redirect('sales/index');
    }

}
