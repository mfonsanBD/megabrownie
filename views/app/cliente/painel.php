<?php require 'suporte/header.php' ?>
<div class="col-xl-10 offset-xl-1">
    <div class="container mt-5">
        <div class="row flex-row">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                <div class="widget widget-16 has-shadow border-top border-success">
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-xl-12 d-flex flex-column justify-content-center align-items-center">
                                <div class="counter"><?=$qtdPedidosEntregues;?></div>
                                <div class="total-views text-capitalize text-center">
                                    <?php
                                        switch ($qtdPedidosEntregues) {
                                            case 1:
                                                echo "Pedido Entregue";
                                            break;
                                            
                                            default:
                                                echo "Pedidos Entregues";
                                            break;
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                <div class="widget widget-16 has-shadow border-top border-danger">
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-xl-12 d-flex flex-column justify-content-center align-items-center">
                                <div class="counter"><?=$qtdPedidosPendentes;?></div>
                                <div class="total-views text-capitalize text-center">
                                    <?php
                                        switch ($qtdPedidosPendentes) {
                                            case 1:
                                                echo "Pedido Pendente";
                                            break;
                                            
                                            default:
                                                echo "Pedidos Pendentes";
                                            break;
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                <div class="widget widget-16 has-shadow border-top border-secondary">
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-xl-12 d-flex flex-column justify-content-center align-items-center">
                                <div class="counter"><?=$qtdPedidos;?></div>
                                <div class="total-views text-capitalize text-center">
                                    <?php
                                        switch ($qtdPedidos) {
                                            case 1:
                                                echo "Pedido Feito";
                                            break;
                                            
                                            default:
                                                echo "Pedidos feitos";
                                            break;
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                <div class="widget widget-16 has-shadow border-top border-warning">
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-xl-12 d-flex flex-column justify-content-center align-items-center">
                                <div class="counter"><?=$qtdPedidosEmPreparo;?></div>
                                <div class="total-views text-capitalize text-center">
                                    <?php
                                        switch ($qtdPedidosEmPreparo) {
                                            case 1:
                                                echo "Pedido em preparo";
                                            break;
                                            
                                            default:
                                                echo "Pedidos em preparo";
                                            break;
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 os-animation" data-os-animation="fadeInUp">
                <h2 class="mb-4">Pedidos</h2>
                <div class="widget widget-07 has-shadow">
                    <div class="widget-header bordered d-flex align-items-center">
                        <h2>Tabela de Pedidos</h2>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="widget has-shadow mb-0">
                                <div class="widget-body">
                                    <div class="table-responsive">
                                        <table id="pedidos_cliente" class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Código do Pedido</th>
                                                    <th>Produto</th>
                                                    <th>Sabor</th>
                                                    <th>Data do Pedido</th>
                                                    <th>Status</th>
                                                    <th>Quantidade</th>
                                                    <th>Valor do Pedido</th>
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
                                                    <td><?=$lp['nomeProduto'];?></td>
                                                    <td><?=$lp['sabor'];?></td>
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
            <div class="col-xl-12 os-animation" data-os-animation="fadeInUp">
                <div class="row container">
                    <div class="col-xl-1 col-lg-1 p-0 mr-4">
                        <h2>Endereços</h2>
                    </div>
                    <div class="col-xl-2 col-lg-2 p-0 mb-4">
                        <button class="btn btn-primary btn-sm btn-square" data-toggle="modal" data-target="#addEndereco"><i class="ti ti-plus"></i> Novo Endereço</button>
                    </div>
                </div>
                <div class="widget widget-07 has-shadow">
                    <div class="widget-header bordered d-flex align-items-center">
                        <h2>Seus endereços</h2>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="widget has-shadow mb-0">
                                <div class="widget-body">
                                    <div class="table-responsive">
                                        <table id="endereco_cliente" class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Logradouro</th>
                                                    <th>Número</th>
                                                    <th>Complemento</th>
                                                    <th>Referência</th>
                                                    <th>Bairro</th>
                                                    <th>Cidade</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($listaEnderecos as $le) : ?>
                                                <tr>
                                                    <td><span class="text-primary">
                                                        <?=$le['logradouro'];?>
                                                    </span></td>
                                                    <td><?=$le['numero'];?></td>
                                                    <td><?=$le['complemento'];?></td>
                                                    <td><?=$le['referencia'];?></td>
                                                    <td><?=$le['bairro'];?></td>
                                                    <td><?=$le['cidade']?></td>
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
            <div class="col-xl-12 os-animation mb-5" data-os-animation="fadeInUp">
                <h2 class="mb-4">Menú</h2>
                <div class="widget widget-07 has-shadow">
                    <div class="widget-header bordered d-flex align-items-center">
                        <h2>Escolha e faça seu pedido</h2>
                    </div>
                    <div class="row container mt-3 mb-3">
                        <?php foreach ($listaProdutos as $lpr) : ?>
                            <div class="col-lg-4">
                                <div style="background-color: #f9f9f9" class="single-menu p-4 rounded shadow-sm">
                                    <div class="produto mb-4">
                                        <img src="<?=URL_BASE?>assets/img/produto/<?=$lpr['idProduto'];?>/<?=$lpr['fotoProduto'];?>" alt="<?=$lpr['nomeProduto'];?>">
                                    </div>
                                    <div class="title-div justify-content-between d-flex">
                                        <h4><?=$lpr['nomeProduto'];?></h4>
                                        <p class="price float-right">
                                            R$ <?=number_format($lpr['precoUnd'], 2, ",", ".");?>
                                        </p>
                                    </div>
                                    <h4 class="mb-3"><?=$lpr['sabor'];?></h4>
                                    <p>
                                        <?=$lpr['descricaoProduto'];?>
                                    </p>
                                    <a class="genric-btn btn-primary p-2 text-white text-capitalize rounded mt-3" data-toggle="modal" data-target="#fazerPedido" data-id="<?=$lpr['idProduto'];?>" data-nome="<?=$lpr['nomeProduto'];?>" data-sabor="<?=$lpr['sabor'];?>" data-precouni="<?=$lpr['precoUnd'];?>">Eu quero esse!</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="#" class="go-top"><i class="la la-arrow-up"></i></a>
</div>
<div class="modal fade" id="addEndereco" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-light">
      <div class="modal-header bg-primary">
        <h3 class="modal-title text-white" id="exampleModalLabel">Adicionar Endereço</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="needs-validation mt-3" id="cadastroEndereco" novalidate>
            <div class="form-group row d-flex align-items-center mb-3">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Logradouro *</label>
                <div class="col-lg-5">
                    <input type="text" class="form-control" id="nome" placeholder="Digite o nome da sua rua, avenida, etc...">
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-3">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Número *</label>
                <div class="col-lg-5">
                    <div class="input-group">
                        <input type="number" class="form-control" id="sobrenome" placeholder="O número da sua casa para entrega.">
                    </div>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-3">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Complemento *</label>
                <div class="col-lg-5">
                    <div class="input-group">
                        <input type="text" class="form-control telefone" id="telefone" placeholder="Complemento do endereço.">
                    </div>
                </div>
            </div>
            <div class="form-group row align-items-center mb-3 d-flex">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Ponto de Referência *</label>
                <div class="col-lg-5">
                    <div class="input-group">
                        <input type="text" class="form-control telefone" id="whatsapp" placeholder="Qual o ponto de referência da sua casa?">
                    </div>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-3">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Bairro *</label>
                <div class="col-lg-5">
                    <div class="input-group">
                        <input type="email" class="form-control" id="email" placeholder="Qual o seu bairro?">
                    </div>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-3">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Cidade *</label>
                <div class="col-lg-5">
                    <input type="password" class="form-control" id="senha" placeholder="Qual a sua cidade?">
                </div>
            </div>
            <div class="em-separator separator-dashed"></div>
            <div class="text-center">
                <button class="btn btn-gradient-01" type="submit">Cadastrar Endereço</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="fazerPedido" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-light">
      <div class="modal-header bg-primary">
        <h3 class="modal-title text-white" id="exampleModalLabel"></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="needs-validation mt-3" novalidate>
            <div class="form-group row d-flex align-items-center mb-3">
                <label class="col-lg-5 form-control-label d-flex justify-content-lg-end">Produto:</label>
                <div class="col-lg-6 mb-2" id="nomeProduto"></div>
            </div>
            <div class="form-group row d-flex align-items-center mb-3">
                <label class="col-lg-5 form-control-label d-flex justify-content-lg-end">Sabor:</label>
                <div class="col-lg-6 mb-2" id="saborProduto"></div>
            </div>
            <div class="form-group row d-flex align-items-center mb-3">
                <label class="col-lg-5 form-control-label d-flex justify-content-lg-end">Valor Unitário:</label>
                <div class="col-lg-6 mb-2" id="valorUnit"></div>
            </div>
            <div class="form-group row align-items-center mb-3 d-flex">
                <label class="col-lg-5 form-control-label d-flex justify-content-lg-end">Quantidade:</label>
                <div class="col-lg-2">
                    <div class="input-group">
                        <input type="number" class="form-control" id="quantidade">
                    </div>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-3">
                <label class="col-lg-5 form-control-label d-flex justify-content-lg-end">Endereço para Entrega:</label>
                <div class="col-lg-6">
                    <div class="input-group">
                        <select id="endereco" name="endereco" class="custom-select form-control">
                            <?php foreach ($listaEnderecos as $le) :?>
                                <option value="<?=$le['idEndereco']?>"><?=$le['logradouro'].", Nº: ".$le['numero']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group row align-items-center mb-3 d-none" id="vTotal">
                <label class="col-lg-5 form-control-label d-flex justify-content-lg-end">Valor Total:</label>
                <div class="col-lg-6 mb-2" id="total"></div>
            </div>
            <div class="em-separator separator-dashed"></div>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-3 text-center">
                    <button class="btn btn-gradient-01 text-capitalize" type="button" id="meuTotal">Valor total do Pedido</button>
                </div>
                <div class="col-lg-3 text-center">
                    <button class="btn btn-gradient-01 text-capitalize" type="button" id="formPedido">Enviar Pedido</button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php require 'suporte/footer.php' ?>