<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
	<meta name="description" content="<?=NOME_DO_SITE?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= NOME_DO_SITE ?> :: <?=$this->titulo;?></title>
    <link rel="shortcut icon" href="<?=URL_BASE?>assets/img/favicon.png" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
    <script>
      WebFont.load({
        google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700"]},
        active: function() {
            sessionStorage.fonts = true;
        }
      });
    </script>
    
    <link rel="icon" type="image/png" href="<?=URL_BASE?>assets/img/favicon.png">
    
    <link rel="stylesheet" href="<?=URL_BASE?>assets/admin/vendors/css/base/bootstrap.min.css">
    <link rel="stylesheet" href="<?=URL_BASE?>assets/admin/vendors/css/base/elisyam-1.5.min.css">
    <link rel="stylesheet" href="<?=URL_BASE?>assets/admin/css/animate/animate.min.css">

    <link rel="stylesheet" href="<?=URL_BASE?>assets/admin/icons/ionicons/css/ionicons.css">
    <link rel="stylesheet" href="<?=URL_BASE?>assets/admin/icons/lineawesome/css/line-awesome.css">
    <link rel="stylesheet" href="<?=URL_BASE?>assets/admin/icons/meteocons/css/meteocons.css">
    <link rel="stylesheet" href="<?=URL_BASE?>assets/admin/icons/themify/css/themify-icons.css">
</head>
<body>
    <div id="preloader">
        <div class="canvas">
            <img src="<?=URL_BASE?>assets/img/logo.png" alt="logo" class="loader-logo">
            <div class="spinner"></div>   
        </div>
    </div>

	<?php
		$this->loadViewInTemplate($viewNome, $dados);
	?>
    
    <script src="<?=URL_BASE?>assets/admin/vendors/js/base/jquery.min.js"></script>
    <script src="<?=URL_BASE?>assets/admin/vendors/js/base/core.min.js"></script>
    <script src="<?=URL_BASE?>assets/js/jquery.mask.min.js"></script>

    <script src="<?=URL_BASE?>assets/admin/vendors/js/nicescroll/nicescroll.min.js"></script>
    <script src="<?=URL_BASE?>assets/admin/vendors/js/bootstrap-wizard/bootstrap.wizard.min.js"></script>
    <script src="<?=URL_BASE?>assets/admin/vendors/js/app/app.min.js"></script>

    <script src="<?=URL_BASE?>assets/js/sweetalert.min.js"></script>
    <script src="<?=URL_BASE?>assets/admin/js/components/wizard/form-wizard.min.js"></script>
    <script src="<?=URL_BASE?>assets/js/paginas/login.js"></script>
    <script src="<?=URL_BASE?>assets/js/paginas/cadastro.js"></script>
</body>
</html>