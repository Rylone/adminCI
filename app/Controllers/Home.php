<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\FilmModel;
use App\Models\GenreModel;
use App\Models\ArtistesModel;
use App\Models\PaysModel;
use App\Models\RoleModel;



class Home extends BaseController
{
	public $genresModel = null;
	public $filmsModel = null;
	public $artistesModel = null;
	public $rolesModel = null;
	public $paysModel = null;

	public function __construct()
	{
		/******** Initialisation des models appelés  *****/
		 $this->genresModel = new GenreModel();
         $this->filmsModel = new FilmModel();
		 $this->artistesModel = new ArtistesModel();
		 $this->rolesModel = new RoleModel();
		 $this->paysModel = new PaysModel();

	}
	public function index($typeDeRecherche = null, $elementSearch = null)
	{
		$artistes =  $this->artistesModel;
		$pays =  $this->paysModel;
		$genre =  $this->genresModel->findAll();
		$role =  $this->rolesModel;
		$searchFilm = $this->filmsModel;
		

		if(!empty($typeDeRecherche) && !empty($elementSearch))
		{
			switch($typeDeRecherche)
			{
				case "realisateur":
					//si j'ai realisateur seachfilm devra chercher la colonne id realiseur en fonction du deuxieme parametre 
					// $i = 1;
					// $i = $i + 1 ;
					// search film sera egale à cette requete
					$searchFilm =  $searchFilm->where('id_realisateur', $elementSearch);
                    break;
				case "genre":
					// utiliser la fonction lower ou uppercase pour convertir la chaine de caracteres en min ou maj 
					$searchFilm = $searchFilm->where('genre', $elementSearch);
					break;
				case "annee":
					$searchFilm = $searchFilm->where('annee', $elementSearch);
					break;
				case "pays":
					$searchFilm = $searchFilm->where('code_pays', $elementSearch);
					break;
				case "recherche":
					$searchFilm = $searchFilm->like('titre', $elementSearch, "both", null, true);
					break;
			}

		}
		// Si j'ai une condition du switch case $searchFilm sera egale à la requete du case contenu dans $seachfilm
		// on ajoutera ensuite lee orderby et la pagination
		// si il n'y a pas de condition on fait un orderby de tout les films et une pagination
    	$searchFilm = $searchFilm->orderBy('id', 'DESC')->paginate(6);


		$data = [
			'page_title' => 'Les differents roles du site' ,
			'aff_menu'  => true, 
			'tabFilms'=> $searchFilm,
			'pager'=>  $this->filmsModel->pager,
			'artisteModel' => $artistes,
			 'allGenres' => $genre,
			// 'paysModel' => $pays,
			// 'roleModel' =>$role,
		];

	
		echo view('common/HeaderMonsite', $data);
		echo view('Site/index', $data);
		echo view('common/FooterMonsite');
	}

}
