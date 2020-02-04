<?php
namespace Core;

class app{
	public function loadView($viewNome, $dados = array()){
		extract($dados);
		require 'Views/app/'.$viewNome.'.php';
	}
	public function loadTemplate($viewNome, $dados = array()){
		require 'Views/app/template.php';
	}
	public function loadViewInTemplate($viewNome, $dados = array()){
		extract($dados);
		require 'Views/app/'.$viewNome.'.php';
	}
}