<?php require 'suporte/header.php' ?>
<div class="col-xl-10 offset-xl-1">
    <div class="container mt-5">
        <div class="row flex-row">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                <div class="widget widget-16 has-shadow">
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-xl-12 d-flex flex-column justify-content-center align-items-center">
                                <div class="counter"><?=$qtdClientes;?></div>
                                <div class="total-views text-capitalize text-center">
                                    <?php
                                        switch ($qtdClientes) {
                                            case 0:
                                                echo "Nenhum cliente registrado";
                                            break;
                                            case 1:
                                                echo "cliente registrado";
                                            break;
                                            
                                            default:
                                                echo "clientes registrados";
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
                <div class="widget widget-16 has-shadow">
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-xl-12 d-flex flex-column justify-content-center align-items-center">
                                <div class="counter"><?=$qtdPedidos;?></div>
                                <div class="total-views text-capitalize text-center">
                                    <?php
                                        switch ($qtdPedidos) {
                                            case 0:
                                                echo "Nenhum pedido feito";
                                            break;
                                            case 1:
                                                echo "pedido feito";
                                            break;
                                            
                                            default:
                                                echo "pedidos feitos";
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
                <div class="widget widget-16 has-shadow">
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-xl-12 d-flex flex-column justify-content-center align-items-center">
                                <div class="counter"><?=$qtdPedidosPendentes;?></div>
                                <div class="total-views text-capitalize text-center">
                                    <?php
                                        switch ($qtdPedidosPendentes) {
                                            case 0:
                                                echo "Nenhum pedido prendente";
                                            break;
                                            case 1:
                                                echo "pedido prendente";
                                            break;
                                            
                                            default:
                                                echo "pedidos prendentes";
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
                <div class="widget widget-16 has-shadow">
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-xl-12 d-flex flex-column justify-content-center align-items-center">
                                <div class="counter"><?=$qtdPedidosEntregues;?></div>
                                <div class="total-views text-capitalize text-center">
                                    <?php
                                        switch ($qtdPedidosEntregues) {
                                            case 0:
                                                echo "Nenhum pedido entregue";
                                            break;
                                            case 1:
                                                echo "pedido entregue";
                                            break;
                                            
                                            default:
                                                echo "pedidos entregues";
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
                                                    <td><button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#modal-centered<?=$lp['idPedido']?>">Detalhes do Pedido</button></td>
                                                    <div id="modal-centered<?=$lp['idPedido']?>" class="modal fade">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Informações do Pedido</h4>
                                                                    <button type="button" class="close" data-dismiss="modal">
                                                                        <span aria-hidden="true">×</span>
                                                                        <span class="sr-only">close</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="container">
                                                                        <div class="row">
                                                                            <div class="col-lg-4 mb-5">
                                                                                Nome do Cliente:<br>
                                                                                <span class="text-primary"><?=$lp['nomeCliente']." ".$lp['sobrenomeCliente']?></span>
                                                                            </div>
                                                                            <div class="col-lg-4 mb-5">
                                                                                Telefone:<br>
                                                                                <span class="text-primary">
                                                                                    <a href="tel:<?=$lp['telefoneCliente']?>">
                                                                                        <?=$lp['telefoneCliente']?>
                                                                                    </a>
                                                                                </span>
                                                                            </div>
                                                                            <div class="col-lg-4 mb-5">
                                                                                WhatsApp:<br>
                                                                                <span class="text-primary">
                                                                                    <?php
                                                                                        $whatsapp = $lp['whatsappCliente'];
                                                                                        $whatsapp = preg_replace("/[^0-9]/", "", $whatsapp);
                                                                                    ?>
                                                                                    <a href="https://api.whatsapp.com/send?phone=55<?=$whatsapp?>">
                                                                                        <?=$lp['whatsappCliente']?>
                                                                                    </a>
                                                                                </span>
                                                                            </div>
                                                                            <div class="col-lg-4 mb-5">
                                                                                Produto:<br>
                                                                                <span class="text-primary"><?=$lp['nomeProduto']?></span>
                                                                            </div>
                                                                            <div class="col-lg-4 mb-5">
                                                                                Tipo do Produto:<br>
                                                                                <span class="text-primary"><?=$lp['tipoProduto']?></span>
                                                                            </div>
                                                                            <div class="col-lg-4 mb-5">
                                                                                Sabor:<br>
                                                                                <span class="text-primary"><?=$lp['sabor']?></span>
                                                                            </div>
                                                                            <div class="col-lg-4 mb-5">
                                                                                Quantidade:<br>
                                                                                <span class="text-primary"><?=$lp['qtdProduto']?></span>
                                                                            </div>
                                                                            <div class="col-lg-4 mb-5">
                                                                                Valor Unitário:<br>
                                                                                <span class="text-primary">R$ <?=number_format($lp['precoUnd'], 2, ",", "."); ?></span>
                                                                            </div>
                                                                            <div class="col-lg-4 mb-5">
                                                                                Valor Total:<br>
                                                                                <span class="text-primary">R$ <?php $valor = ($lp['qtdProduto'] * $lp['precoUnd']); echo number_format($valor, 2, ",", "."); ?></span>
                                                                            </div>
                                                                            <div class="col-lg-6 mb-5">
                                                                                Data do Pedido:<br>
                                                                                <span class="text-primary"><?=date('d/m/Y', strtotime($lp['dataPedido']))?></span>
                                                                            </div>
                                                                            <div class="col-lg-6 mb-5">
                                                                                Horário do Pedido:<br>
                                                                                <span class="text-primary"><?=date('H:i', strtotime($lp['dataPedido']))?></span>
                                                                            </div>
                                                                            <div class="col-lg-12 mb-4 text-center">
                                                                                Endereço para entrega:<br>
                                                                                <span class="text-primary text-capitalize">
                                                                                    <?php
                                                                                        echo $lp['logradouro'].", Nº: ".$lp['numero'].", ".$lp['complemento'];
                                                                                    ?>
                                                                                </span><br>
                                                                                <span class="text-primary text-capitalize">
                                                                                    <?php
                                                                                        echo $lp['referencia']." - ".$lp['bairro']." - ".$lp['cidade'];
                                                                                    ?>
                                                                                </span>
                                                                            </div>
                                                                            <div class="col-lg-12 text-center mb-4">
                                                                                Status:<br>
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
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer justify-content-center">
                                                                    <button type="button" class="btn btn-shadow" data-dismiss="modal">Ok</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
                <div class="widget widget-07">
                    <div class="widget-header bordered d-flex align-items-center">
                        <h2>Clientes que mais fazem pedido</h2>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="widget has-shadow mb-0">
                                <div class="widget-body">
                                    <div class="table-responsive">
                                        <table id="tabela_mais_pedidos" class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Cliente</th>
                                                    <th>Quantidade de Pedido</th>
                                                    <th>Total Gasto</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($clientesComMaisPedidos as $maispedidos) : ?>
                                                <tr>
                                                    <td><?=$maispedidos['nome']." ".$maispedidos['sobrenome']?></td>
                                                    <td><?=$maispedidos['pedidos']?></td>
                                                    <td>R$ <?=number_format($maispedidos['total'], 2, ",", ".");?>
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
        </div>
    </div>
</div>
    <a href="#" class="go-top"><i class="la la-arrow-up"></i></a>
</div>
<?php require 'suporte/footer.php' ?>