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
		$i = 1;
		$i = $i + 1 ;

		if(!empty($typeDeRecherche) && !empty($elementSearch))
		{
			switch($typeDeRecherche)
			{
				case "realisateur":
				$searchFilm =  $searchFilm->where('id_realisateur', $elementSearch);
                    break;
				case "genre":
				$searchFilm = $this->filmsModel->where('genre', $elementSearch)->orderBy('id', 'DESC')->paginate(6);
				break;

			}

		}
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
