<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\Users_model;

class Users extends BaseController
{
    protected $user;

	public function __construct()
	{
		helper(['form']);
        $this->user = new Users_model();
    }

    public function index(){
        $data = [
            
            'title'     => 'Manage User | Kelontong',
        ];


        return view('admin/users/index', $data);
    }

    public function show(){
        $data = [
            'results'  => $this->user->select("id, profile_picture, CONCAT(firstname, ' ' ,lastname) as fullname, username,email, active")->get()->getResultArray(),
        ];

        return json_encode($data);
    }
}