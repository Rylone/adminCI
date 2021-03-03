<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;

class Accueil extends Controller
{
	public function index()
	{	

		/** exemple de passage de variable a une vue */ 
		$data = [
			'page_title' => 'Connexion à wwww.site.com' ,
			'aff_menu'  => true
		];

		echo view('common/HeaderAdmin' , 	$data);
		echo view('Admin/Accueil');
		echo view('common/FooterSite');
	}

}
