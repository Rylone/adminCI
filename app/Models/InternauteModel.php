<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class InternauteModel extends Model{
    protected $table = 'internaute';
    protected $allowedFields = ['email', 'nom','prenom', 'mot_de_passe','annee_naissance', 'region'];
}