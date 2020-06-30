<?php namespace App\Models;

use CodeIgniter\Model;

class AuthsModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['email','password','address','role'];

}