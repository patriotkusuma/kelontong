<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\Categories_model;
use App\Models\Products_model;

class Dashboard extends BaseController
{
    protected $productModel;
    protected $categoryModel;
    public function __construct()
    {
        helper(['form']);
        $this->productModel = new Products_model();
        $this->categoryModel = new Categories_model();
    }

    public function index(){
        $data['title'] = "Dashboard Admin | Kelontong";

        $totalProduct = $this->productModel->where('product_status', 'ACTIVE')->countAllResults();
        $totalCategory = $this->categoryModel->where('category_status', 'ACTIVE')->countAllResults();

        $data['totalProduct'] = $totalProduct;
        $data['totalCategory'] = $totalCategory;
        return view('admin/dashboard', $data);
    }
}
?>