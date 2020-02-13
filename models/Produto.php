<?php
namespace Models;
use \Core\Model;

class Produto extends Model{
	public function listaProdutos(){
		$array = array();
		$sql = $this->conexao->prepare("SELECT * FROM produto");
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}
	public function adicionarProduto($nome, $descricao, $tipo, $sabor, $valor){
		$sql = $this->conexao->prepare("INSERT INTO produto SET nomeProduto = ?, descricaoProduto = ?, tipoProduto = ?, sabor = ?, precoUnd = ?");
		$sql->execute(array($nome, $descricao, $tipo, $sabor, $valor));

		if ($sql->rowCount() > 0) {
			return true;
		}else{
			return false;
		}
	}
	public function excluirProduto($id){
		$sql = $this->conexao->prepare("DELETE FROM produto WHERE idProduto = ?");
		$sql->execute(array($id));

		if ($sql->rowCount() > 0) {
			return true;
		}else{
			return false;
		}
	}
	public function enviarFoto($nomeArquivo, $id){
		$sql = $this->conexao->prepare("UPDATE produto SET fotoProduto = ? WHERE idProduto = ?");
		$sql->execute(array($nomeArquivo, $id));

		if ($sql->rowCount() > 0) {
			return true;
		}else{
			return false;
		}
	}
	public function editarProduto($nome, $descricao, $tipo, $sabor, $valor, $id){
		$sql = $this->conexao->prepare("UPDATE produto SET nomeProduto = ?, descricaoProduto = ?, tipoProduto = ?, sabor = ?, precoUnd = ? WHERE idProduto = ?");
		$sql->execute(array($nome, $descricao, $tipo, $sabor, $valor, $id));

		if ($sql->rowCount() > 0) {
			return true;
		}else{
			return false;
		}
	}
}