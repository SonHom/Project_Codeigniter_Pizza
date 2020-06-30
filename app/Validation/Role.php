<?php namespace App\Validation;
use App\Models\AuthsModel;
class Role {
	public function userValid(String $str, String $fields, String $data)
	{
        $pizza = new AuthsModel();
        $user = $pizza->where('email',$data['email'])->first();
        $user = $pizza->where('password',$data['password'])->first();
        if($user){
            return true;
            return password_verify($data['password'],$user['password']);
        }
	}

	//--------------------------------------------------------------------

}