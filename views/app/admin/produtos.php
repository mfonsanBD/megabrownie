<?php require 'suporte/header.php' ?>
<div class="col-xl-10 offset-xl-1 mt-5">
    <div class="container">
        <div class="row">
            <div class="page-header">
                <div class="row">
                    <div class="col-xl-8 col-lg-8">
                        <h2 class="page-header-title mr-4">Produtos</h2>
                        <button class="btn btn-primary btn-sm btn-square" data-toggle="modal" data-target="#addProduto"><i class="ti ti-plus"></i> Novo Produto</button>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <ul class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="<?=URL_BASE?>painel/"><i class="ti ti-home"></i></a></li>
                            <li class="breadcrumb-item active">Lista de Produtos</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="widget has-shadow">
                    <div class="widget-body">
                        <div class="table-responsive">
                            <table id="pagina_produtos" class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>Foto do Produto</th>
                                        <th>Nome do Produto</th>
                                        <th>Tipo do Produto</th>
                                        <th>Sabor</th>
                                        <th>Valor Unit.</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        foreach ($listaProdutos as $lpr) :
                                            if ($lpr['fotoProduto'] == 'padrao.jpg') {
                                                $foto = URL_BASE."assets/img/".$lpr['fotoProduto'];
                                            }else{
                                                $foto = URL_BASE."assets/img/produto/".$lpr['idProduto']."/".$lpr['fotoProduto'];
                                            }
                                    ?>
                                        <tr>
                                            <td>
                                                <div class="fotoProduto">
                                                    <img src="<?=$foto?>" alt="<?=$lpr['nomeProduto']?>">
                                                </div>
                                            </td>
                                            <td><span class="text-primary"><?=$lpr['nomeProduto']?></span></td>
                                            <td><?=$lpr['tipoProduto']?></td>
                                            <td><?=$lpr['sabor']?></td>
                                            <td>R$ <?=number_format($lpr['precoUnd'], 2, ",", "."); ?></td>
                                            <td class="td-actions">
                                                <a data-toggle="modal" data-target="#modalEdPr" data-id="<?= $lpr['idProduto']; ?>" data-nome="<?= $lpr['nomeProduto'];?>"><i class="la la-camera-retro edit"></i></a>

                                                <a data-toggle="modal" data-target="#modalExPr" data-id="<?= $lpr['idProduto']; ?>" data-nome="<?= $lpr['nomeProduto'];?>"><i class="la la-close delete"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalExPr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-light">
      <div class="modal-header bg-danger">
        <h3 class="modal-title text-white" id="exampleModalLabel"></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="bg-light" id="excluiCl"> 
            <p class="texto-confirmacao text-center"></p>
            <div class="em-separator separator-dashed"></div>      
            <div class="text-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="ion-close"></i>  Não, cancelar.</button>
                <button type="button" id="excluirPr" class="btn btn-danger"><i class="ion-trash-a"></i> Sim, excluir.</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="addProduto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-light">
      <div class="modal-header bg-primary">
        <h3 class="modal-title text-white" id="exampleModalLabel">Adicionar Produto</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="needs-validation mt-3" id="cadastroProduto" novalidate>
            <div class="form-group row d-flex align-items-center mb-3">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Nome do Produto*</label>
                <div class="col-lg-5">
                    <input type="text" class="form-control" id="nome" placeholder="Digite o nome do produto">
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-3">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Descrição do Produto *</label>
                <div class="col-lg-5">
                    <div class="input-group">
                        <input type="text" class="form-control" id="descricao" placeholder="Descreva o que o produto tem.">
                    </div>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-3">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Tipo de Produto *</label>
                <div class="col-lg-5">
                    <div class="input-group">
                        <input type="text" class="form-control" id="tipo" placeholder="Digite o tipo de produto">
                    </div>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-3">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Sabor *</label>
                <div class="col-lg-5">
                    <div class="input-group">
                        <input type="text" class="form-control" id="sabor" placeholder="Qual o sabor?">
                    </div>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-3">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Valor Unit. *</label>
                <div class="col-lg-5">
                    <div class="input-group">
                        <input type="text" class="form-control valor" id="valor" placeholder="Quanto vale cada um?">
                    </div>
                </div>
            </div>
            <div class="em-separator separator-dashed"></div>
            <div class="text-center">
                <button class="btn btn-gradient-01" type="submit">Cadastrar Produto</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalEdPr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-light">
      <div class="modal-header bg-primary text-white">
        <h3 class="modal-title text-white" id="exampleModalLabel"></h3>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <label for="fotoProduto" class="btn bg-padrao btn-sm mt-2">Escolha a imagem do produto</label>
            <div >
                <input type="file" class="form-control mb-3" id="fotoProduto" name="fotoProduto" />
                <button type="submit" class="btn btn-primary" id="but_upload">Enviar</button>
            </div>
      </div>
    </div>
  </div>
</div>
<?php require 'suporte/footer.php' ?>