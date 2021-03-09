<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class FilmModel extends Model{
    protected $table = 'films';
    protected $allowedFields = ['id','titre','annee','is_realisateur','genre', 'resume', 'code_pays'];
}