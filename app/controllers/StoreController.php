<?php
namespace controllers;
use models\Product;
use models\Section;
use Ubiquity\attributes\items\di\Autowired;
use Ubiquity\attributes\items\router\Get;
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
    public function storeSection($idSection)
    {
        $section=DAO::getbyId(Section::class, $idSection,['products']);
        $this->loadView('@activeTheme/main/vMenu.html');
        $this->loadView("StoreController/storeSection.html", ['section'=>$section]);
    }

    #[Route(path: "allProducts", name: "store.allProducts")]
    public function allProduct()
    {
        $products=DAO::getAll(Product::class);
        $this->loadView('@activeTheme/main/vMenu.html');
        $this->loadView("StoreController/storeSectionBis.html", ['products'=>$products]);
    }

    #[Get(path: "section/{idProduct}/{count}", name: "store.addToCart")]
    public function addToCart(int $idProduct,int $count)
    {
        //$_SESSION["count"]= $_SESSION["count"] + $count;

        $this->loadView('@activeTheme/main/vMenu.html');
        $this->loadView("StoreController/storeSectionBis.html", ['products'=>$products]);
    }


}