urlSite = window.location.href;
$('#fazerPedido').on('show.bs.modal', function(event){
	var button = $(event.relatedTarget);
	var id 			= button.data('id');
	var nome 		= button.data('nome');
	var sabor 		= button.data('sabor');
	var precouni 	= button.data('precouni');

	var formatado = precouni.replace('.', ',');
	
	var modal = $(this);

	modal.find('.modal-title').text('Pedido de '+nome);
	$("#nomeProduto").html(nome);
	$("#saborProduto").html(sabor);
	$("#valorUnit").html("R$ "+formatado);

	$("#meuTotal").click(function(){
		var quantidade 		= $("#quantidade").val();
		var total 				= quantidade*precouni;

		$("#vTotal").removeClass("d-none");
		$("#vTotal").addClass("d-flex");
		$("#total").html("R$ "+total);
	});

	$("#formPedido").click(function(event){
		event.preventDefault();
		var quantidade 		= $("#quantidade").val();
		var endereco 			= $('select[name="endereco"]').val();
		var total 				= quantidade*precouni;

		if(endereco == null){
			alertaAviso("O campo ENDEREÇO PARA ENTREGA é obrigatório.");
		}
		else if(quantidade == ''){
			alertaAviso("O campo QUANTIDADE é obrigatório.");
		}else{
			$.ajax({
				url: urlSite+"meuPedido/",
				type: "POST",
				data:{endereco:endereco, produtoId:id, quantidade:quantidade, total:total},
				success: function(dados){
					console.log(dados);
					if(dados == 1){
						alertaSucesso("Pedido realizado com sucesso.");
					}else{
						alertaErro("Não foi possível realizar o pedido. Tente novamente mais tarde.");
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