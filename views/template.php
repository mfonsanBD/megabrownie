<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
	<meta name="description" content="<?=NOME_DO_SITE?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= NOME_DO_SITE ?> :: <?=$this->titulo;?></title>
    <link rel="shortcut icon" href="<?=URL_BASE?>assets/img/favicon.png" />

	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
	<!--
	CSS
	============================================= -->
	<link rel="stylesheet" href="<?=URL_BASE?>assets/css/linearicons.css">
	<link rel="stylesheet" href="<?=URL_BASE?>assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=URL_BASE?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?=URL_BASE?>assets/css/magnific-popup.css">
	<link rel="stylesheet" href="<?=URL_BASE?>assets/css/nice-select.css">					
	<link rel="stylesheet" href="<?=URL_BASE?>assets/css/animate.min.css">
	<link rel="stylesheet" href="<?=URL_BASE?>assets/css/owl.carousel.css">
	<link rel="stylesheet" href="<?=URL_BASE?>assets/css/main.css">
</head>
<body>

<?php
	$this->loadViewInTemplate($viewNome, $dados);
?>

<script src="<?=URL_BASE?>assets/js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="<?=URL_BASE?>assets/js/vendor/bootstrap.min.js"></script>			
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
	<script src="<?=URL_BASE?>assets/js/easing.min.js"></script>
<script src="<?=URL_BASE?>assets/js/hoverIntent.js"></script>
<script src="<?=URL_BASE?>assets/js/superfish.min.js"></script>
<script src="<?=URL_BASE?>assets/js/jquery.ajaxchimp.min.js"></script>
<script src="<?=URL_BASE?>assets/js/jquery.magnific-popup.min.js"></script>
<script src="<?=URL_BASE?>assets/js/owl.carousel.min.js"></script>
<script src="<?=URL_BASE?>assets/js/jquery.sticky.js"></script>
<script src="<?=URL_BASE?>assets/js/jquery.nice-select.min.js"></script>
<script src="<?=URL_BASE?>assets/js/parallax.min.js"></script>
<script src="<?=URL_BASE?>assets/js/waypoints.min.js"></script>
<script src="<?=URL_BASE?>assets/js/jquery.counterup.min.js"></script>
<script src="<?=URL_BASE?>assets/js/mail-script.js"></script>
<script src="<?=URL_BASE?>assets/js/main.js"></script>
</body>
</html>