urlSite = window.location.href;
$(document).ready(function(){
	$("#cadastro").submit(function(e){
		e.preventDefault();
		var nome 		= $("#nome").val();
		var sobrenome 	= $("#sobrenome").val();
		var telefone	= $("#telefone").val();
		var whatsapp 	= $("#whatsapp").val();
		var email		= $("#email").val();
		var senha		= $("#senha").val();
		var csenha		= $("#csenha").val();

		if (whatsapp == '') {
			whatsapp = telefone;
		}

		if(nome == ''){
			swal({
				title: "Atenção!",
				text: "O campo NOME é obrigatório.",
				icon: "warning",
				buttons: {
					confirm: {
					    text: "Ok!",
					    value: true,
					    visible: true,
					    className: "bg-warning",
					    closeModal: true
					}
				}
			});
		}
		else if(!isNaN(nome)){
			swal({
				title: "Atenção!",
				text: "O campo NOME não permite números.",
				icon: "warning",
				buttons: {
					confirm: {
					    text: "Ok!",
					    value: true,
					    visible: true,
					    className: "bg-warning",
					    closeModal: true
					}
				}
			});
		}
		else if(nome.length < 3){
			swal({
				title: "Atenção!",
				text: "O campo NOME deve conter pelo menos 3 caracteres.",
				icon: "warning",
				buttons: {
					confirm: {
					    text: "Ok!",
					    value: true,
					    visible: true,
					    className: "bg-warning",
					    closeModal: true
					}
				}
			});
		}
		else if(sobrenome == ''){
			swal({
				title: "Atenção!",
				text: "O campo SOBRENOME é obrigatório.",
				icon: "warning",
				buttons: {
					confirm: {
					    text: "Ok!",
					    value: true,
					    visible: true,
					    className: "bg-warning",
					    closeModal: true
					}
				}
			});
		}
		else if(!isNaN(sobrenome)){
			swal({
				title: "Atenção!",
				text: "O campo SOBRENOME não permite números.",
				icon: "warning",
				buttons: {
					confirm: {
					    text: "Ok!",
					    value: true,
					    visible: true,
					    className: "bg-warning",
					    closeModal: true
					}
				}
			});
		}
		else if(sobrenome.length < 3){
			swal({
				title: "Atenção!",
				text: "O campo SOBRENOME deve conter pelo menos 3 caracteres.",
				icon: "warning",
				buttons: {
					confirm: {
					    text: "Ok!",
					    value: true,
					    visible: true,
					    className: "bg-warning",
					    closeModal: true
					}
				}
			});
		}
		else if(telefone == ''){
			swal({
				title: "Atenção!",
				text: "O campo TELEFONE é obrigatório.",
				icon: "warning",
				buttons: {
					confirm: {
					    text: "Ok!",
					    value: true,
					    visible: true,
					    className: "bg-warning",
					    closeModal: true
					}
				}
			});
		}
		else if(email == ''){
			swal({
				title: "Atenção!",
				text: "O campo E-MAIL é obrigatório.",
				icon: "warning",
				buttons: {
					confirm: {
					    text: "Ok!",
					    value: true,
					    visible: true,
					    className: "bg-warning",
					    closeModal: true
					}
				}
			});
		}
		else if(!emailValido(email)){
			swal({
				title: "Atenção!",
				text: "Digite um E-MAIL válido.",
				icon: "warning",
				buttons: {
					confirm: {
					    text: "Ok!",
					    value: true,
					    visible: true,
					    className: "bg-warning",
					    closeModal: true
					}
				}
			});
		}
		else if(senha == ''){
			swal({
				title: "Atenção!",
				text: "O campo SENHA é obrigatório.",
				icon: "warning",
				buttons: {
					confirm: {
					    text: "Ok!",
					    value: true,
					    visible: true,
					    className: "bg-warning",
					    closeModal: true
					}
				}
			});
			$("#forcaSenha").html('');
		}
		else if(csenha == ''){
			swal({
				title: "Atenção!",
				text: "O campo CONFIRMAR SENHA é obrigatório.",
				icon: "warning",
				buttons: {
					confirm: {
					    text: "Ok!",
					    value: true,
					    visible: true,
					    className: "bg-warning",
					    closeModal: true
					}
				}
			});
		}
		else if(csenha != senha){
			swal({
				title: "Atenção!",
				text: "As senhas não coincidem.",
				icon: "warning",
				buttons: {
					confirm: {
					    text: "Ok!",
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
				data: {email:email},
				success: function(dados){
					if (dados == 0) {
						$.ajax({
							url: urlSite+'cadastrar/',
							type: "POST",
							data: {nome: nome, sobrenome:sobrenome, telefone:telefone, whatsapp:whatsapp, email:email, senha:senha},
							success: function(dados){
								if (dados == 1) {
									swal({
										title: "Parabéns!", 
										text: "Cadastro realizado com sucesso.",
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
												window.location.href = principal+'login/';
											}
										});
									});
								}else{
									swal({
										title: "Erro!",
										text: "Não foi possível realizar o cadastro. Tente novamente em alguns minutos.",
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
							text: "E-mail já cadastrado em nosso sistema.",
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

		function emailValido($email){
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			return emailReg.test($email);
		}

	});

	var SPMaskBehavior = function (val) {
	  return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
	},
	spOptions = {
	  onKeyPress: function(val, e, field, options) {
	      field.mask(SPMaskBehavior.apply({}, arguments), options);
	    }
	};
	$('.telefone').mask(SPMaskBehavior, spOptions);

	$("input[name='checkbox']").change(function(){
		if ($(this).is(':checked')) {
			$("#wpp").removeClass('d-flex');
			$("#wpp").addClass('d-none');
		}else{
			$("#wpp").removeClass('d-none');
			$("#wpp").addClass('d-flex');
		}
	});
});