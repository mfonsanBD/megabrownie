<?php
    if (empty($_SESSION['logado'])) {
        header("Location: ".URL_BASE."sair/");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
	<meta name="description" content="<?=NOME_DO_SITE?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= NOME_DO_SITE ?> :: <?=$this->titulo;?></title>
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
    <link rel="stylesheet" href="<?=URL_BASE?>app/assets/vendors/css/base/bootstrap.min.css">
    <link rel="stylesheet" href="<?=URL_BASE?>app/assets/vendors/css/base/elisyam-1.5.min.css">
    <link rel="stylesheet" href="<?=URL_BASE?>app/assets/css/datatables/datatables.min.css">
    <link href="http://hayageek.github.io/jQuery-Upload-File/4.0.11/uploadfile.css" rel="stylesheet">
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
    <script src="<?=URL_BASE?>assets/js/paginas/pedidos.js"></script>
    <script src="<?=URL_BASE?>assets/js/paginas/clientes.js"></script>
    <script src="<?=URL_BASE?>assets/js/paginas/produtos.js"></script>
    <script src="<?=URL_BASE?>assets/js/paginas/blog.js"></script>
    <script src="<?=URL_BASE?>assets/js/paginas/painel-cliente.js"></script>
    <script src="<?=URL_BASE?>assets/js/ckeditor/ckeditor.js"></script>

    <script src="<?=URL_BASE?>app/assets/vendors/js/datatables/datatables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#tabela_produtos').dataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese-Brasil.json"
                },
                "order": [[ 0, "desc" ]]
            });
            $('#pagina_produtos').dataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese-Brasil.json"
                },
                "order": [[ 1, "desc" ]]
            });
            $('#tabela_mais_pedidos').dataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese-Brasil.json"
                },
                "order": [[ 1, "desc" ]]
            });
            $('#tabela_clientes').dataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese-Brasil.json"
                }
            });
            $('#tabela_blog').dataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese-Brasil.json"
                },
                "order": [[2, "desc" ]]
            });
            $('#pedidos_cliente').dataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese-Brasil.json"
                },
                "order": [[3, "desc" ]]
            });
            $('#endereco_cliente').dataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese-Brasil.json"
                }
            });
        });
    </script>
    <script>
        CKEDITOR.replace( 'texto_blog' );
        CKEDITOR.replace( 'edita_texto_blog' );
    </script>
    <script src="<?=URL_BASE?>app/assets/vendors/js/datatables/dataTables.buttons.min.js"></script>
    <script src="<?=URL_BASE?>app/assets/vendors/js/datatables/jszip.min.js"></script>
    <script src="<?=URL_BASE?>app/assets/vendors/js/datatables/buttons.html5.min.js"></script>
    <script src="<?=URL_BASE?>app/assets/vendors/js/datatables/pdfmake.min.js"></script>
    <script src="<?=URL_BASE?>app/assets/vendors/js/datatables/vfs_fonts.js"></script>
    <script src="<?=URL_BASE?>app/assets/vendors/js/datatables/buttons.print.min.js"></script>
    <script src="<?=URL_BASE?>app/assets/vendors/js/nicescroll/nicescroll.min.js"></script>
    <script src="<?=URL_BASE?>app/assets/vendors/js/app/app.min.js"></script>
    
    <script src="<?=URL_BASE?>assets/js/sweetalert.min.js"></script>
    <script src="<?=URL_BASE?>app/assets/js/components/tables/tables.js"></script>

    <script src="http://hayageek.github.io/jQuery-Upload-File/4.0.11/jquery.uploadfile.min.js"></script>
</body>
</html>