urlSite = window.location.href;
function string_to_slug (nome) {
    nome = nome.replace('/^\s+|\s+$/g', ''); // trim
    nome = nome.toLowerCase();
  
    // remove accents, swap ñ for n, etc
    var from = "ãàáäâèéëêìíïîòóöôùúüûñç·/_,:;";
    var to   = "aaaaaeeeeiiiioooouuuunc------";
    for (var i=0, l=from.length ; i<l ; i++) {
        nome = nome.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }

    nome = nome.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
        .replace(/\s+/g, '-') // collapse whitespace and replace by -
        .replace(/-+/g, '-'); // collapse dashes

    return nome;
}
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
		var slug 		= string_to_slug(titulo);

		$.ajax({
			url: urlSite+'verificaSlug/',
			type: 'POST',
			data: {slug: slug},
			success: function(resposta){
				
				if (resposta != 0) {
					slug += "-"+resposta;
				}

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
						data.append('slug', slug);

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
			}
		});
});

$('#modalEdFotoNoticia').on('show.bs.modal', function(event){
	var button = $(event.relatedTarget);
	var id = button.data('id');
	var modal = $(this);

	modal.find('.modal-title').text('Enviar Foto da Postagem');

	$("#but_upload").click(function(){
		var data = new FormData();
		var arquivos = $("#fotoNoticia")[0].files;

		if (arquivos.length > 0) {
			data.append('idNoticia', id);
			data.append('fotoNoticia', arquivos[0]);
			$.ajax({
				type: "POST",
				url: urlSite+"enviarFoto/",
				data: data,
				contentType: false,
				processData: false,
				success: function(dados){
					if (dados == 1) {
						alertaSucesso("Imagem adicionada com sucesso.");
					}
					else if (dados == 2) {
						alertaAviso("Tipo de imagem inválida.");
					}
					else if (dados == 3) {
						alertaAviso("O tamanho da imagem excede o permitido.");
					}else{
						alertaSucesso("Imagem alterada com sucesso.");
					}
				}
			});
		}
	});
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

			$("#editaPost").click(function(e){
				e.preventDefault();
				var titulo 	= $("#edita_titulo").val();
				var texto 	= CKEDITOR.instances.edita_texto_blog.getData();
				var slug 		= string_to_slug(titulo);

				if(titulo == ''){
					alertaAviso("O campo TITULO DA POSTAGEM é obrigatório");
				}
				else if(texto == ''){
					alertaAviso("O campo TEXTO é obrigatório");
				}
				else{
					$.ajax({
						url: urlSite+'editaPostagem/',
						type: "POST",
						data: {titulo:titulo, texto:texto, slug:slug, id:id},
						success: function(dados){
							if (dados == 1) {
								alertaSucesso("Postagem editada com sucesso.");
							}
							else{
								alertaErro("Não foi possível editar a postagem porque os dados enviados já são as atuais cadastradas no sistema.");
							}
						}
					});
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