<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\Categories_model;

class Categories extends BaseController
{
	public function index()
	{
		$model = new Categories_model();
		$uri = $this->request->uri->getSegment(1);
		$data['categories'] = $model->getCategories();
		$data['segments'] = $uri;
		return view('admin/category/index', $data);
	}

	public function delete($id = null)
	{
		$model = new Categories_model();
	}

	//--------------------------------------------------------------------

}
