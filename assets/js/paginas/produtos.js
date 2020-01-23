urlSite = window.location.href;
$('#modalExPr').on('show.bs.modal', function(event){
	var button = $(event.relatedTarget);
	var id = button.data('id');
	var nome = button.data('nome');
	var modal = $(this);

	modal.find('.modal-title').text('Excluir Produto!');
	modal.find('.texto-confirmacao').html("Tem certeza que deseja excluir <span class=text-danger>'"+nome+"'</span>?<br>Todas as informações serão perdidas.");

	$("#excluirPr").on("click", function(){
		$.ajax({
			url: urlSite+'excluirProduto/',
			type: 'POST',
			data: {id:id},
			success: function(dados){
				if(dados == 1){
					swal({
						title: "Parabéns!", 
						text: "Produto excluído com sucesso!", 
						icon: "success",
						buttons: {
							confirm: {
							    text: "Obrigado! 🙌🏼",
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
						title: "Erro!", 
						text: "O produto não pôde ser excluído. Tente novamente mais tarde.", 
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
			}
		});
	});
});

$("#cadastroProduto").submit(function(e){
		e.preventDefault();
		var nome 		= $("#nome").val();
		var descricao 	= $("#descricao").val();
		var tipo		= $("#tipo").val();
		var sabor 		= $("#sabor").val();
		var valor		= $("#valor").val();

		if(nome == ''){
			swal({
				title: "Atenção!",
				text: "O campo NOME DO PRODUTO é obrigatório.",
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
		else if(descricao == ''){
			swal({
				title: "Atenção!",
				text: "O campo DESCRIÇÃO DO PRODUTO é obrigatório.",
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
		else if(tipo == ''){
			swal({
				title: "Atenção!",
				text: "O campo TIPO DE PRODUTO é obrigatório.",
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
		else if(sabor == ''){
			swal({
				title: "Atenção!",
				text: "O campo SABOR é obrigatório.",
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
		else if(valor == ''){
			swal({
				title: "Atenção!",
				text: "O campo VALOR UNIT. é obrigatório.",
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
				url: urlSite+'adicionarProduto/',
				type: "POST",
				data: {nome: nome, descricao:descricao, tipo:tipo, sabor:sabor, valor:valor},
				success: function(dados){
					if (dados == 1) {
						swal({
							title: "Parabéns!", 
							text: "Produto cadastrado com sucesso.",
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
							title: "Erro!",
							text: "Não foi possível cadastrar o produto. Tente novamente em alguns minutos.",
							icon: "danger",
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
				}
			});
		}
});

$('.valor').mask('#.##0,00', {reverse: true});