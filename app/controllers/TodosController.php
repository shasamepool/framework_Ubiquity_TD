<?php
namespace controllers;
use Ubiquity\attributes\items\router\Get;
use Ubiquity\attributes\items\router\Post;
 /**
  * Controller TodosController
  */
class TodosController extends \controllers\ControllerBase{

    #[Route(path: "/_default/")]
	public function index(){
		
	}

	#[Post(path: "/todos/add/",name: "todos.add")]
	public function addElement(){
		
	}


	#[Get(path: "/todos/delete/{index}",name: "todos.delete")]
	public function deleteElement($index){
		
	}


	#[Post(path: "/todos/edit/{index}",name: "todos.edit")]
	public function editElement($index){
		
	}


	#[Get(path: "/todos/loadList/{uniqid}",name: "todos.loadList")]
	public function loadList($uniqid){
		
	}


	#[Post(path: "Todos/loadList",name: "todos.loadListPost")]
	public function loadListFromFrom(){
		
	}


	#[Get(path: "Todos/saveList",name: "todos.save")]
	public function saveList(){
		
	}


	#[Get(path: "/todos/new/{force}",name: "todos.new")]
	public function newlist($force){
		
	}

}
