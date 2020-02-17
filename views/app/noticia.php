<div class="page db-modern">
    <header class="header">
        <div class="container">
            <nav class="navbar">
                <div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
                    <div class="navbar-header">
                        <a href="<?=URL_BASE?>painel/" class="navbar-brand">
                            <div class="brand-image brand-big">
                                <img src="<?=URL_BASE?>assets/img/logo.png" alt="logo" style="width: 100px;" class="logo-big">
                            </div>
                            <div class="brand-image brand-small">
                                <img src="<?=URL_BASE?>assets/img/logo.png" alt="logo" class="logo-small">
                            </div>
                        </a>
                    </div>
                    <div class="text-center">
                        <h1 class="text-white">Olá, <?=$this->nomeCliente;?></h1>
                        <span>Seja Bem Vindo! O que vamos pedir hoje?</span>
                    </div>
                    <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center pull-right">
                        <li>
                            <a rel="nofollow" href="<?=URL_BASE?>sair/" class="btn btn-danger logout text-center">
                                <i class="ti-power-off mr-0"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <div class="page-content mb-5">
        <div class="horizontal-menu">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-light navbar-expand-lg main-menu">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="<?=($this->titulo == "Painel de Controle") ? 'active' : ''?>">
                                    <a href="<?=URL_BASE?>painel/">Painel de Controle</a>
                                </li>
                                <li class="<?=($this->titulo == "Cardápio") ? 'active' : ''?>">
                                    <a href="<?=URL_BASE?>cardapio/">Cardápio</a>
                                </li>
                                <li class="<?=($this->titulo == "Notícias") ? 'active' : ''?>">
                                    <a href="<?=URL_BASE?>noticias/">Notícias</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
		<div class="container-fluid p-0">
		    <div class="col-lg-12 p-0">
		        <div class="imagem_noticia">
		            <img src="<?=URL_BASE.'assets/img/blog/'.$noticia['imagemBlog']?>" alt="<?=$noticia['tituloBlog']?>">
		        </div>
		    </div>
		</div>

		<div class="col-lg-6 mr-auto ml-auto p-5 titulo_noticia">
			<h1 class="text-white text-center text-uppercase"><?=$noticia['tituloBlog']?></h1>
			<p class="text-center mt-3 mb-0">
				<i class="la la-calendar"></i> 
				<span class="data_noticia"><?=date('d/m/Y', strtotime($noticia['dataBlog']))?></span>
			</p>
		</div>

		<div class="container texto_noticia">
			<?=$noticia['textoBlog']?>
		</div>
	</div>
	<footer class="main-footer fixed-bottom">
		<div class="container">
		    <div class="row">
		        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 d-flex align-items-center justify-content-xl-center justify-content-lg-center justify-content-md-center justify-content-center text-center">
		            <p class="text-gradient-02">&copy; Copyright 2019 - <?= date('Y'). " - ".NOME_DO_SITE?>. Todos os direitos reservados.</p>
		        </div>
		    </div>
		</div>
	</footer>
</div>