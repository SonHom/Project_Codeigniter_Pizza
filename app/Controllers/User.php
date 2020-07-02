<?php namespace App\Controllers;
use App\Models\AuthsModel;
class User extends BaseController
{

	public function setUserSession($user){
		$data = [
			'id' => $user['id'],
			'email' => $user['email'],
			'password' => $user['password'],
			'address' => $user['address'],
			'role' => $user['role']
		];

		session()->set($data);
		return true;
	}
	public function index()
	{
		// set login
		helper(['form']);
		$data = [];
		if($this->request->getMethod() == "post"){
			$rules = [
				'email' => 'required|valid_email',
				'password' => 'required'
			];
			$error = [
				'password' => [
					'UserValidation' => 'password not match!'
				]
			];
			if($this->validate($rules,$error)){
				$athu = new AuthsModel();
				$user = $athu->where('email',$this->request->getVar('email'))
							  ->first();
				$this->setUserSession($user);
				return redirect()->to('/pizza');
			}else{
				$data['validation'] = $this->validator;
			}

		}
		return view('auths/login',$data);
	
	}
	
	public function showFormAdd()
	{
		return view('auths/register');
	}

	public function register(){
		helper(['form']);
		$data = [];
		if($this->request->getMethod() =="post"){
			$rules = [
				'email' =>'required|valid_email',
				'password'=>'required',
				'address'=>'required'
			];
			if($this->validate($rules)){
				$athu = new AuthsModel();
                $email = $this->request->getVar('email');
                $password = $this->request->getVar('password');
                $address = $this->request->getVar('address');
                $role = $this->request->getVar('role');

				$newData = [
					'email' =>$email,
                	'password' => $password,
                	'address' => $address ,
                	'role' =>  $role

				];

				$athu->save($newData);
				return redirect()->to('/');
			}else{
				$data['validation'] = $this->validator;
            }
        }

		return view('auths/register',$data);
		
	}

	public function logout(){
		session()->destroy();
		return redirect()->to('/');
	}
	
	
	//--------------------------------------------------------------------

}