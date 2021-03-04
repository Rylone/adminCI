<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class PaysModel extends Model{
    protected $table = 'pays';
    protected $allowedFields = ['code','nom','langue'];
}