<?php
class admin{
	public function loadView($viewNome, $dados = array()){
		extract($dados);
		require 'views/app/'.$viewNome.'.php';
	}
	public function loadTemplate($viewNome, $dados = array()){
		require 'views/app/admin/suporte/template.php';
	}
	public function loadViewInTemplate($viewNome, $dados = array()){
		extract($dados);
		require 'views/app/'.$viewNome.'.php';
	}
}