<?php
class loginController extends app{
	public function index(){
		$dados = array();
		$this->titulo = "Login";
		$this->loadTemplate('login', $dados);
	}
	public function verificaEmail(){
		$cliente = new Cliente();
		if (isset($_POST) && !empty($_POST)) {
			$email = addslashes(trim($_POST['email']));

			if ($cliente->verificaEmail($email)) {
				echo 1;
			}else{
				echo 0;
			}
		}
	}
	public function verificaSenha(){
		$cliente = new Cliente();
		if (isset($_POST) && !empty($_POST)) {
			$email = addslashes(trim($_POST['email']));
			$senha = addslashes(trim(md5($_POST['senha'])));

			if ($cliente->verificaSenha($email, $senha)) {
				echo 1;
			}else{
				echo 0;
			}
		}
	}
	public function logar(){
		$cliente = new Cliente();
		if (isset($_POST) && !empty($_POST)) {
			$email = addslashes(trim($_POST['email']));
			$senha = addslashes(trim(md5($_POST['senha'])));

			if ($cliente->logar($email, $senha)) {
				echo 1;
			}else{
				echo 0;
			}
		}
	}
	public function cadastro(){
		$dados = array();
		$this->titulo = "Cadastro";
		$this->loadTemplate('cadastro', $dados);
	}
	public function sair(){
		unset($_SESSION['logado']);
		unset($_SESSION['tipo']);
		header("Location: ".URL_BASE."login/");
	}
	public function principal(){
		echo URL_BASE;
	}
}