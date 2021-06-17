urlSite = window.location.href;
$('#addEndereco').on('show.bs.modal', function(event){
	var button = $(event.relatedTarget);
	var modal = $(this);
	modal.find('.modal-title').text('Novo Endereço');

	$("#formCadastroEndereco").click(function(event){
		event.preventDefault();

		var logradouro          = $('#logradouro').val();
		var numero              = $('#numero').val();
		var complemento         = $('#complemento').val();
		var pontoDeReferencia   = $('#pontoDeReferencia').val();
		var bairro              = $('#bairro').val();
		var cidade              = $('#cidade').val();

		if(logradouro == ''){
			alertaAviso("O campo LOGRADOURO é obrigatório.");
		}
		else if(numero == ''){
			alertaAviso("O campo NÚMERO é obrigatório.");
		}
		else if(complemento == ''){
			alertaAviso("O campo COMPLEMENTO é obrigatório.");
		}
		else if(pontoDeReferencia == ''){
			alertaAviso("O campo PONTO DE REFERÊNCIA é obrigatório.");
		}
		else if(bairro == ''){
			alertaAviso("O campo BAIRRO é obrigatório.");
		}
		else if(cidade == ''){
			alertaAviso("O campo CIDADE é obrigatório.");
		}else{
			$.ajax({
				url: urlSite+"cadastraEndereco/",
				type: "POST",
				data:{logradouro:logradouro, numero:numero, complemento:complemento, pontoDeReferencia:pontoDeReferencia, bairro:bairro, cidade:cidade},
				success: function(dados){
					console.log(dados);
					if(dados == 1){
						alertaSucesso("Endereço cadastrado com sucesso.");
					}else{
						alertaErro("Não foi possível cadastrar o endereço. Tente novamente mais tarde.");
					}
				}
			});
		}
	});
});
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