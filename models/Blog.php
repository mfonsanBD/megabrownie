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
}