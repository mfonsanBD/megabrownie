<?php
require 'ambiente.php';

define("NOME_DO_SITE", 'Mega Brownie');

$config = array();
if (AMBIENTE == 'desenvolvimento') {
	define("URL_BASE", 'http://localhost/megabrownie/');
	$config['banco'] 		= 'megabrownie';
	$config['host'] 		= 'localhost';
	$config['usuario'] 		= 'root';
	$config['senha'] 		= '';
}else{
	define("URL_BASE", 'https://megabrownie.mikedev.com.br/');
	$config['banco'] 		= 'mikede94_megabrownie';
	$config['host'] 		= 'localhost:3306';
	$config['usuario'] 	= 'mikede94_megabro';
	$config['senha'] 		= 'MegaBrownie2021';
}

global $conexao;

try {
	$conexao = new PDO("mysql:dbname=".$config['banco']."; host=".$config['host']."; charset=utf8", $config['usuario'], $config['senha']);
} catch (PDOException $e) {
	echo "Falha na conexão: ".$e->getMessage();
}