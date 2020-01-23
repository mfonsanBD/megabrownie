urlSite = window.location.href;
$('#modalEdPe').on('show.bs.modal', function(event){
	var button = $(event.relatedTarget);
	idPedido = button.data('id');
	var modal = $(this);
});
$("#mudaStatus").click(function(event){
	event.preventDefault();
	var status = $('select[name="status"]').val();
	$.ajax({
		url: urlSite+"mudaStatus/",
		type: "POST",
		data:{id:idPedido, status: status},
		success: function(dados){
			if(dados == 1){
				swal({
					title: "Parabéns!", 
					text: "Status alterado com sucesso.",
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
					text: "Não foi possível mudar o status do pedido. Tente novamente mais tarde.",
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