<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class GenreModel extends Model{
    protected $table = 'genre';
    protected $allowedFields = ['code'];
}