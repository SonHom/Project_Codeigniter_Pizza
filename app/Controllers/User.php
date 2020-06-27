<?php namespace App\Controllers;

class User extends BaseController
{
	public function index()
	{
		return view('auths/login');
	}
	
	public function register()
	{
		// $data = [];
		// helper('form');
		// if($this->request->getMethod() =="post"){
		// 	$rules = [
		// 		'name' =>'required|alpha',
		// 		'password'=>'required',
		// 		'address'=>'required'
		// 	];
		// 	if(!$this->validate($rules)){
		// 		$data['validation'] = $this->validator;
		// 		// return view('auths/register');
		// 	}
		// }
		return view('auths/register');
	}
	public function showFormPeperoni()
	{
		return view('index');
	}

	//--------------------------------------------------------------------

}