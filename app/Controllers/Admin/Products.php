<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\Categories_model;
use App\Models\Products_model;

class Products extends BaseController
{
    public function __construct()
    {
        helper(['form']);
    }
    public function index()
    {
        return view('admin/products/index');
    }

    public function show(){
        $model = new Products_model();
        
        $data['results'][] = $model->getSpecified();

        return json_encode($data);

    }

    public function add(){
        $model = new Products_model();
        $sku = $this->request->getPost('sku');
        $name = $this->request->getPost('name');
        $productSlug = str_replace(' ', '-', $name);
        $categoryId = $this->request->getPost('category_id');
        $harga = $this->request->getPost('harga');
        $stok = $this->request->getPost('stok');
        $status = $this->request->getPost('status');

        $data = [
            'sku'           => $sku,
            'name'          => $name,
            'product_slug'  => $productSlug,
            'category_id'   => $categoryId,
            'harga'         => $harga,
            'stok'          => $stok,
            'status'        => $status,
        ];

        $simpan = $model->insertProducts($data);
        if($simpan){
            $msg = ['message' => 'Product Created Successfully'];
            $response = [
                'status'    => 200,
                'error'     => false,
                'data'      => $msg
            ];
            return json_encode($response);
        }
    }

    public function edit($id = null){
        $model = new Products_model();
        $get[] = $model->getProducts($id);

        $modelCategory = new Categories_model();
        $getCategory = $modelCategory->where('status', 'ACTIVE')->findall();

        $data = [
            'product'   => $get,
            'category'  => $getCategory,
        ];

        if($data){
            return json_encode($data);
        }
        
    }



    //--------------------------------------------------------------------

}
