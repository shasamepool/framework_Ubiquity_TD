<?php
namespace controllers;
 use Ubiquity\attributes\items\router\Route;
 use Ubiquity\controllers\auth\AuthController;
 use Ubiquity\controllers\auth\WithAuthTrait;

 /**
  * Controller MainController
  */
class MainController extends \controllers\ControllerBase{
    use WithAuthTrait;

    #[Route(path: '_default', name : 'home')]
	public function index(){
		$this->loadView("MainController/index.html");
	}


    protected function getAuthController(): AuthController
    {
        return new MyAuth($this);
    }
}
