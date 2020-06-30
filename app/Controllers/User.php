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
	public function setUserSession($user){
		$Data = [
			'id'=>$user['id'],
			'email'=>$user['email'],
			'password'=>$user['password'],
		  	'address'=>$user['address'],
		  	'role'=>$user['role']
		];
		session()->set($data);
		return true;
	}
	public function register(){
		helper(['form']);
		$data = [];
		if($this->request->getMethod() =="post"){
			$rules = [
				'email' =>'required|valid_emaiil',
				'password'=>'required',
				'address'=>'required'
			];
			$athu = new AuthsModel();
			$newData = [
				'email' => $this->request->getVar('email'),
				'password' => $this->request->getVar('password'),
				'address' => $this->request->getVar('address'),
				'role' => $this->request->getVar('role'),
			];

			$athu->save($newData);
			return redirect()->to('/');
		}
		return view('auths/register');
		
	}

	public function logout(){
		session()->destroy();
		return redirect()->to('/');
	}
	
	
	//--------------------------------------------------------------------

}