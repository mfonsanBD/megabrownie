<header id="header" id="home">
	<div class="header-top">
			<div class="container">
	  		<div class="row justify-content-end">
	  			<div class="col-lg-8 col-sm-4 col-8 header-top-right no-padding">
	  				<ul>
	  					<li>
	  						<img src="<?=URL_BASE?>assets/img/delivery.svg" width="30" alt="">
	  						Delivery:
	  					</li>
	  					<li>
	  						Seg-Sex: 9:00 às 17:00
	  					</li>
	  					<li>
	  						<a href="tel:(21) 98456-7458">(21) 90000-0000</a>
	  					</li>				  					
	  				</ul>
	  			</div>
	  		</div>			  					
			</div>
	</div>			  	
    <div class="container">
    	<div class="row align-items-center justify-content-between d-flex">
	      <div id="logo">
			<nav id="nav-menu-container">
				<ul class="nav-menu">
	        		<a href="#home"><img src="<?=URL_BASE?>assets/img/logo.png" alt="" width="100" title="" /></a>
	        	</ul>
	        </nav>
	      </div>
	      <nav id="nav-menu-container">
	        <ul class="nav-menu">
						<li class="menu-active"><a href="#home">Início</a></li>
						<li><a href="#about">Sobre Nós</a></li>
						<li><a href="#contato">Contato</a></li>
	        </ul>
	      </nav>		    		
    	</div>
    </div>
</header>

<section class="banner-area" id="home">	
	<div class="container">
		<div class="row fullscreen d-flex align-items-center justify-content-start">
			<div class="banner-content col-lg-7">
				<h6 class="text-white text-uppercase">Bateu aquela vontade louca de chocolate?</h6>
				<h1>Sempre é dia de Mega Brownie!</h1>
				<nav id="nav-menu-container">
					<ul class="nav-menu">
						<li>
							<a href="<?=URL_BASE.'cardapio/'?>" class="primary-btn text-uppercase">Fazer o meu Pedido</a>
						</li>
					</ul>
				</nav>
			</div>											
		</div>
	</div>
</section>

<section class="video-sec-area pb-100 pt-40" id="about">
	<div class="container">
		<div class="row justify-content-start align-items-center">
			<div class="col-lg-6 video-right justify-content-center align-items-center d-flex">
				<div class="overlay overlay-bg"></div>
				<a class="play-btn" href="https://www.youtube.com/watch?v=s3Bc-rSfcC4"><img class="img-fluid" src="<?=URL_BASE?>assets/img/play-icon.png" alt=""></a>
			</div>						
			<div class="col-lg-6 video-left">
				<h6>O que há por trás dos Brownies.</h6>
				<h1>Um pouco da nossa história</h1>
				<p><span>Tudo começou no ano de 2017</span></p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp or incididunt ut labore et dolore magna aliqua. Ut enim ad minim.</p>
			</div>
		</div>
	</div>	
</section>
<!-- End video-sec Area -->

<section class="contato-area section-gap" id="contato">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-60 col-lg-10">
				<div class="title text-center">
					<h1 class="mb-10">Entre em contato conosco</h1>
					<p>Ficaremos felizes em atender você!</p>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<form action="#">
							<div class="mt-10">
								<input type="text" name="nome" placeholder="Nome Completo" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nome Completo'" required class="single-input">
							</div>
							<div class="mt-10">
								<input type="email" name="email" placeholder="E-mail" onfocus="this.placeholder = ''" onblur="this.placeholder = 'E-mail'" required class="single-input">
							</div>	
							<div class="mt-10">
								<input type="text" name="assunto" placeholder="Assunto" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Assunto'" required class="single-input">
							</div>							
							<div class="mt-10">
								<textarea class="single-textarea" placeholder="Mensagem" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mensagem'" required></textarea>
							</div>
							<button type="submit" class="genric-btn primary radius mt-3">Enviar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>	
</section>
<!-- End blog Area -->
 
<!-- start footer Area -->		
<footer class="footer-area section-gap">
	<div class="container">
		<div class="row">
			<div class="col-lg-5 col-md-6 col-sm-6">
				<div class="single-footer-widget">
					<h6>Conheça-nos</h6>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.
					</p>
					<p class="footer-text">
						Copyright &copy; 2019 - <?=date('Y')." - ".NOME_DO_SITE?>. Todos os direitos reservados.
					</p>								
				</div>
			</div>
			<div class="col-lg-5  col-md-6 col-sm-6">
				<div class="single-footer-widget">
					<h6>Notícias</h6>
					<p>Quer receber notícias da nossa empresa?</p>
					<div class="" id="mc_embed_signup">
						<form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">
							<input class="form-control" name="email" placeholder="Digite seu e-mail" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Digite seu e-mail '" required="" type="email">
                            	<button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                            	<div style="position: absolute; left: -5000px;">
									<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
								</div>
							<div class="info pt-20"></div>
						</form>
					</div>
				</div>
			</div>						
			<div class="col-lg-2 col-md-6 col-sm-6 social-widget">
				<div class="single-footer-widget">
					<h6>Siga-nos</h6>
					<p>Acompanhe tudo nas Redes Sociais</p>
					<div class="footer-social d-flex align-items-center">
						<a href="https://www.facebook.com/MegaBrownie022/" target="_blank"><i class="fa fa-facebook"></i></a>
						<a href="https://www.instagram.com/megabrownie/" target="_blank"><i class="fa fa-instagram"></i></a>
						<a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
					</div>
				</div>
			</div>							
		</div>
	</div>
</footer>	
<!-- End footer Area -->