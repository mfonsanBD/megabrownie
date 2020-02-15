<?php
namespace Controllers;
use \Core\Admin;
use \Models\Blog;

class BlogController extends Admin{
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
			$dados = $blog->listaDadosId($id);

			$pasta = getcwd().'/assets/img/blog/';
			$pasta = str_replace('\\', '/', $pasta);

			unlink($pasta.$dados['imagemBlog']);

			if ($blog->excluirNoticia($id)) {
				echo 1;
			}
			else{
				echo 0;
			}
		}
	}
	public function editaPostagem(){
		if (isset($_POST) && !empty($_POST)) {
			$id 				= $_POST['id'];
			$titulo_antigo 		= addslashes(trim($_POST['titulo_antigo']));
			$texto_antigo 		= addslashes(trim($_POST['texto_antigo']));
			$novo_titulo 		= addslashes(trim($_POST['novo_titulo']));
			$novo_texto 		= addslashes(trim($_POST['novo_texto']));
			$novo_nome_imagem 	= md5(rand(0, 99999).date("d/m/Y H:i:s")).".jpg";

			if (($titulo_antigo == $novo_titulo) && ($texto_antigo == $novo_texto) && ($_POST['imagem_antiga'] != "")){
				echo 4;
			}else if(($titulo_antigo != $novo_titulo) || ($texto_antigo != $novo_texto)){
				$imagem_antiga = $_POST['imagem_antiga'];

				$blog = new Blog();
				if ($blog->editaPostagem($novo_titulo, $novo_texto, $imagem_antiga, $id)) {
					echo 1;
				}else{
					echo 0;
				}
			}else if(($_POST['imagem_antiga'] == "")){
				$nova_imagem 		= $_FILES['nova_imagem'];

				$permitidos 		= array("image/png", "image/jpg", "image/jpeg");
				$caminho 			= "assets/img/blog";

				if (in_array($nova_imagem['type'], $permitidos)) {
					if ($nova_imagem['size'] <= 2*1048576) {
						if (is_dir($caminho)) {
							move_uploaded_file($nova_imagem['tmp_name'], "assets/img/blog/".$novo_nome_imagem);
						}else{
							mkdir($caminho);
							move_uploaded_file($nova_imagem['tmp_name'], "assets/img/blog/".$novo_nome_imagem);
						}

						$blog = new Blog();
						if ($blog->editaPostagem($titulo_antigo, $texto_antigo, $novo_nome_imagem, $id)) {
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
	}
	public function listaDadosId(){
		if (isset($_POST) && !empty($_POST)) {
			$id = addslashes(trim($_POST['id']));

			$blog = new Blog();
			$dados = $blog->listaDadosId($id);

			$array = array(
				'titulo' => $dados['tituloBlog'],
				'texto' => $dados['textoBlog'],
				'imagem' => $dados['imagemBlog'],
				'url_principal' => URL_BASE
			);

			echo json_encode($array);
		}
	}
}