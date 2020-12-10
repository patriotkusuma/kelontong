<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\Categories_model;
use App\Models\Products_model;
use App\Models\Users_model;

class Dashboard extends BaseController
{
    protected $productModel;
    protected $categoryModel;
    protected $userModel;
    public function __construct()
    {
        helper(['form']);
        $this->productModel = new Products_model();
        $this->categoryModel = new Categories_model();
        $this->userModel = new Users_model();
    }

    public function index(){
        $data['title'] = "Dashboard Admin | Kelontong";

        $totalProduct = $this->productModel->where('product_status', 'ACTIVE')->countAllResults();
        $totalCategory = $this->categoryModel->where('category_status', 'ACTIVE')->countAllResults();
        $newUser = $this->userModel->select('created_at')->where('created_at BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()')->countAllResults();

        $data['totalProduct'] = $totalProduct;
        $data['totalCategory'] = $totalCategory;
        $data['newUser'] = $newUser;
        return view('admin/dashboard', $data);
    }
}
?>