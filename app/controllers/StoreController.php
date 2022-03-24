<?php
namespace controllers;
use models\Product;
use models\Section;
use MongoDB\Driver\Session;
use Ubiquity\attributes\items\di\Autowired;
use Ubiquity\attributes\items\router\Get;
use Ubiquity\attributes\items\router\Route;
use Ubiquity\cache\objects\SessionCache;
use Ubiquity\controllers\auth\WithAuthTrait;
use Ubiquity\orm\DAO;

/**
 * Controller StoreController
 */
class StoreController extends \controllers\ControllerBase
{
    private $a = []; //Passer $a en variable de session

    public function index()
    {
        $this->a['count'] = 0;
        $section=DAO::getAll(Section::class);
        $this->loadView('@activeTheme/main/vMenu.html', ['count'=>$this->a['count']]);
        $this->loadView("StoreController/index.html",['section'=>$section]);
    }


    #[Route(path: "section/{idSection}", name: "store.section")]
    public function storeSection($idSection)
    {
        if(!isset($this->a['count']))
            $this->a['count'] = 2;
        $section=DAO::getbyId(Section::class, $idSection,['products']);
        $this->loadView('@activeTheme/main/vMenu.html', ['count'=>$this->a['count']]);
        $this->loadView("StoreController/storeSection.html", ['section'=>$section]);
    }

    #[Route(path: "allProducts", name: "store.allProducts")]
    public function allProduct()
    {
        if(!isset($this->a['count']))
            $this->a['count'] = 3;
        $products=DAO::getAll(Product::class);
        $this->loadView('@activeTheme/main/vMenu.html',['count'=>$this->a['count']]);
        $this->loadView("StoreController/storeSectionBis.html", ['products'=>$products]);
    }

    #[Get(path: "section/{idProduct}/{count}", name: "store.addToCart")]
    public function addToCart(int $idProduct,int $count)
    {
        $this->a['count'] = $this->a['count'] + 1;
        $products=DAO::getAll(Product::class);
        $this->loadView('@activeTheme/main/vMenu.html', ['count'=>$this->a['count']]);
        $this->loadView("StoreController/storeSectionBis.html", ['products'=>$products]);
    }


}