<?php 
class notfoundController extends controller{
	public function index(){
		$this->titulo = "Página não encontrada";
		$this->loadTemplate('404', $dados=array());
	}
}