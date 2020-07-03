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
		// set validate login form
		helper(['form']);
		$data = [];
		if($this->request->getMethod() == "post"){
			// rule of user
			$rules = [
				'email' => 'required|valid_email',
				'password' => 'required|UserValidation[email,password]'
			];
			//messages when user put the email and password incorrect
			$error = [
				'password' => [
					'UserValidation' => 'password and email incorrect please try again'
				]
			];
			if($this->validate($rules,$error)){
				$athu = new AuthsModel();
				$user = $athu->where('email',$this->request->getVar('email')) ->first();
				$this->setUserSession($user);
				return redirect()->to('/pizza');
			}else{
				$data['validation'] = $this->validator;
			}

		}
		return view('auths/login',$data);
	
	}
	//show form register user
	public function showFormAdd()
	{
		return view('auths/register');
	}
	//register user 
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
				//add user to database
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
				return redirect()->to('/pizza');
			}else{
				//validate messages
				$data['validation'] = $this->validator;
            }
        }

		return view('auths/register',$data);
		
	}
	// when we click on logout in navbar it go to login form
	public function logout(){
		session()->destroy();
		return redirect()->to('/');
	}
	
	
	//--------------------------------------------------------------------

}