<?php
namespace Models;
use \Core\Model;

class Blog extends Model{
	public function listaNoticias(){
		$array = array();
		$sql = $this->conexao->prepare("SELECT * FROM blog");
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}
	public function excluirNoticia($id){
		$sql = $this->conexao->prepare("DELETE FROM blog WHERE idBlog = ?");
		$sql->execute(array($id));

		if ($sql->rowCount() > 0) {
			return true;
		}else{
			return false;
		}
	}
	public function adicionarPostagem($titulo, $texto, $nomeimagem){
		$sql = $this->conexao->prepare("INSERT INTO blog SET tituloBlog = ?, textoBlog = ?, dataBlog = NOW(), imagemBlog = ?");
		$sql->execute(array($titulo, $texto, $nomeimagem));

		if ($sql->rowCount() > 0) {
			return true;
		}else{
			return false;
		}
	}
	public function editaPostagem($titulo, $texto, $nomeimagem, $id){
		$sql = $this->conexao->prepare("UPDATE blog SET tituloBlog = ?, textoBlog = ?, imagemBlog = ? WHERE idBlog = ?");
		$sql->execute(array($titulo, $texto, $nomeimagem, $id));

		if ($sql->rowCount() > 0) {
			return true;
		}else{
			return false;
		}
	}
	public function listaDadosId($id){
		$array = array();
		$sql = $this->conexao->prepare("SELECT * FROM blog WHERE idBlog = ?");
		$sql->execute(array($id));

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array;
	}
}