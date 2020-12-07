<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\Categories_model;

class Categories extends BaseController
{
	public function __construct()
	{
		helper(['form']);
	}
	public function index()
	{
		$data['title'] = 'Manage Categories';
		return view('admin/category/index', $data);
	}

	public function show()
	{
		$model = new Categories_model();
		$data['results'] = $model->getCategories();

		return json_encode($data);
	}

	public function categoryActive(){
		$model = new Categories_model();
		$data['results'] = $model->where('category_status','ACTIVE')->findall();

		return json_encode($data);
	}

	public function add()
	{

		$validation = \Config\Services::validation();

		$model = new Categories_model();

		$name = $this->request->getPost('category_name');
		$status = $this->request->getPost('category_status');

		$data = [
			'category_name'		=> $name,
			'category_status'			=> $status,
		];

		if ($validation->run($data, 'categories') == FALSE) {
			$respone = [
				'status'	=> 500,
				'error'		=> true,
				'data'		=> $validation->getError()
			];
			return json_encode($respone);
		} else {
			$simpan = $model->insertCategory($data);
			if ($simpan) {
				$msg = ['message' => 'Created Category Succesffuly'];
				$respone = [
					'status'		=> 200,
					'error'			=> false,
					'data'			=> $msg
				];
				return json_encode($respone);
			}
		}
	}
	public function edit($id = null)
	{
		$model = new Categories_model();
		$get = $model->getCategories($id);

		if ($get) {
			return json_encode($get);
		} else {
			return json_encode('Nothing');
		}
	}

	public function delete($id = null)
	{
		$model = new Categories_model();
		$hapus = $model->deleteCategory($id);

		if ($hapus) {
			echo "Deleted Sucessfully";
		}
	}

	public function update($id = null)
	{
		$validation = \Config\Services::validation();

		$model = new Categories_model();

		$name = $this->request->getPost('category_name');
		$status = $this->request->getPost('category_status');

		$data = [
			'category_name'		=> $name,
			'category_status'	=> $status,
		];

		if ($validation->run($data, 'categories') == FALSE) {
			$respone = [
				'status'	=> 500,
				'error'		=> true,
				'data'		=> $validation->getError()
			];
			return json_encode($respone);
		} else {
			$update = $model->updateCategory($data, $id);
			if ($update) {
				$msg = ['message' => 'Update Category Succesffuly'];
				$respone = [
					'status'		=> 200,
					'error'			=> false,
					'data'			=> $msg
				];
				return json_encode($respone);
			}
		}
	}

	//--------------------------------------------------------------------

}
