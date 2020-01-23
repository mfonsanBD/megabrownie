<?php
class cadastroController extends app{
	public function index(){
		$dados = array();
		$this->titulo = "Cadastro";
		$this->loadTemplate('cadastro', $dados);
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
	public function cadastrar(){
		$cliente = new Cliente();
		if (isset($_POST) && !empty($_POST)) {
			$nome 			= addslashes(trim($_POST['nome']));
			$sobrenome 		= addslashes(trim($_POST['sobrenome']));
			$telefone 		= addslashes($_POST['telefone']);
			$whatsapp 		= addslashes($_POST['whatsapp']);
			$email 			= addslashes(trim($_POST['email']));
			$senha			= addslashes(md5($_POST['senha']));

			if ($cliente->cadastrar($nome, $sobrenome, $telefone, $whatsapp, $email, $senha)) {
				echo 1;
			}else{
				echo 0;
			}
		}
	}
	public function principal(){
		echo URL_BASE;
	}
}