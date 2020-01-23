<?php
class pedidosController extends admin{
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