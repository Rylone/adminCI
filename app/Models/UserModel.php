<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class UserModel extends Model{
    protected $table = 'users';
    protected $allowedFields = ['userName','userEmail','userPassword','userCreatedAt'];
}