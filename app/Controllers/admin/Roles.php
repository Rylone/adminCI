<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
/** Appel des models utilisés dans mon controller **/
use App\Models\RoleModel;
use App\Models\ArtistesModel;
use App\Models\FilmModel;
/** Appel des models utilisés dans mon controller **/


class Roles extends BaseController
{
	public $artistesModel = null;
	public $filmsModel = null;
	public $rolesModel = null;


	public function __construct()
	{
		/******** Initialisation des models appelés  *****/
		 $this->rolesModel = new RoleModel();
         $this->artistesModel = new ArtistesModel();
         $this->filmsModel = new FilmModel();
	}
	public function index()
	{		
        /**********************************************************************************
		  ** on stocke nos models dans une variable pour les transmettre dans notre vue
		**********************************************************************************/ 
        $nameActeurs = $this->artistesModel;
        $nameFilms = $this->filmsModel;

		/**************************************************************** 
		  ** data corresponds au données que je souhaite passer a ma vue 
		*****************************************************************/ 
			$data = [
				'page_title' => 'Les differents roles du site' ,
				'aff_menu'  => true, 
				'tabRoles'=> $this->rolesModel->orderBy('nom_role', 'ASC')->paginate(12),
				'pager'=>  $this->rolesModel->pager,
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
    public function edit($idActeur = null, $idFilm = null)
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
					'nameRole'         => 'required',
					'nameArtiste'      => 'required',
					'nameFilm'         => 'required'
				];

				 /******************************************************************
		         * Si les champs sont valides permet la soumission du formulaire
		         ********************************************************************/
				if($this->validate($rules))
				{
					$dataSave = 
					[
						'id_film' => $this->request->getVar('nameFilm'),
						'id_acteur' => $this->request->getVar('nameArtiste'),
						'nom_role' => $this->request->getVar('nameRole')
					];
                   
					if($save == "update")
					{
					   $this->request->getVar('nameFilm');
					   $this->rolesModel->where('id_acteur', (int) $idActeur)->where('id_film', (int) $idFilm)
											->set($dataSave)
											->update(); 
					/* petit plus : pour editer sur la meme page sans redirection */
                    /* Si la mise a jour est reussit il faut faire une requete qui devra recuperer les nouvelles donnees*/
					/* Les nouvelles données doit etre transmise a la vue pour etre affiché */
					/* faire une redirect qui va ajouter un parametre dans l'url et devras declencher laffichage edité*/
					   return redirect()->to('/admin/roles');
					} else { 
						$this->rolesModel->save($dataSave);
					  return redirect()->to('/admin/Roles');
					}
		    	}
			
			}
		
        // on selectionne le role qui va correspondre a l'idfilm et l'idacteur
		// faire un selecte dans le formulaire d'édition qui affichent tout les acteurs et tous les films
	    //dd($roleEdit);
		$roleEdit = $this->rolesModel->where('id_acteur', (int) $idActeur)->where('id_film', (int) $idFilm)->first();
		$filmEdit = $this->filmsModel->orderBy('titre', 'ASC')->findAll();
		$acteurEdit = $this->artistesModel->orderBy('nom', 'ASC')->findAll();
		//dd($filmEdit, $acteurEdit);
	
		$data = [
			'page_title' => 'Les Roles du site' ,
			'aff_menu'  => true, 
			'oneRole'=> $roleEdit,
			'selectFilms' => $filmEdit,
			'selectActeurs' => $acteurEdit
		];

		echo view('common/HeaderAdmin' , 	$data);
		echo view('admin/Roles/Edit', $data);
		echo view('common/FooterSite');
		
		
	}
	public function delete($idActeur = null, $idFilm = null, $page = null)
	{
		$this->rolesModel->where('id_acteur', (int) $idActeur)->where('id_film', (int) $idFilm)->delete();
		if(!empty($page))
		{
			return redirect()->to('/admin/Roles?page='.$page);
		} else {
			return redirect()->to('/admin/Roles');
        }
	}

}
