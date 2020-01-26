<?php require 'suporte/header.php' ?>
<div class="col-xl-10 offset-xl-1 mt-5">
    <div class="container">
        <div class="row">
            <div class="page-header">
                <div class="row">
                    <div class="col-xl-8 col-lg-8">
                        <h2 class="page-header-title mr-4">Pedidos</h2>
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
        <div class="row flex-row">
            <div class="col-xl-12 os-animation" data-os-animation="fadeInUp">
                <div class="widget widget-07 has-shadow">
                    <div class="widget-header bordered d-flex align-items-center">
                        <h2>Tabela de Pedidos</h2>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="widget has-shadow mb-0">
                                <div class="widget-body">
                                    <div class="table-responsive">
                                        <table id="tabela_produtos" class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Código do Pedido</th>
                                                    <th>Cliente</th>
                                                    <th>Data do Pedido</th>
                                                    <th>Status</th>
                                                    <th>Quantidade</th>
                                                    <th>Valor do Pedido</th>
                                                    <th>Ação</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($listaPedidos as $lp) : ?>
                                                <tr>
                                                    <td>
                                                        <span class="text-primary">
                                                            <?php
                                                                $unique = '#'.str_pad($lp['idPedido'], 6, 0, STR_PAD_LEFT);
                                                                echo $unique;
                                                            ?>
                                                        </span>
                                                    </td>
                                                    <td><?=$lp['nomeCliente']." ".$lp['sobrenomeCliente']?></td>
                                                    <td><?=date('d/m/Y - H:i', strtotime($lp['dataPedido']))?></td>
                                                    <td>
                                                        <span style="width:100px;">
                                                            <?php if ($lp['estado'] == 0) { ?>
                                                                <span class="btn btn-sm btn-secondary">
                                                                    Pendente
                                                                </span>
                                                            <?php }else if($lp['estado'] == 1){ ?>
                                                                <span class="btn btn-sm btn-warning">
                                                                    Em Preparo
                                                                </span>
                                                            <?php }else if($lp['estado'] == 2){ ?>
                                                                <span class="btn btn-sm btn-info">
                                                                    Saiu p/ Entrega
                                                                </span>
                                                            <?php }else{ ?>
                                                                <span class="btn btn-sm btn-success">
                                                                    Entregue
                                                                </span>
                                                            <?php }?>
                                                        </span>
                                                    </td>
                                                    <td><?=$lp['qtdProduto']?>
                                                    </td>
                                                    <td>R$ 
                                                        <?php
                                                            $valor = ($lp['qtdProduto'] * $lp['precoUnd']);
                                                            echo number_format($valor, 2, ",", ".");
                                                        ?>
                                                    </td>
                                                    <td class="td-actions">
                                                        <a data-toggle="modal" data-target="#modalEdPe" data-id="<?= $lp['idPedido']; ?>" class="mudaStatus"><i class="la la-check-square-o edit"></i></a>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="#" class="go-top"><i class="la la-arrow-up"></i></a>
</div>
<div class="modal fade" id="modalEdPe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-light">
      <div class="modal-header bg-primary">
        <h3 class="modal-title text-white" id="exampleModalLabel">Mudar status do pedido.</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="bg-light" id="editaSttsPe">
            <div class="form-group row mb-5">
                <div class="col-lg-8 offset-lg-2 select">
                    <select id="status" name="status" class="custom-select form-control">
                        <option value="0">Pendente</option>
                        <option value="1">Em Preparo</option>
                        <option value="2">Saiu para Entrega</option>
                        <option value="3">Entregue</option>
                    </select>
                </div>
            </div>
            <div class="text-center modal-footer">
                <button class="btn btn-shadow" class="close" data-dismiss="modal" aria-label="Close">Cancelar</button>
                <button class="btn btn-gradient-01" type="button" id="mudaStatus">Enviar Alteração</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php require 'suporte/footer.php' ?>