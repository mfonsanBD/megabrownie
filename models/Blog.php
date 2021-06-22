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
	public function listaNoticia($slug){
		$array = array();
		$sql = $this->conexao->prepare("SELECT * FROM blog WHERE slug = ?");
		$sql->execute(array($slug));

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
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
	public function adicionarPostagem($titulo, $texto, $nomeimagem, $slug){
		$sql = $this->conexao->prepare("INSERT INTO blog SET tituloBlog = ?, textoBlog = ?, dataBlog = NOW(), imagemBlog = ?, slug = ?");
		$sql->execute(array($titulo, $texto, $nomeimagem, $slug));

		if ($sql->rowCount() > 0) {
			return true;
		}else{
			return false;
		}
	}
	public function enviarFoto($nomeArquivo, $id){
		$sql = $this->conexao->prepare("UPDATE blog SET imagemBlog = ? WHERE idBlog = ?");
		$sql->execute(array($nomeArquivo, $id));

		if ($sql->rowCount() > 0) {
			return true;
		}else{
			return false;
		}
	}
	public function editaPostagem($titulo, $texto, $slug, $id){
		$sql = $this->conexao->prepare("UPDATE blog SET tituloBlog = ?, textoBlog = ?, slug = ? WHERE idBlog = ?");
		$sql->execute(array($titulo, $texto, $slug, $id));

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
	public function verificaSlug($slug){
		$array = array();
		$sql = $this->conexao->prepare("SELECT COUNT(*) AS quantidadeDeSlug FROM blog WHERE slug LIKE '".$slug."%'");
		$sql->execute(array($slug));

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array['quantidadeDeSlug'];
	}
}