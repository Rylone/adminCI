<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ArtistesModel;


class Artistes extends BaseController
{
	public $artistesModel = null;

	public function __construct()
	{
		 $this->artistesModel = new ArtistesModel();
	}
	public function index()
	{	
		/**************************************************************** 
		  ** data corresponds au données que je souhaite passer a ma vue 
		*****************************************************************/ 
		//$listArtistes = $this->artistesModel->findAll();
		
		//dd($listArtistes);
			$data = [
				'page_title' => 'Les Artistes du site' ,
				'aff_menu'  => true, 
				'tabArtistes'=> $this->artistesModel->orderBy('id', 'DESC')->paginate(12),
				'pager'=>  $this->artistesModel->pager,
			];
	
			
			echo view('common/HeaderAdmin' , 	$data);
			echo view('admin/Artistes/List', $data);
			echo view('common/FooterSite');
	}
    public function edit($id = null)
	{
		/**********************************************
		 * Je controle si j'ai posté mon formulaire
		 **********************************************/
		if(!empty($this->request->getVar("save")))
		{
			$save = $this->request->getVar("save");

		        /********************************************************************************
				 * Je vérifie si les champs sont correctement remplis
				 * exemple : nom du formulaire est requis et devra 
				  avoir une longueur min de 3 characteres et une longueur max de 30 caracteres
		 		********************************************************************************/
				$rules = [
					'nom'         => 'required|min_length[3]|max_length[30]',
					'prenom'      => 'required|min_length[3]|max_length[30]',
					'naissance'   => 'required',
				];
				 /******************************************************************
		         * Si les champs sont valides permet la soumission du formulaire
		         ********************************************************************/
				if($this->validate($rules))
				{
					$dataSave = [
						'nom' => $this->request->getVar('nom'),
						'prenom' => $this->request->getVar('prenom'),
						'annee_naissance' => $this->request->getVar('naissance'),
					];

					if($save == "update")
					{
						$file = $this->request->getFile('imageArtiste');
						if($file)
						{
							if ($file->isValid() && ! $file->hasMoved())
							{
								$newName = $file->getRandomName();
								$file->move(ROOTPATH.'/public/uploads', $newName);
								$dataSave["image"] = $newName;
							}
						} 
						$this->artistesModel->where('id', $id)
						->set($dataSave)
						->update();
						//return redirect()->to('/admin/Artistes');
					} else { 
						$this->artistesModel->save($dataSave);
						return redirect()->to('/admin/Artistes');
					}
		    	}  		
		}
		$artisteEdit = $this->artistesModel->where('id', $id)->first();
	
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
