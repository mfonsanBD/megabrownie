<?php
class Cliente extends model{
	public function logar($email, $senha){
		$sql = $this->conexao->prepare("SELECT * FROM cliente WHERE emailCliente = ? AND senhaCliente = ?");
		$sql->execute(array($email, $senha));

		if ($sql->rowCount() > 0) {
			$dados = $sql->fetch();
			$_SESSION['logado'] 	= $dados['idCliente'];
			$_SESSION['tipo'] 		= $dados['tipoCliente'];
			return true;
		}else{
			return false;
		}
	}
	public function verificaEmail($email){
		$sql = $this->conexao->prepare("SELECT * FROM cliente WHERE emailCliente = ?");
		$sql->execute(array($email));

		if ($sql->rowCount() > 0) {
			return true;
		}else{
			return false;
		}
	}
	public function verificaSenha($email, $senha){
		$sql = $this->conexao->prepare("SELECT * FROM cliente WHERE emailCliente = ? AND senhaCliente = ?");
		$sql->execute(array($email, $senha));

		if ($sql->rowCount() > 0) {
			return true;
		}else{
			return false;
		}
	}
	public function cadastrar($nome, $sobrenome, $telefone, $whatsapp, $email, $senha){
		$sql = $this->conexao->prepare("INSERT INTO cliente SET nomeCliente = ?, sobrenomeCliente = ?, telefoneCliente = ?, whatsappCliente = ?, emailCliente = ?, senhaCliente = ?");
		$sql->execute(array($nome, $sobrenome, $telefone, $whatsapp, $email, $senha));

		if ($sql->rowCount() > 0) {
			return true;
		}
		else{
			return false;
		}
	}
	public function qtdClientes(){
		$array = array();
		$sql = $this->conexao->prepare("SELECT COUNT(*) AS c FROM cliente");
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array['c'];
	}
	public function listaClientes(){
		$array = array();
		$sql = $this->conexao->prepare("SELECT * FROM cliente WHERE tipoCliente = 1");
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}
	public function info($id){
		$array = array();
		$sql = $this->conexao->prepare("SELECT * FROM cliente WHERE idCliente = ?");
		$sql->execute(array($id));

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array;
	}
	public function excluiCliente($id){
		$sql = $this->conexao->prepare("DELETE FROM cliente WHERE idCliente = ?");
		$sql->execute(array($id));

		if ($sql->rowCount() > 0) {
			return true;
		}else{
			return false;
		}
	}
}