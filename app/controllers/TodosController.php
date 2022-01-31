<?php
namespace controllers;
use Ubiquity\attributes\items\router\Get;
use Ubiquity\attributes\items\router\Post;
use Ubiquity\utils\http\URequest;
use Ubiquity\utils\http\USession;

/**
  * Controller TodosController
  * @property Jsutils $jquery
  */

class TodosController extends \controllers\ControllerBase{
    const CACHE_KEY = 'datas/lists/';
    const EMPTY_LIST_ID = 'not saved';
    const LIST_SESSION_KEY = 'list';
    const ACTIVE_LIST_SESSION_KEY = 'active-list';

    #[Route(path: "/_default/")]
	public function index(){
        $list[]=USession::get(self::LIST_SESSION_KEY,[]);
        $this->displayList($list);
	}

	#[Post(path: "add",name: "todos.add")]
	public function addElement(){
        $list=USession::get(self::LIST_SESSION_KEY,[]);
        $newElement=URequest::post('elm');
        $list[]=$newElement;
        USession::set(self::LIST_SESSION_KEY,$list);
        $this->displayList($list);
    }


	#[Get(path: "delete/{index}",name: "todos.delete")]
	public function deleteElement($index){
		
	}


	#[Post(path: "edit/{index}",name: "todos.edit")]
	public function editElement($index){

	}


	#[Get(path: "loadList/{uniqid}",name: "todos.loadList")]
	public function loadList($uniqid){
		
	}


	#[Post(path: "loadList",name: "todos.loadListPost")]
	public function loadListFromFrom(){
		
	}


	#[Get(path: "saveList",name: "todos.save")]
	public function saveList(){

	}


	#[Get(path: "new/{force}",name: "todos.new")]
	public function newlist($force){

	}


    private function displayList(array $list) {
        $this->loadView("TodosController/displayList.html",['list'=>$list]);
    }


    private function showMessage(string $header, string $message, string $type = '', string $icon = 'info circle',array $buttons=[]) {
        $this->loadView('main/message.html', compact('header', 'type', 'icon', 'message','buttons'));
    }

}
