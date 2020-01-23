<?php require 'suporte/header.php' ?>
<div class="col-xl-10 offset-xl-1">
    <div class="container mt-5">
        <div class="row flex-row">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                <div class="widget widget-16 has-shadow">
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-xl-12 d-flex flex-column justify-content-center align-items-center">
                                <div class="counter">258,036</div>
                                <div class="total-views">Clientes Registrados</div>
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
                                <div class="counter">258,036</div>
                                <div class="total-views">Pedidos Pendentes</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                <div class="widget widget-16">
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-xl-12 d-flex flex-column justify-content-center align-items-center">
                                <div class="counter">258,036</div>
                                <div class="total-views">Pedidos</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                <div class="widget widget-17">
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-xl-12 d-flex flex-column justify-content-center align-items-center">
                                <div class="counter">1,658</div>
                                <div class="total-visitors">Pedidos Entregues</div>
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
                                                    <th>Valor do Pedido</th>
                                                    <th>Ação</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><span class="text-primary"><?php $unique = '#'.str_pad(1, 6, 0, STR_PAD_LEFT); echo $unique;?></span></td>
                                                    <td>Lori Baker</td>
                                                    <td><?=date('d/m/Y')?></td>
                                                    <td><span style="width:100px;"><span class="badge-text badge-text-small info">Paid</span></span></td>
                                                    <td>$139.45</td>
                                                    <td><button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#modal-centered">Detalhes do Pedido</button></td>
                                                    <div id="modal-centered" class="modal fade">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Modal Title</h4>
                                                                    <button type="button" class="close" data-dismiss="modal">
                                                                        <span aria-hidden="true">×</span>
                                                                        <span class="sr-only">close</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>
                                                                        Donec non lectus nec est porta eleifend. Morbi ut dictum augue, feugiat condimentum est. Pellentesque tincidunt justo nec aliquet tincidunt. Integer dapibus tellus non neque pulvinar mollis. Maecenas dictum laoreet diam, non convallis lorem sagittis nec. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc venenatis lacus arcu, nec ultricies dui vehicula vitae.
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-shadow" data-dismiss="modal">Ok</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td><span class="text-primary"><?php $unique = '#'.str_pad(1, 6, 0, STR_PAD_LEFT); echo $unique;?></span></td>
                                                    <td>Lori Baker</td>
                                                    <td><?=date('d/m/Y')?></td>
                                                    <td><span style="width:100px;"><span class="badge-text badge-text-small info">Paid</span></span></td>
                                                    <td>$139.45</td>
                                                    <td><button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#modal-centered">Detalhes do Pedido</button></td>
                                                    <div id="modal-centered" class="modal fade">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Modal Title</h4>
                                                                    <button type="button" class="close" data-dismiss="modal">
                                                                        <span aria-hidden="true">×</span>
                                                                        <span class="sr-only">close</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>
                                                                        Donec non lectus nec est porta eleifend. Morbi ut dictum augue, feugiat condimentum est. Pellentesque tincidunt justo nec aliquet tincidunt. Integer dapibus tellus non neque pulvinar mollis. Maecenas dictum laoreet diam, non convallis lorem sagittis nec. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc venenatis lacus arcu, nec ultricies dui vehicula vitae.
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-shadow" data-dismiss="modal">Ok</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td><span class="text-primary"><?php $unique = '#'.str_pad(1, 6, 0, STR_PAD_LEFT); echo $unique;?></span></td>
                                                    <td>Lori Baker</td>
                                                    <td><?=date('d/m/Y')?></td>
                                                    <td><span style="width:100px;"><span class="badge-text badge-text-small info">Paid</span></span></td>
                                                    <td>$139.45</td>
                                                    <td><button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#modal-centered">Detalhes do Pedido</button></td>
                                                    <div id="modal-centered" class="modal fade">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Modal Title</h4>
                                                                    <button type="button" class="close" data-dismiss="modal">
                                                                        <span aria-hidden="true">×</span>
                                                                        <span class="sr-only">close</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>
                                                                        Donec non lectus nec est porta eleifend. Morbi ut dictum augue, feugiat condimentum est. Pellentesque tincidunt justo nec aliquet tincidunt. Integer dapibus tellus non neque pulvinar mollis. Maecenas dictum laoreet diam, non convallis lorem sagittis nec. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc venenatis lacus arcu, nec ultricies dui vehicula vitae.
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-shadow" data-dismiss="modal">Ok</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td><span class="text-primary"><?php $unique = '#'.str_pad(1, 6, 0, STR_PAD_LEFT); echo $unique;?></span></td>
                                                    <td>Lori Baker</td>
                                                    <td><?=date('d/m/Y')?></td>
                                                    <td><span style="width:100px;"><span class="badge-text badge-text-small info">Paid</span></span></td>
                                                    <td>$139.45</td>
                                                    <td><button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#modal-centered">Detalhes do Pedido</button></td>
                                                    <div id="modal-centered" class="modal fade">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Modal Title</h4>
                                                                    <button type="button" class="close" data-dismiss="modal">
                                                                        <span aria-hidden="true">×</span>
                                                                        <span class="sr-only">close</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>
                                                                        Donec non lectus nec est porta eleifend. Morbi ut dictum augue, feugiat condimentum est. Pellentesque tincidunt justo nec aliquet tincidunt. Integer dapibus tellus non neque pulvinar mollis. Maecenas dictum laoreet diam, non convallis lorem sagittis nec. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc venenatis lacus arcu, nec ultricies dui vehicula vitae.
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-shadow" data-dismiss="modal">Ok</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </tr>
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
                                                <tr>
                                                    <td>Lori Baker</td>
                                                    <td>256</td>
                                                    <td>$139.45</td>
                                                </tr>
                                                <tr>
                                                    <td>Lori Baker</td>
                                                    <td>256</td>
                                                    <td>$139.45</td>
                                                </tr>
                                                <tr>
                                                    <td>Lori Baker</td>
                                                    <td>256</td>
                                                    <td>$139.45</td>
                                                </tr>
                                                <tr>
                                                    <td>Lori Baker</td>
                                                    <td>256</td>
                                                    <td>$139.45</td>
                                                </tr>
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
<?php require 'suporte/footer.php' ?>