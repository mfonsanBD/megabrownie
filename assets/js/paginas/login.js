urlSite = window.location.href;
$(document).ready(function(){
	$("#login").submit(function(e){
		e.preventDefault();
		var emailLogin = $('#emailLogin').val();
		var senhaLogin = $('#senhaLogin').val();
		
		if (emailLogin == "" && senhaLogin == "") {
			alertaAviso("Todos os campos são obrigatório.");
		}
		else if(emailLogin == "") {
			alertaAviso("O campo E-MAIL é obrigatório.");
		}
		else if(senhaLogin == "") {
			alertaAviso("O campo SENHA é obrigatório.");
		}
		else{
			$.ajax({
				url: urlSite+'verificaEmail/',
				type: "POST",
				data: {email:emailLogin},
				success: function(dados){
					if (dados == 1) {
						$.ajax({
							url: urlSite+'verificaSenha/',
							type: "POST",
							data: {email:emailLogin, senha:senhaLogin},
							success: function(dados){
								if (dados == 1) {
									$.ajax({
										url: urlSite+'logar/',
										type: "POST",
										data: {email:emailLogin, senha:senhaLogin},
										beforeSend: function() {
									        $("#carregando").show();
									    },
										success: function(dados){
											if (dados == 1) {
												alertaSucessoLogin("Login realizado com sucesso.");
											}else{
												alertaErro("Não foi possível fazer login. Tente novamente em alguns minutos.");
											}
										}
									});
								}else{
									alertaAviso("Senha incorreta.");
								}
							}
						});
					}else{
						alertaAviso("E-mail incorreto.");
					}
				}
			});
		}
	});
});
function alertaSucessoLogin(texto){
	return swal({
		title: "Parabéns!", 
		text: texto,
		icon: "success",
		buttons: {
			confirm: {
			    text: "Ok",
			    value: true,
			    visible: true,
			    className: "bg-success",
			    closeModal: true
			}
		}
	})
	.then((resposta) => {
		$.ajax({
			url: urlSite+'principal/',
			success: function(dados){
				principal = dados;
				window.location.href = principal+'painel/';
			}
		});
	});
}
function alertaSucesso(texto){
	return swal({
		title: "Parabéns!", 
		text: texto,
		icon: "success",
		buttons: {
			confirm: {
			    text: "Ok",
			    value: true,
			    visible: true,
			    className: "bg-success",
			    closeModal: true
			}
		}
	})
	.then((resposta) => {
		window.location.reload();
	});
}
function alertaErro(texto){
	return swal({
		title: "Erro!", 
		text: texto,
		icon: "error",
		buttons: {
			confirm: {
			    text: "Ok",
			    value: true,
			    visible: true,
			    className: "bg-danger",
			    closeModal: true
			}
		}
	});
}
function alertaAviso(texto){
	return swal({
		title: "Aviso!", 
		text: texto,
		icon: "warning",
		buttons: {
			confirm: {
			    text: "Ok",
			    value: true,
			    visible: true,
			    className: "bg-warning",
			    closeModal: true
			}
		}
	});
}