<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data['title'] = 'Selamat Datang di Website Kelontongku';
		return view('home/index', $data);
	}

	//--------------------------------------------------------------------

}
