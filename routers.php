<?php
global $routers;
$routers = array();

$routers['/sair/'] 	= '/login/sair/';
$routers['/noticias/'] 	= '/blog/index/';
$routers['/cardapio/'] 	= '/produtos/index/';

$routers['/painel/'] 	= '/painel/index/';
$routers['/login/'] 	= '/login/index/';
$routers['/cadastro/'] 	= '/cadastro/index/';
$routers['/pedidos/'] 	= '/pedidos/index/';
$routers['/clientes/'] 	= '/clientes/index/';
$routers['/produtos/'] 	= '/produtos/index/';
$routers['/blog/'] 		= '/blog/index/';

$routers['/{slug}/']	= '/login/noticia/:slug';