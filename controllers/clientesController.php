<?php
namespace Controllers;
use \Core\Admin;
use \Models\Cliente;

class ClientesController extends Admin{
	public function index(){
		$dados = array();
		$this->titulo = "Clientes";

		$clientes = new Cliente();
		$listaClientes 			= $clientes->listaClientes();
		$qtdClientes 			= $clientes->qtdClientes();
		
		$dados['qtdClientes'] 	= $qtdClientes;	
		$dados['listaClientes'] = $listaClientes;
		$this->loadTemplate('admin/clientes', $dados);
	}
	public function excluiCliente(){
		if (isset($_POST) && !empty($_POST)) {
			$id = addslashes($_POST['id']);

			$clientes = new Cliente();

			if ($clientes->excluiCliente($id)) {
				echo 1;
			}else{
				echo 0;
			}
		}
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
}