<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class ArtistesModel extends Model{
    protected $table = 'artistes';
    protected $allowedFields = ['id','nom','prenom','annee_naissance','image'];
}