<?php namespace App\Controllers;
use App\Models\AuthsModel;
class User extends BaseController
{
	public function index()
	{
		return view('auths/login');
	}
	
	public function showFormAdd()
	{
		return view('auths/register');
	}
	public function register(){
		// helper(['form']);
		// $data = [];
		// if($this->request->getMethod() =="post"){
		// 	$rules = [
		// 		'email' =>'required',
		// 		'password'=>'required',
		// 		'address'=>'required'
		// 	];
		// 	if($this->validate($rules)){
		// 		$auth = new AuthsModel();
		// 		$email = $this->request->getVar('email');
		// 		$password = $this->request->getVar('password');
		// 		$address = $this->request->getVar('address');
		// 		$userData = array(
		// 	  		'email'=>$email,
		// 	  		'password'=>$password,
		// 	  		'address'=>$address
		// 		);
		// 		$auth->register($userData);
		// 		return redirect()->to("/viewPeperoni");
		// 		// echo "success";

		// 	}else{
		// 		$data['validation'] = $this->validator;
		// 		return view('auths/register',$data);
		// 	}
		// }
		$user = new AuthsModel();
		$user = insert($_POST);
		return redirect()->to("/");
	}
	
	
	//--------------------------------------------------------------------

}