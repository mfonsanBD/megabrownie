urlSite = window.location.href;
$('#modalExNoticia').on('show.bs.modal', function(event){
	var button = $(event.relatedTarget);
	var id = button.data('id');
	var nome = button.data('nome');
	var modal = $(this);

	modal.find('.modal-title').text('Excluir Postagem!');
	modal.find('.texto-confirmacao').html("Tem certeza que deseja excluir a postagem: <span class=text-danger>'"+nome+"'</span>?<br>Todas as informações serão perdidas.");

	$("#excluirNoticia").on("click", function(){
		$.ajax({
			url: urlSite+'excluirNoticia/',
			type: 'POST',
			data: {id:id},
			success: function(dados){
				if(dados == 1){
					swal({
						title: "Parabéns!", 
						text: "Postagem excluída com sucesso!", 
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
						text: "A postagem não pôde ser excluída. Tente novamente mais tarde.", 
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
$("#addPost").click(function(){
		var titulo 		= $("#titulo").val();
		var texto 		= CKEDITOR.instances.texto_blog.getData();
		
		var data 		= new FormData();
		var imagem 		= $("#imagem_destaque")[0].files;

		if(titulo == ''){
			swal({
				title: "Atenção!",
				text: "O campo TITULO DA POSTAGEM é obrigatório.",
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
		else if(texto == ''){
			swal({
				title: "Atenção!",
				text: "O campo TEXTO é obrigatório.",
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
			if (imagem.length > 0) {
				data.append('titulo', titulo);
				data.append('texto', texto);
				data.append('imagem', imagem[0]);

				$.ajax({
					url: urlSite+'adicionarPostagem/',
					type: "POST",
					data: data,
					contentType: false,
					processData: false,
					success: function(dados){
					if (dados == 1) {
						swal({
							title: "Parabéns!", 
							text: "Postagem adicionada com sucesso.",
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
					else if (dados == 2) {
						swal({
							title: "Atenção!",
							text: "Tipo de imagem de destaque inválida.",
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
					else if (dados == 3) {
						swal({
							title: "Atenção!",
							text: "O tamanho da imagem de destaque excede o permitido.",
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
					}else{
						swal({
							title: "Parabéns!", 
							text: "Não foi possível cadastrar a postagem. Tente novamente mais tarde.",
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
					}
				});
			}else{
				swal({
					title: "Atenção!",
					text: "O campo IMAGEM DE DESTAQUE é obrigatório.",
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
		}
});