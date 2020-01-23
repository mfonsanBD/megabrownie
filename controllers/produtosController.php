<?php
class produtosController extends admin{
	public function index(){
		$dados = array();
		$this->titulo = "Produtos";

		$produtos = new Produto();
		$listaProdutos = $produtos->listaProdutos();

		$dados['listaProdutos'] = $listaProdutos;
		$this->loadTemplate('admin/produtos', $dados);
	}
	public function adicionarProduto(){
		if (isset($_POST) && !empty($_POST)) {
			$nome 		= addslashes(trim($_POST['nome']));
			$descricao 	= addslashes(trim($_POST['descricao']));
			$tipo 		= addslashes(trim($_POST['tipo']));
			$sabor 		= addslashes(trim($_POST['sabor']));
			$valor		= addslashes(trim($_POST['valor']));

			$produtos = new Produto();

			if ($produtos->adicionarProduto($nome, $descricao, $tipo, $sabor, $valor)) {
				echo 1;
			}
			else{
				echo 0;
			}
		}
	}
	public function excluirProduto(){
		if (isset($_POST) && !empty($_POST)) {
			$id 		= addslashes(trim($_POST['id']));

			$produtos = new Produto();

			if ($produtos->excluirProduto($id)) {
				echo 1;
			}
			else{
				echo 0;
			}
		}
	}
	public function enviarFoto(){
		$id = $_POST['id'];
		/* Getting file name */
		$filename = $_FILES['file']['name'];
		$filename = md5(rand(0, 9999).$filename);

		echo $id." - ".$filename;

		// /* Location */
		// $location = BASE_URL."assets/img/produto/".$id."/".$filename;
		// $uploadOk = 1;
		// $imageFileType = pathinfo($location,PATHINFO_EXTENSION);

		// /* Valid Extensions */
		// $valid_extensions = array("jpg","jpeg","png");
		// /* Check file extension */
		// if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
		//    $uploadOk = 0;
		// }

		// if($uploadOk == 0){
		//    echo 0;
		// }else{
		//    /* Upload file */
		//    if(move_uploaded_file($_FILES['file']['tmp_name'], $location)){
		//       echo $location;
		//    }else{
		//       echo 0;
		//    }
		// }
	}
}