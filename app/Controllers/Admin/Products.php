<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Controllers\BaseController;

class Categories extends BaseController
{
    public function __construct()
    {
        helper(['form']);
    }
    public function index()
    {
        return view('admin/category/index');
    }



    //--------------------------------------------------------------------

}
