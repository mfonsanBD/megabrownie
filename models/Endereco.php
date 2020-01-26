<?php
class Endereco extends model{
	public function listaEnderecosCliente($id){
		$array = array();
		$sql = $this->conexao->prepare("SELECT * FROM endereco WHERE clienteId = ?");
		$sql->execute(array($id));

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}
}