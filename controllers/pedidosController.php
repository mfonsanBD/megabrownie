<?php
namespace Controllers;
use \Core\Admin;
use \Models\Pedido;

class PedidosController extends Admin{
	public function index(){
		$dados = array();
		$this->titulo = "Pedidos";
		switch ($_SESSION['tipo']) {
			case 0:
				$pedidos 				= new Pedido();
				$listaPedidos 			= $pedidos->listaPedidos();
				$dados['listaPedidos']	= $listaPedidos;
				$this->loadTemplate('admin/pedidos', $dados);
			break;
			case 1:
				$pedidos 				= new Pedido();
				$id 					= $_SESSION['logado'];
				$listaPedidos 			= $pedidos->listaPedidosCliente($id);
				$dados['listaPedidos']	= $listaPedidos;
				$this->loadTemplate('cliente/pedidos', $dados);
			break;
			default:
				header("Location: ".URL_BASE."login/");
			break;
		}
	}
	public function mudaStatus(){
		if (isset($_POST) && !empty($_POST)) {
			$id = $_POST['id'];
			$status = addslashes($_POST['status']);

			$pedido = new Pedido();

			if ($pedido->mudaStatus($status, $id)) {
				echo 1;
			}else{
				echo 0;
			}
		}
	}
}