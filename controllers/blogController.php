<?php
class blogController extends admin{
	public function index(){
		$dados = array();
		$this->titulo = "Blog";

		$noticias = new Blog();
		$listaNoticias 			= $noticias->listaNoticias();

		$dados['listaNoticias'] = $listaNoticias;

		$this->loadTemplate('admin/blog', $dados);
	}
	public function adicionarPostagem(){
		if (isset($_POST) && !empty($_POST)) {
			$titulo 	= addslashes(trim($_POST['titulo']));
			$texto 		= addslashes(trim($_POST['texto']));
			$imagem 	= $_FILES['imagem'];
			$nomeimagem = md5(rand(0, 99999).date("d/m/Y H:i:s")).".jpg";
			
			$permitidos = array("image/png", "image/jpg", "image/jpeg");
			$caminho = "assets/img/blog";

			if (in_array($imagem['type'], $permitidos)) {
				if ($imagem['size'] <= 2*1048576) {
					if (is_dir($caminho)) {
						move_uploaded_file($imagem['tmp_name'], "assets/img/blog/".$nomeimagem);
					}else{
						mkdir($caminho);
						move_uploaded_file($imagem['tmp_name'], "assets/img/blog/".$nomeimagem);
					}
					
					$blog = new Blog();
					if ($blog->adicionarPostagem($titulo, $texto, $nomeimagem)) {
						echo 1;
					}else{
						echo 0;
					}
				}else{
					echo 3;
				}
			}else{
				echo 2;
			}
		}
	}
	public function excluirNoticia(){
		if (isset($_POST) && !empty($_POST)) {
			$id = addslashes(trim($_POST['id']));

			$blog = new Blog();

			if ($blog->excluirNoticia($id)) {
				echo 1;
			}
			else{
				echo 0;
			}
		}
	}
}