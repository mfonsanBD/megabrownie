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