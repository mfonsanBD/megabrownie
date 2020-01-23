<?php
class app{
	public function loadView($viewNome, $dados = array()){
		extract($dados);
		require 'views/app/'.$viewNome.'.php';
	}
	public function loadTemplate($viewNome, $dados = array()){
		require 'views/app/template.php';
	}
	public function loadViewInTemplate($viewNome, $dados = array()){
		extract($dados);
		require 'views/app/'.$viewNome.'.php';
	}
}