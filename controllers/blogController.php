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
}