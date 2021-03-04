<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class NotationModel extends Model{
    protected $table = 'notation';
    protected $allowedFields = ['id_film','email','note'];
}