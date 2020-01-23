<?php
class homeController extends controller{
	public function index(){
		$dados = array();
		$this->titulo = "Página Inicial";
		$this->loadTemplate('home', $dados);
	}
}