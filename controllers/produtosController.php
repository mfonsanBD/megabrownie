<?php
namespace Controllers;
use \Core\Admin;
use \Models\Produto;
use \Models\Cliente;

class ProdutosController extends Admin{
	public function index(){
		$dados = array();

		switch ($_SESSION['tipo']) {
			case 0:
				$this->titulo = "Produtos";

				$produtos = new Produto();
				$listaProdutos = $produtos->listaProdutos();

				$dados['listaProdutos'] = $listaProdutos;
				$this->loadTemplate('admin/produtos', $dados);
			break;

			case 1:
				$this->titulo = "Cardápio";

				$id = $_SESSION['logado'];
				
				$cliente = new Cliente();
				$infoCLiente = $cliente->info($id);

				$this->nomeCliente = $infoCLiente['nomeCliente']." ".$infoCLiente['sobrenomeCliente'];
				
				$produtos = new Produto();
				$listaProdutos = $produtos->listaProdutos();

				$dados['listaProdutos'] = $listaProdutos;
				$this->loadTemplate('cliente/produtos', $dados);
			break;

			default:
				header("Location: ".URL_BASE."sair/");
			break;
		}
	}
	public function adicionarProduto(){
		if (isset($_POST) && !empty($_POST)) {
			$nome 		= addslashes(trim($_POST['nome']));
			$descricao 	= addslashes(trim($_POST['descricao']));
			$tipo 		= addslashes(trim($_POST['tipo']));
			$sabor 		= addslashes(trim($_POST['sabor']));
			$valor		= addslashes(trim($_POST['valor']));

			$produtos = new Produto();

			if ($produtos->adicionarProduto($nome, $descricao, $tipo, $sabor, $valor)) {
				echo 1;
			}
			else{
				echo 0;
			}
		}
	}
	public function excluirProduto(){
		if (isset($_POST) && !empty($_POST)) {
			$id 		= addslashes(trim($_POST['id']));

			$produtos = new Produto();

			if ($produtos->excluirProduto($id)) {
				echo 1;
			}
			else{
				echo 0;
			}
		}
	}
	public function enviarFoto(){
		if (isset($_FILES['fotoProduto'])) {
			$id = $_POST['idProduto'];
			$arquivo = $_FILES['fotoProduto'];
			$nomeArquivo = md5($id).".jpg";

			$permitidos = array("image/png", "image/jpg", "image/jpeg");
			$caminho = "assets/img/produto/".$id;

			if (in_array($arquivo['type'], $permitidos)) {
				if ($arquivo['size'] <= 2*1048576) {
					if (is_dir($caminho)) {
						move_uploaded_file($arquivo['tmp_name'], "assets/img/produto/".$id."/".$nomeArquivo);
					}else{
						mkdir($caminho);
						move_uploaded_file($arquivo['tmp_name'], "assets/img/produto/".$id."/".$nomeArquivo);
					}
					
					$produtos = new Produto();
					if ($produtos->enviarFoto($nomeArquivo, $id)) {
						echo 1;
					}else{
						echo 0;
					}
				}else{
					echo 3;
				}
			}else{
				echo 2;
			}
		}
	}
	public function editarProduto(){
		if (isset($_POST) && !empty($_POST)) {
			$id 		= $_POST['id'];
			$nome 		= addslashes(trim($_POST['nome']));
			$descricao 	= addslashes(trim($_POST['descricao']));
			$tipo 		= addslashes(trim($_POST['tipo']));
			$sabor 		= addslashes(trim($_POST['sabor']));
			$valor		= addslashes(trim($_POST['valor']));

			$produtos = new Produto();

			if ($produtos->editarProduto($nome, $descricao, $tipo, $sabor, $valor, $id)) {
				echo 1;
			}
			else{
				echo 0;
			}
		}
	}
}