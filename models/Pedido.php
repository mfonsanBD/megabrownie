<?php
class Pedido extends model{
	public function qtdPedidos(){
		$array = array();
		$sql = $this->conexao->prepare("SELECT COUNT(*) AS p FROM pedido");
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array['p'];
	}
	public function qtdPedidosPendentes(){
		$array = array();
		$sql = $this->conexao->prepare("SELECT COUNT(*) AS pp FROM pedido WHERE estado = 0");
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array['pp'];
	}
	public function qtdPedidosEntregues(){
		$array = array();
		$sql = $this->conexao->prepare("SELECT COUNT(*) AS pe FROM pedido WHERE estado = 3");
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array['pe'];
	}
	public function listaPedidos(){
		$array = array();
		$sql = $this->conexao->prepare("
			SELECT pe.*, cl.*, pr.*, en.* 
			FROM pedido AS pe
			INNER JOIN cliente AS cl ON (pe.clienteId = cl.idCliente)
			INNER JOIN produto AS pr ON (pe.produtoId = pr.idProduto)
			INNER JOIN endereco AS en ON (pe.enderecoId = en.idEndereco)
			ORDER BY pe.dataPedido DESC
		");
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}
	public function maisPedidos(){
		$array = array();
		$sql = $this->conexao->prepare("
			SELECT cliente.nomeCliente nome, cliente.sobrenomeCliente sobrenome,
			SUM(pedido.total) total, COUNT(pedido.idPedido) pedidos 
			FROM pedido JOIN cliente
			ON cliente.idCliente = pedido.clienteId
			GROUP BY cliente.idCliente
			ORDER BY pedidos ASC
		");
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}
	public function mudaStatus($status, $id){
		$sql = $this->conexao->prepare("UPDATE pedido SET estado = ? WHERE idPedido = ?");
		$sql->execute(array($status, $id));

		if ($sql->rowCount() > 0) {
			return true;
		}else{
			return false;
		}
	}
}