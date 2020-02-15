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
					alertaSucesso("Postagem excluída com sucesso!");
				}else{
					alertaErro("A postagem não pôde ser excluída. Tente novamente mais tarde.");
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
			alertaAviso("O campo TITULO DA POSTAGEM é obrigatório.");
		}
		else if(texto == ''){
			alertaAviso("O campo TEXTO é obrigatório.");
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
							alertaSucesso("Postagem adicionada com sucesso.");
						}
						else if (dados == 2) {
							alertaAviso("Tipo de imagem de destaque inválida.");
						}
						else if (dados == 3) {
							alertaAviso("O tamanho da imagem de destaque excede o permitido.");
						}else{
							alertaErro("Não foi possível cadastrar a postagem. Tente novamente mais tarde.");
						}
					}
				});
			}else{
				alertaAviso("O campo IMAGEM DE DESTAQUE é obrigatório.");
			}
		}
});
$("#modalEdNoticia").on('show.bs.modal', function(event){
	var button = $(event.relatedTarget);
	var id = button.data('id');
	var titulo = button.data('titulo');
	var modal = $(this);

	modal.find('.modal-title').text('Editar Postagem '+titulo+'!');

	$.ajax({
		url: urlSite+'listaDadosId/',
		type: "POST",
		dataType: 'json',
		data: {id:id},
		success: function(dados){

			$("#edita_titulo").attr('value', dados.titulo);
			CKEDITOR.instances.edita_texto_blog.setData(dados.texto);
			$("#preview").attr('src', dados.url_principal+'assets/img/blog/'+dados.imagem);

			var titulo_antigo = dados.titulo;
			var texto_antigo = dados.texto;
			var imagem_antiga = dados.imagem;

			$("#editaPost").click(function(e){
				e.preventDefault();

				var novo_titulo 	= $("#edita_titulo").val();
				var novo_texto 		= CKEDITOR.instances.edita_texto_blog.getData();

				var novos_dados 	= new FormData();
				var nova_imagem 	= $("#edita_imagem_destaque")[0].files;

				if (nova_imagem.length > 0) {
					novos_dados.append('nova_imagem', nova_imagem[0]);
					novos_dados.append('imagem_antiga', "");
				}else{ 
					novos_dados.append('imagem_antiga', imagem_antiga);
				}

				novos_dados.append('id', id);
				novos_dados.append('titulo_antigo', titulo_antigo);
				novos_dados.append('texto_antigo', texto_antigo);
				novos_dados.append('novo_titulo', novo_titulo);
				novos_dados.append('novo_texto', novo_texto);

				$.ajax({
					url: urlSite+'editaPostagem/',
					type: "POST",
					data: novos_dados,
					contentType: false,
					processData: false,
					success: function(dados){
						if (dados == 1) {
							alertaSucesso("Postagem editada com sucesso.");
						}
						else if (dados == 2) {
							alertaAviso("Tipo de imagem de destaque inválida.");
						}
						else if (dados == 3) {
							alertaAviso("O tamanho da imagem de destaque excede o permitido.");
						}
						else if(dados == 4){
							alertaAviso("Os dados são os atuais.");
						}
						else{
							alertaErro("Não foi possível editar a postagem. Tente novamente mais tarde.");
						}
					}
				});
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