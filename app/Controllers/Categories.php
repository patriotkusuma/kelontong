<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Categories_model;

class Categories extends BaseController
{
	public function index()
	{
		$model = new Categories_model();
		$data['categories'] = $model->getCategories();
		return view('admin/category/index', $data);
	}

	//--------------------------------------------------------------------

}
