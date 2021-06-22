<?php
namespace Controllers;
use \Core\Admin;
use \Models\Blog;
use \Models\Cliente;

class BlogController extends Admin{
	public function index(){
		$dados = array();

		switch ($_SESSION['tipo']) {
			case 0:
				$this->titulo = "Blog";

				$noticias = new Blog();
				$listaNoticias 			= $noticias->listaNoticias();

				$dados['listaNoticias'] = $listaNoticias;

				$this->loadTemplate('admin/blog', $dados);
			break;

			case 1:
				$this->titulo = "Notícias";

				$id = $_SESSION['logado'];
				
				$cliente = new Cliente();
				$infoCLiente = $cliente->info($id);

				$this->nomeCliente = $infoCLiente['nomeCliente']." ".$infoCLiente['sobrenomeCliente'];
				
				$noticias = new Blog();
				$listaNoticias 			= $noticias->listaNoticias();

				$dados['listaNoticias'] = $listaNoticias;

				$this->loadTemplate('cliente/blog', $dados);
			break;

			default:
				header("Location: ".URL_BASE."sair/");
			break;
		}
	}
	public function adicionarPostagem(){
		if (isset($_POST) && !empty($_POST)) {
			$titulo 	= addslashes(trim($_POST['titulo']));
			$texto 		= addslashes(trim($_POST['texto']));
			$slug 		= addslashes(trim($_POST['slug']));
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
					if ($blog->adicionarPostagem($titulo, $texto, $nomeimagem, $slug)) {
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
			$id 						= $_POST['id'];
			$titulo 				= addslashes(trim($_POST['titulo']));
			$texto 					= addslashes(trim($_POST['texto']));
			$slug 					= addslashes(trim($_POST['slug']));

			$blog = new Blog();
			if ($blog->editaPostagem($titulo, $texto, $slug, $id)) {
				echo 1;
			}else{
				echo 0;
			}
		}
	}
	public function enviarFoto(){
		if (isset($_FILES['fotoNoticia'])) {
			$id = $_POST['idNoticia'];
			$arquivo = $_FILES['fotoNoticia'];
			$nomeArquivo = md5($id).".jpg";

			$permitidos = array("image/png", "image/jpg", "image/jpeg");
			$caminho = "assets/img/blog";

			if (in_array($arquivo['type'], $permitidos)) {
				if ($arquivo['size'] <= 2*1048576) {
					if (is_dir($caminho)) {
						move_uploaded_file($arquivo['tmp_name'], "assets/img/blog/".$nomeArquivo);
					}else{
						mkdir($caminho);
						move_uploaded_file($arquivo['tmp_name'], "assets/img/blog/".$nomeArquivo);
					}
					
					$blog = new Blog();
					if ($blog->enviarFoto($nomeArquivo, $id)) {
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
	public function listaDadosId(){
		if (isset($_POST) && !empty($_POST)) {
			$id = addslashes(trim($_POST['id']));

			$blog = new Blog();
			$dados = $blog->listaDadosId($id);

			$array = array(
				'titulo' => $dados['tituloBlog'],
				'texto' => $dados['textoBlog'],
				'imagem' => $dados['imagemBlog'],
				'slug' => $dados['slug'],
				'url_principal' => URL_BASE
			);

			echo json_encode($array);
		}
	}
	public function verificaSlug(){
		if (isset($_POST) && !empty($_POST)) {
			$slug = addslashes(trim($_POST['slug']));

			$blog = new Blog();
			$dados = $blog->verificaSlug($slug);

			echo $dados;
		}
	}
}