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
				alertaSucesso("Status alterado com sucesso.");
			}else{
				alertaErro("Não foi possível mudar o status do pedido. Tente novamente mais tarde.");
			}
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