<?php

namespace App\Controllers;
use App\Models\UserModel;


class Login extends BaseController
{
	public function index()
	{	
       $this->affichageFormLogin('Connexion à wwww.site.com', false);	
	}

	public function connexion()
    {
        $this->session = session();
        $sessionData = [];
        var_dump($this->session);
        //helper form est inclus dans baseController
   
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
                         $this->session->set($sessionData); 
						  return redirect()->to('/admin/Accueil');
					   } else {
                           $this->session->setFlashdata('mdp_wrong',"mot de passe incorrecte" );
                       }
				   }
        }  else {
            $this->session->setFlashdata('error', $this->validator->getErrors());
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


