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
			alertaAviso("O campo NOME é obrigatório.");
		}
		else if(!isNaN(nome)){
			alertaAviso("O campo NOME não permite números.");
		}
		else if(nome.length < 3){
			alertaAviso("O campo NOME deve conter pelo menos 3 caracteres.");
		}
		else if(sobrenome == ''){
			alertaAviso("O campo SOBRENOME é obrigatório.");
		}
		else if(!isNaN(sobrenome)){
			alertaAviso("O campo SOBRENOME não permite números.");
		}
		else if(sobrenome.length < 3){
			alertaAviso("O campo SOBRENOME deve conter pelo menos 3 caracteres.");
		}
		else if(telefone == ''){
			alertaAviso("O campo TELEFONE é obrigatório.");
		}
		else if(email == ''){
			alertaAviso("O campo E-MAIL é obrigatório.");
		}
		else if(!emailValido(email)){
			alertaAviso("Digite um E-MAIL válido.");
		}
		else if(senha == ''){
			alertaAviso("O campo SENHA é obrigatório.");
		}
		else if(csenha == ''){
			alertaAviso("O campo CONFIRMAR SENHA é obrigatório.");
		}
		else if(csenha != senha){
			alertaAviso("As senhas não coincidem.");
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
									alertaSucessoCadastro("Cadastro realizado com sucesso.");
								}else{
									alertaErro("Não foi possível realizar o cadastro. Tente novamente em alguns minutos.");
								}
							}
						});
					}else{
						alertaAviso("E-mail já cadastrado em nosso sistema.");
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
function alertaSucessoCadastro(texto){
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
				window.location.href = principal+'login/';
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