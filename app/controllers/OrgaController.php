<?php
namespace controllers;
use Ubiquity\attributes\items\router\Route;
use model\Organisation;
use models\Organization;
use Ubiquity\orm\DAO;

/**
  * Controller OrgaController
  */

 #[Route('orga',automated: true)]
class OrgaController extends \controllers\ControllerBase{

     #[Get(Name: 'orga.index')]
	public function index(){
        $orgas=DAO::getAll(Organization::class);
		$this->loadView("OrgaController/index.html",compact('orgas'));
	}

	#[Route(path: "getOne/{idOrga}",name: "orga.getOne")]
	public function getOne($idOrga){
		$orga=DAO::getById(Organization::class,$idOrga,['users','groupes']);
		$this->loadView('OrgaController/getOne.html',compact('orga'));

	}

}
