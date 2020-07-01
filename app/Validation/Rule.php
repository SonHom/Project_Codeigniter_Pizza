<?php namespace App\Validation;
use App\Models\AuthsModel;
class Rule{
    public function UserValidation( string $str, string $fields,array $data)
    {
        $model = new AuthsModel();
        $user = $model->where('email',$data['email'])
                        ->first();
    
        if($user)
            return true;

        return password_verify($data['password'],$user['password']);
    }
}