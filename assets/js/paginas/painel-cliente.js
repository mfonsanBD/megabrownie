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
		var quantidade 			= $("#quantidade").val();
		var endereco 			= $('select[name="endereco"]').val();
		var total 				= quantidade*precouni;

		$("#vTotal").removeClass("d-none");
		$("#vTotal").addClass("d-flex");
		$("#total").html("R$ "+total);
	});

	$("#formPedido").click(function(event){
		event.preventDefault();
		var quantidade 			= $("#quantidade").val();
		var endereco 			= $('select[name="endereco"]').val();
		var total 				= quantidade*precouni;

		$.ajax({
			url: urlSite+"meuPedido/",
			type: "POST",
			data:{endereco:endereco, produtoId:id, quantidade:quantidade, total:total},
			success: function(dados){
				console.log(dados);
				if(dados == 1){
					swal({
						title: "Parabéns!", 
						text: "Pedido realizado com sucesso.",
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
				}else{
					swal({
						title: "Atenção!",
						text: "Não foi possível realizar o pedido. Tente novamente mais tarde.",
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
	});
});