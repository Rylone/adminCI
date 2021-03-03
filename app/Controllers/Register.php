<?php namespace App\Controllers;
 
use App\Models\UserModel;
 
class Register extends BaseController
{
   
    public function index()
    {
        //include helper form

        $this->affichageFormRegister('Register à wwww.site.com', false);
    }
 
    public function save()
    {
        //include helper form
        
        //set rules validation form
        $rules = [
            'name'          => 'required|min_length[3]|max_length[20]',
            'email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.userEmail]',
            'password'      => 'required|min_length[6]|max_length[200]',
            'confpassword'  => 'matches[password]'
        ];
     /***********************************************************************************************
     * Si les saisies de l'utilisateur respectent les regles de validation on le connecte directement
     * **********************************************************************************************/
        if($this->validate($rules)){
            
            $model = new UserModel();
            $data = [
                'userName'     => $this->request->getVar('name'),
                'userEmail'    => $this->request->getVar('email'),
                'userPassword' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->save($data);
            return redirect()->to('/login');
        }else{
            
            $this->affichageFormRegister('Register à wwww.site.com', false, $this->validator );
        }
    /****************************************************
     * fonction qui permet d'afficher la vue register
     * ***********************************************/
    }
    private function affichageFormRegister($pageTitle = "", $affMenu = false, $validation = null)
    {
        $data = [
            'page_title' => $pageTitle ,
            'aff_menu'  => $affMenu,
            'validation' => $validation
        ];

        echo view('common/HeaderAdmin' , 	$data);
        echo view('register', $data);
        echo view('common/FooterSite');
    }
 
}