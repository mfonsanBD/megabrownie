<div class="container-fluid no-padding h-100">
    <div class="row flex-row h-100 bg-white">
        <div class="col-xl-3 col-lg-5 col-md-5 col-sm-12 col-12 no-padding">
            <div class="elisyam-bg background-03">
                <div class="elisyam-overlay overlay-08"></div>
                <div class="authentication-col-content-2 mx-auto text-center">
                    <div class="logo-centered">
                        <a href="<?=URL_BASE?>">
                            <img src="<?=URL_BASE?>assets/img/logo.png" alt="logo">
                        </a>
                    </div>
                    <h1 class="text-uppercase">Faça Agora seu pedido</h1>
                    <span class="description mt-5">
                        Quer fazer seu pedido mas ainda não tem uma conta? 
                    </span>
                    <ul class="login-nav nav nav-tabs justify-content-center mt-2">
                        <li><a href="<?=URL_BASE?>cadastro/">Cadastre-se aqui</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-7 col-md-7 col-sm-12 col-12 my-auto no-padding">
            <div class="authentication-form-2 mx-auto">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane show active" id="singin" aria-labelledby="singin-tab">
                        <form method="POST" id="login" class="mb-5">
                            <div class="group material-input">
							    <input type="text" id="emailLogin">
							    <span class="highlight"></span>
							    <span class="bar"></span>
							    <label>E-mail</label>
                            </div>
                            <div class="group material-input">
							    <input type="password" id="senhaLogin">
							    <span class="highlight"></span>
							    <span class="bar"></span>
							    <label>Senha</label>
                            </div>
                            <input type="hidden" id="csrf_token" value="<?=$csrf_token?>">
                            <button type="submit" class="btn btn-lg btn-gradient-01">Acessar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>