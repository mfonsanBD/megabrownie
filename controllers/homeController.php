<?php
namespace Controllers;
use \Core\Controller;
use \Models\Produto;

class HomeController extends Controller{
	public function index(){
		$dados = array();
		$this->titulo = "Página Inicial";

		$produtos = new Produto();
		$listaProdutos = $produtos->listaProdutos();

		$dados['listaProdutos'] = $listaProdutos;
		$this->loadTemplate('home', $dados);
	}
}