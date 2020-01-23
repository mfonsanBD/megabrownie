<?php
class painelController extends admin{
	public function index(){
		if (empty($_SESSION['logado'])) {
			header("Location: ".URL_BASE."login/");
			exit();
		}
		$dados = array();
		$this->titulo = "Painel de Controle";
		switch ($_SESSION['tipo']) {
			case 0:
				$pedidos 							= new Pedido();
				$qtdPedidos 						= $pedidos->qtdPedidos();
				$qtdPedidosPendentes 				= $pedidos->qtdPedidosPendentes();
				$qtdPedidosEntregues 				= $pedidos->qtdPedidosEntregues();
				$listaPedidos						= $pedidos->listaPedidos();

				$clientesComMaisPedidos				= $pedidos->maisPedidos();

				$clientes 							= new Cliente();
				$qtdClientes 						= $clientes->qtdClientes();

				$dados['qtdPedidos'] 				= $qtdPedidos;
				$dados['qtdPedidosPendentes'] 		= $qtdPedidosPendentes;
				$dados['qtdPedidosEntregues'] 		= $qtdPedidosEntregues;
				$dados['listaPedidos'] 				= $listaPedidos;

				$dados['clientesComMaisPedidos'] 	= $clientesComMaisPedidos;
				
				$dados['qtdClientes'] 				= $qtdClientes;
				$this->loadTemplate('admin/painel', $dados);
			break;
			case 1:
				$this->loadTemplate('cliente/painel', $dados);
			break;
			default:
				header("Locatoin: ".URL_BASE."login/");
			break;
		}
	}
}