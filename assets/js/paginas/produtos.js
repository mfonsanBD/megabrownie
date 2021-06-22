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
					alertaSucesso("Produto excluído com sucesso!");
				}else{
					alertaErro("O produto não pôde ser excluído. Tente novamente mais tarde.");
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
			alertaAviso("O campo NOME DO PRODUTO é obrigatório.");
		}
		else if(descricao == ''){
			alertaAviso("O campo DESCRIÇÃO DO PRODUTO é obrigatório.");
		}
		else if(tipo == ''){
			alertaAviso("O campo TIPO DE PRODUTO é obrigatório.");
		}
		else if(sabor == ''){
			alertaAviso("O campo SABOR é obrigatório.");
		}
		else if(valor == ''){
			alertaAviso("O campo VALOR UNIT. é obrigatório.");
		}
		else{
			$.ajax({
				url: urlSite+'adicionarProduto/',
				type: "POST",
				data: {nome: nome, descricao:descricao, tipo:tipo, sabor:sabor, valor:valor},
				success: function(dados){
					if (dados == 1) {
						alertaSucesso("Produto cadastrado com sucesso.");
					}else{
						alertaErro("Não foi possível cadastrar o produto. Tente novamente em alguns minutos.");
					}
				}
			});
		}
});

$('#modalEdFotoPr').on('show.bs.modal', function(event){
	var button = $(event.relatedTarget);
	var id = button.data('id');
	var nome = button.data('nome');
	var modal = $(this);

	modal.find('.modal-title').text('Enviar Foto do Produto: '+nome+'.');

	$("#but_upload").click(function(){
		var data = new FormData();
		var arquivos = $("#fotoProduto")[0].files;

		if (arquivos.length > 0) {
			data.append('idProduto', id);
			data.append('fotoProduto', arquivos[0]);
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

$('#modalEdPr').on('show.bs.modal', function(event){
	var button 			= $(event.relatedTarget);
	var id 				= button.data('id');
	var nome 			= button.data('nome');
	var descricao 		= button.data('descricao');
	var tipo 			= button.data('tipo');
	var sabor 			= button.data('sabor');
	var valor 			= button.data('valor');
	var modal 			= $(this);

	modal.find('.modal-title').text('Alterar: '+nome+'.');

	$("#nomeProdutoEdita").val(nome);
	$("#descricaoProdutoEdita").val(descricao);
	$("#tipoProdutoEdita").val(tipo);
	$("#saborProdutoEdita").val(sabor);
	$("#valorProdutoEdita").val(valor);

	$("#edicaoDoProduto").submit(function(e){
		e.preventDefault();

		if($("#nomeProdutoEdita").val() == ""){
			alertaAviso("O campo NOME DO PRODUTO é obrigatório.");
		}
		else if($("#nomeProdutoEdita").val() != nome){
			nome = $("#nomeProdutoEdita").val();
		}

		if($("#descricaoProdutoEdita").val() == ""){
			alertaAviso("O campo DESCRIÇÃO DO PRODUTO é obrigatório.");
		}
		else if($("#descricaoProdutoEdita").val() != descricao){
			descricao = $("#descricaoProdutoEdita").val();
		}

		if($("#tipoProdutoEdita").val() == ""){
			alertaAviso("O campo TIPO DO PRODUTO é obrigatório.");
		}
		else if($("#tipoProdutoEdita").val() != tipo){
			tipo = $("#tipoProdutoEdita").val();
		}

		if($("#saborProdutoEdita").val() == ""){
			alertaAviso("O campo SABOR é obrigatório.");
		}
		else if($("#saborProdutoEdita").val() != sabor){
			sabor = $("#saborProdutoEdita").val();
		}

		if($("#valorProdutoEdita").val() == ""){
			alertaAviso("O campo VALOR UNIT. é obrigatório.");
		}
		else if($("#valorProdutoEdita").val() != valor){
			valor = $("#valorProdutoEdita").val();
		}
	
		$.ajax({
			url: urlSite+"editarProduto/",
			type: "POST",
			data: {nome:nome, descricao:descricao, tipo:tipo, sabor:sabor, valor:valor, id:id},
			success: function(dados){
				if(dados == 1){
					alertaSucesso("Produto alterado com sucesso!");
				}
				else{
					alertaErro("O produto não pôde ser alterado.");
				}
			}
		});
	});
});

$('.valor').mask('#.##0,00', {reverse: true});

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