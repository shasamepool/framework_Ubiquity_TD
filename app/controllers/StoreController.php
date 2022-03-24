<?php
namespace controllers;
use models\Section;
use Ubiquity\attributes\items\di\Autowired;
use Ubiquity\attributes\items\router\Route;
use Ubiquity\controllers\auth\WithAuthTrait;
use Ubiquity\orm\DAO;

/**
 * Controller StoreController
 */
class StoreController extends \controllers\ControllerBase
{
    public function index()
    {
        $section=DAO::getAll(Section::class);
        $this->loadView('@activeTheme/main/vMenu.html');
        $this->loadView("StoreController/index.html",['section'=>$section]);
    }

    #[Route(path: "section/{idSection}", name: "store.section")]
    public function storeSection()
    {

    }

    public function nbproduits(){
        return "1";
    }
}