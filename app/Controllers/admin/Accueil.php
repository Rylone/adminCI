<?php

namespace App\Controllers\Admin;

use App\Models\UserModel;
use App\Controllers\BaseController;


class Accueil extends BaseController
{
	public function index()
	{	
		    $this->verifAcces('/login');
			$data = [
				'page_title' => 'Connexion à wwww.site.com' ,
				'aff_menu'  => true
			];
	
			echo view('common/HeaderAdmin' , 	$data);
			echo view('Admin/Accueil');
			echo view('common/FooterSite');
	}

	public function logout()
	{
		$this->session->destroy();
	}
	

}
