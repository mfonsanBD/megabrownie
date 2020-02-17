<?php
namespace Controllers;
use \Core\App;
use \Models\Blog;
use \Models\Cliente;

class LoginController extends App{
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
	public function sair(){
		unset($_SESSION['logado']);
		unset($_SESSION['tipo']);
		header("Location: ".URL_BASE."login/");
	}
	public function principal(){
		echo URL_BASE;
	}
	public function noticia($slug){
		$dados = array();

		switch ($_SESSION['tipo']) {
			case 0:
				$id = $_SESSION['logado'];
				
				$cliente = new Cliente();
				$infoCLiente = $cliente->info($id);

				$this->nomeCliente = $infoCLiente['nomeCliente']." ".$infoCLiente['sobrenomeCliente'];
				
				$noticias = new Blog();
				$blog = $noticias->listaNoticia($slug);

				$this->titulo = $blog['tituloBlog'];
				
				$dados['blog'] = $blog;
				$this->loadTemplate('blog', $dados);
			break;

			case 1:
				$id = $_SESSION['logado'];
				
				$cliente = new Cliente();
				$infoCLiente = $cliente->info($id);

				$this->nomeCliente = $infoCLiente['nomeCliente']." ".$infoCLiente['sobrenomeCliente'];

				$noticias = new Blog();
				$noticia = $noticias->listaNoticia($slug);

				$this->titulo = $noticia['tituloBlog'];
				
				$dados['noticia'] = $noticia;
				$this->loadTemplate('noticia', $dados);
			break;

			default:
				header("Location: ".URL_BASE."sair/");
			break;
		}
	}
}