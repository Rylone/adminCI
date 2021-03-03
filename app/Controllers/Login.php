<?php

namespace App\Controllers;
use App\Models\UserModel;


class Login extends BaseController
{
	public function index()
	{	

		/** exemple de passage de variable a une vue */ 
		$data = [
			'page_title' => 'Connexion à wwww.site.com' ,
			'aff_menu'  => false
		];

		echo view('common/HeaderAdmin' , 	$data);
		echo view('Site/Login');
		echo view('common/FooterSite');
	}
	

	public function loggin()
    {
        //include helper form
        helper('form');
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
						   return $user['userId'];
					   } 
				   }
        }  
			
         $data = [
                'page_title' => 'connexion à wwww.site.com' ,
                'aff_menu'  => false,
                'validation' => $this->validator
            ];
    
			echo view('common/HeaderAdmin' , 	$data);
			echo view('Site/Login');
			echo view('common/FooterSite');
        
         
    }
}


