urlSite = window.location.href;
$(document).ready(function(){
	$("#login").submit(function(e){
		e.preventDefault();
		var emailLogin = $('#emailLogin').val();
		var senhaLogin = $('#senhaLogin').val();
		
		if (emailLogin == "" && senhaLogin == "") {
			swal({
				title: "Aviso!",
				text: "Todos os campos são obrigatório.",
				icon: "warning",
				buttons: {
					confirm: {
					    text: "Ok, vou corrigir!",
					    value: true,
					    visible: true,
					    className: "bg-warning",
					    closeModal: true
					}
				}
			});
		}
		else if(emailLogin == "") {
			swal({
				title: "Aviso!",
				text: "O campo E-MAIL é obrigatório.",
				icon: "warning",
				buttons: {
					confirm: {
					    text: "Ok, vou corrigir!",
					    value: true,
					    visible: true,
					    className: "bg-warning",
					    closeModal: true
					}
				}
			});
		}
		else if(senhaLogin == "") {
			swal({
				title: "Aviso!",
				text: "O campo SENHA é obrigatório.",
				icon: "warning",
				buttons: {
					confirm: {
					    text: "Ok, vou corrigir!",
					    value: true,
					    visible: true,
					    className: "bg-warning",
					    closeModal: true
					}
				}
			});
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
												swal({
													title: "Parabéns!", 
													text: "Login realizado com sucesso.",
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
											}else{
												swal({
													title: "Erro!",
													text: "Não foi possível fazer login. Tente novamente em alguns minutos.",
													icon: "danger",
													buttons: {
														confirm: {
														    text: "Ok, vou corrigir!",
														    value: true,
														    visible: true,
														    className: "bg-warning",
														    closeModal: true
														}
													}
												});
											}
										}
									});
								}else{
									swal({
										title: "Aviso!",
										text: "Senha incorreta.",
										icon: "warning",
										buttons: {
											confirm: {
											    text: "Ok, vou corrigir!",
											    value: true,
											    visible: true,
											    className: "bg-warning",
											    closeModal: true
											}
										}
									});
								}
							}
						});
					}else{
						swal({
							title: "Aviso!",
							text: "E-mail incorreto.",
							icon: "warning",
							buttons: {
								confirm: {
								    text: "Ok, vou corrigir!",
								    value: true,
								    visible: true,
								    className: "bg-warning",
								    closeModal: true
								}
							}
						});
					}
				}
			});
		}
	});
});