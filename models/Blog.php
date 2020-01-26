<?php
class Blog extends model{
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
}