<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RoleModel;
use App\Models\ArtistesModel;
use App\Models\FilmModel;


class Roles extends BaseController
{
	public $artistesModel = null;

	public function __construct()
	{
		 $this->RoleModel = new RoleModel();
         $this->ArtistesModel = new ArtistesModel();
         $this->FilmModel = new FilmModel();
	}
	public function index()
	{		
        /**********************************************************************************
		  ** on stocke nos models dans une variable pour les transmettre dans notre vue
		**********************************************************************************/ 
        $nameActeurs = $this->ArtistesModel;
        $nameFilms = $this->FilmModel;

		/**************************************************************** 
		  ** data corresponds au données que je souhaite passer a ma vue 
		*****************************************************************/ 
			$data = [
				'page_title' => 'Les differents roles du site' ,
				'aff_menu'  => true, 
				'tabRoles'=> $this->RoleModel->orderBy('nom_role', 'ASC')->paginate(12),
				'pager'=>  $this->RoleModel->pager,
                'artisteModel' => $nameActeurs,
                'filmModel'=> $nameFilms
			];
    
            /*
            $db = \Config\Database::connect();
            $builder = $db->table('role');
            $builder->select('*');
            $builder->join('artistes', 'artistes.id = role.id_acteur');
            $query = $builder->get();
	         d($query); 
             SELECT * FROM blogs JOIN comments ON comments.id = blogs.id
             */
			
			echo view('common/HeaderAdmin' , $data);
			echo view('admin/Roles/List', $data);
			echo view('common/FooterAdmin');
	}
    public function edit($idFilm = null, $idActeur = null)
	{
        if(!empty($this->request->getVar("save")))
		{
			$save = $this->request->getVar("save");

		        /********************************************************************************
				 * Je vérifie si les champs sont correctement remplis
				 * exemple : nom du formulaire est requis et devra 
				  avoir une longueur min de 3 characteres et une longueur max de 30 caracteres
		 		********************************************************************************/
				$rules = [
					'nameRole'         => 'required|min_length[3]|max_length[30]',
					'nameArtiste'      => 'required',
					'nameFilm'         => 'required'
				];
				 /******************************************************************
		         * Si les champs sont valides permet la soumission du formulaire
		         ********************************************************************/
				/*if($this->validate($rules))
				{
					$dataSave = [
						'nom' => $this->request->getVar('nom'),
						'prenom' => $this->request->getVar('prenom'),
						'annee_naissance' => $this->request->getVar('naissance')
					];
					if($save == "update")
					{
						$this->artistesModel->where('id', $id)
											->set($dataSave)
											->update();
						//return redirect()->to('/admin/Artistes');
					} else { 
						$this->artistesModel->save($dataSave);
						return redirect()->to('/admin/Artistes');
					}
		    	}  	*/	
		} 
        // on selectionne le role qui va correspondre a l'idfilm et l'idacteur
		$roleEdit = $this->RoleModel->where('id', $id)->first();
	
		$data = [
			'page_title' => 'Les Artistes du site' ,
			'aff_menu'  => true, 
			'oneArtiste'=> $artisteEdit
		];

		echo view('common/HeaderAdmin' , 	$data);
		echo view('admin/Artistes/Edit', $data);
		echo view('common/FooterSite');
		
		
	}
	public function delete($id = null, $page = null)
	{
		$this->artistesModel->where('id', $id)->delete();
		if(!empty($page))
		{
			return redirect()->to('/admin/Artistes?page='.$page);
		} else {
			return redirect()->to('/admin/Artistes');
        }
	}

}
