<?php
require 'ambiente.php';

define("NOME_DO_SITE", 'Mega Brownie');

$config = array();
if (AMBIENTE == 'desenvolvimento') {
	define("URL_BASE", 'http://localhost/megabrownie/');
	$config['banco'] 		= 'megabrownie';
	$config['host'] 		= 'localhost';
	$config['usuario'] 		= 'root';
	$config['senha'] 		= 'root';
}else{
	
}

global $conexao;

try {
	$conexao = new PDO("mysql:dbname=".$config['banco']."; host=".$config['host']."; charset=utf8", $config['usuario'], $config['senha']);
} catch (PDOException $e) {
	echo "Falha na conexão: ".$e->getMessage();
}