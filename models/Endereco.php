<?php
namespace Models;
use \Core\Model;

class Endereco extends Model{
	public function listaEnderecosCliente($id){
		$array = array();
		$sql = $this->conexao->prepare("SELECT * FROM endereco WHERE clienteId = ?");
		$sql->execute(array($id));

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function addEndereco($clienteId, $logradouro, $numero, $complemento, $pontoDeReferencia, $bairro, $cidade){
		$sql = $this->conexao->prepare("INSERT INTO endereco SET clienteId = ?, logradouro = ?, numero = ?, complemento = ?, referencia = ?, bairro = ?, cidade = ?");
		$sql->execute(array($clienteId, $logradouro, $numero, $complemento, $pontoDeReferencia, $bairro, $cidade));

		if ($sql->rowCount() > 0) {
			return true;
		}else{
			return false;
		}
	}
}