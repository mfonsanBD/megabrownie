<?php
namespace Controllers;
use \Core\Admin;
use \Models\Cliente;
use \Models\Pedido;
use \Models\Endereco;
use \Models\Produto;

class PainelController extends Admin{
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
				$id = $_SESSION['logado'];
				
				$cliente = new Cliente();
				$infoCLiente = $cliente->info($id);

				$this->nomeCliente = $infoCLiente['nomeCliente']." ".$infoCLiente['sobrenomeCliente'];

				$pedidos 							= new Pedido();

				$listaPedidos 						= $pedidos->listaPedidosCliente($id);
				$dados['listaPedidos']				= $listaPedidos;

				$qtdPedidos 						= $pedidos->qtdPedidosCliente($id);
				$dados['qtdPedidos'] 				= $qtdPedidos;

				$qtdPedidosPendentes 				= $pedidos->qtdPedidosPendentesCliente($id);
				$dados['qtdPedidosPendentes'] 		= $qtdPedidosPendentes;

				$qtdPedidosEmPreparo 				= $pedidos->qtdPedidosEmPreparoCliente($id);
				$dados['qtdPedidosEmPreparo'] 		= $qtdPedidosEmPreparo;
				
				$qtdPedidosEntregues 				= $pedidos->qtdPedidosEntreguesCliente($id);
				$dados['qtdPedidosEntregues'] 		= $qtdPedidosEntregues;

				$enderecos 							= new Endereco();

				$listaEnderecos 					= $enderecos->listaEnderecosCliente($id);
				$dados['listaEnderecos']			= $listaEnderecos;

				$produtos 							= new Produto();
				$listaProdutos 						= $produtos->listaProdutos();
				$dados['listaProdutos'] 			= $listaProdutos;

				$this->loadTemplate('cliente/painel', $dados);
			break;
			default:
				header("Location: ".URL_BASE."login/");
			break;
		}
	}
	public function meuPedido(){
		if (isset($_POST) && !empty($_POST)) {
			$clienteId 		= $_SESSION['logado'];
			$enderecoId 	= addslashes(trim($_POST['endereco']));
			$produtoId 		= addslashes(trim($_POST['produtoId']));
			$qtdProduto 	= addslashes(trim($_POST['quantidade']));
			$total			= addslashes(trim($_POST['total']));

			$pedidos 		= new Pedido();

			if ($pedidos->addPedido($clienteId, $enderecoId, $produtoId, $qtdProduto, $total)) {
				echo 1;
			}else{
				echo 0;
			}
		}
	}
	public function cadastraEndereco(){
		if (isset($_POST) && !empty($_POST)) {
			$clienteId 					= $_SESSION['logado'];
			$logradouro 				= addslashes(trim($_POST['logradouro']));
			$numero 						= addslashes(trim($_POST['numero']));
			$complemento 				= addslashes(trim($_POST['complemento']));
			$pontoDeReferencia 	= addslashes(trim($_POST['pontoDeReferencia']));
			$bairro 						= addslashes(trim($_POST['bairro']));
			$cidade 						= addslashes(trim($_POST['cidade']));

			$endereco 					= new Endereco();

			if ($endereco->addEndereco($clienteId, $logradouro, $numero, $complemento, $pontoDeReferencia, $bairro, $cidade)) {
				echo 1;
			}else{
				echo 0;
			}
		}
	}
}