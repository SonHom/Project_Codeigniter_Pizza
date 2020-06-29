<?php namespace App\Models;

use CodeIgniter\Model;

class Peperoni extends Model
{
    protected $table      = 'peperoni';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['name','ingredient','price'];

}