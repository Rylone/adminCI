<?php

namespace App\Controllers;
use App\Models\UserModel;


class Login extends BaseController
{
	public function index()
	{	
       $this->affichageFormLogin('Connexion à wwww.site.com', false);
		/** exemple de passage de variable a une vue */ 
	
	}
	

	public function connexion()
    {
        //include helper form
   
        //set rules validation form
        $rules = [
            'email'         => 'required|min_length[6]|max_length[50]|valid_email',
            'password'      => 'required|min_length[6]|max_length[200]'
        ];
         
        if($this->validate($rules))
		{
            $userModel = new UserModel();
            $data = [
                'userEmail' => $this->request->getVar('email'),
				'userPassword' => $this->request->getVar('password'),
            ];
			$users = $userModel->where('userEmail', $data['userEmail'])->findAll();

				   foreach ($users as $user)
				   {
					   $pwd = $user['userPassword'];
					   if(password_verify($data['userPassword'], $pwd))
					   {
						  $sessionData = [
							               'userID'=>
										   $user['userId']
										];
						  $this->session = session();
						  $this->session->set($sessionData); // setting session data
						 
						  return redirect()->to('/admin/Accueil');
					   } 
				   }
        }  

		$this->affichageFormLogin('connexion à wwww.site.com', false, $this->validator);
    }
	private function affichageFormLogin($pageTitle = "", $affMenu = false, $validation = null)
    {
        $data = [
            'page_title' => $pageTitle ,
            'aff_menu'  => $affMenu,
            'validation' => $validation
        ];

        echo view('common/HeaderAdmin' , 	$data);
        echo view('Site/Login', $data);
        echo view('common/FooterSite');
    }
}


