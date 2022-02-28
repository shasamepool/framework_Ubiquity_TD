<?php
namespace controllers;
use Ubiquity\attributes\items\router\Route;
use model\Organisation;
use models\Organization;
use Ubiquity\orm\DAO;
use Ubiquity\orm\repositories\ViewRepository;
use Ubiquity\utils\http\URequest;

/**
  * Controller OrgaController
  */

 #[Route('orga',automated: true)]
class OrgaController extends \controllers\ControllerBase{
     private ViewRepository $repo;

     public function  initialize()
     {
         parent::initialize();
         $this->repo = new ViewRepository($this,Organization::class);
     }

     #[Get(Name: 'orga.index')]
	public function index(){
        $this->repo->all();
		$this->loadView("OrgaController/index.html");
	}

	#[Route(path: "getOne/{idOrga}",name: "orga.getOne")]
	public function getOne($idOrga){

        $this->repo->byId($idOrga,['users','groupes']);
		$this->loadView('OrgaController/getOne.html');

	}

     #[Get(path: "add",name: "orga.frmAdd")]
     public function frmAdd(){
         $this->loadView('OrgaController/formulaireAjout.html');
     }

     #[Post(path: "add",name: "orga.add")]
     public function add(){
         $monPath = "orga.add";
         $orga=new Organization();
         URequest::setValuesToObject($orga);
         if(DAO::insert($orga)){
             //$message = "truc";
             $this->loadView('OrgaController/message.html',compact('monPath'));
             $this->index();
         }
     }

     #[Get(path: "update/{idOrga}",name: "orga.update")]
     public function frmEdit(int $idOrga){
         $orga=DAO::getById(Organization::class, $idOrga);
         $this->frmOrga($orga);
     }

     public function frmOrga(Organization $orga, bool $add=true){
         $monPath = null;
         if($add == 1)
            $path = "orga.add";
         else
             $path = "orga.frmEdit";
        $this.$this->loadView('OrgaController/formulaireAjout.html',compact('orga','monPath'));
    }

     #[Get(path: "remove/{idOrga}",name: "orga.remove")]
     public function remove(String $idOrga){
        DAO::remove(DAO::getById(Organization::class,$idOrga));
     }

}
