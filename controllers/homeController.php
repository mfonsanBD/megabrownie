<?php
namespace Controllers;
use \Core\Controller;

class HomeController extends Controller{
	public function index(){
		$dados = array();
		$this->titulo = "Página Inicial";
		$this->loadTemplate('home', $dados);
	}
}