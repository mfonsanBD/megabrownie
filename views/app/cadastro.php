<div class="container-fluid no-padding h-100">
    <div class="row flex-row h-100 bg-white">
        <!-- Begin Left Content -->
        <div class="col-xl-3 col-lg-5 col-md-5 col-sm-12 col-12 no-padding">
            <div class="elisyam-bg background-03">
                <div class="elisyam-overlay overlay-08"></div>
                <div class="authentication-col-content-2 mx-auto text-center">
                    <div class="logo-centered">
                        <a href="<?=URL_BASE?>">
                            <img src="<?=URL_BASE?>assets/img/logo.png" alt="logo">
                        </a>
                    </div>
                    <h1 class="text-uppercase">Já tem uma conta?</h1>
                    <span class="description mt-5">
                        Clique no link abaixo e acesse sua conta. 
                    </span>
                    <ul class="login-nav nav nav-tabs justify-content-center mt-2">
                        <li><a href="<?=URL_BASE?>login/">Entrar</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-7 col-md-7 col-sm-12 col-12 my-auto no-padding">
            <div class="container">
                <div class="widget">
                    <div class="widget-body">
                        <form class="needs-validation" id="cadastro" novalidate>
                            <div class="col-lg-6 offset-lg-3 text-center section-title mb-5">
                                <h3>Informações Gerais</h3>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-3">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Nome *</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" id="nome" placeholder="Digite seu nome">
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-3">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Sobrenome *</label>
                                <div class="col-lg-5">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="sobrenome" placeholder="Digite seu e-mail">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-3">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Telefone *</label>
                                <div class="col-lg-5">
                                    <div class="input-group">
                                        <input type="text" class="form-control telefone" id="telefone" placeholder="Digite seu número de telefone">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col-lg-6 offset-lg-4">
                                    <div class="custom-control custom-checkbox styled-checkbox">
                                        <input class="custom-control-input" type="checkbox" name="checkbox" id="check">
                                        <label class="custom-control-descfeedback" for="check">O número de telefone acima é o mesmo do WhatsApp.</label>
                                    </div>
                                </div>
                            </div>
                            <div id="wpp" class="form-group row align-items-center mb-3 d-flex">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">WhatsApp</label>
                                <div class="col-lg-5">
                                    <div class="input-group">
                                        <input type="text" class="form-control telefone" id="whatsapp" placeholder="Digite seu número do WhatsApp">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 offset-lg-3 text-center section-title mt-5 mb-5">
                                <h3>Informações da Conta</h3>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-3">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">E-mail *</label>
                                <div class="col-lg-5">
                                    <div class="input-group">
                                        <input type="email" class="form-control" id="email" placeholder="Digite seu e-mail">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-3">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Senha *</label>
                                <div class="col-lg-5">
                                    <input type="password" class="form-control" id="senha" placeholder="Digite sua senha">
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-3">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Confirmar Senha *</label>
                                <div class="col-lg-5">
                                    <input type="password" class="form-control" id="csenha" placeholder="Digite sua senha novamente">
                                </div>
                            </div>
                            <div class="em-separator separator-dashed"></div>
                            <div class="text-center">
                                <button class="btn btn-gradient-01" type="submit">Realizar Cadastro</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>