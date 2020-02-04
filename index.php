<?php 
session_start();
require 'configuracao.php';
require 'routers.php';

require 'vendor/autoload.php';

$core = new Core\Core();
$core->run();