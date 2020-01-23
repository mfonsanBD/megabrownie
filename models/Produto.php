<?php
class Produto extends model{
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
}