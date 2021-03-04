<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class MessageModel extends Model{
    protected $table = 'message';
    protected $allowedFields = ['id','id_pere','id_film','sujet','text','date_creation','email_createur'];
}