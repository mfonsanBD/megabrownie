<?php require 'suporte/header.php' ?>
<div class="col-xl-10 offset-xl-1 mt-5">
    <div class="container">
        <div class="row">
            <div class="page-header">
                <div class="row">
                    <div class="col-xl-8 col-lg-8">
                        <h2 class="page-header-title mr-4">Clientes (<?=$qtdClientes?>)</h2>
                        <button class="btn btn-primary btn-sm btn-square" data-toggle="modal" data-target="#addCliente"><i class="ti ti-plus"></i> Novo Cliente</button>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <ul class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="<?=URL_BASE?>painel/"><i class="ti ti-home"></i></a></li>
                            <li class="breadcrumb-item active">Lista de Clientes</li>
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
                            <table id="tabela_clientes" class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>Nome do Cliente</th>
                                        <th>Telefone do Cliente</th>
                                        <th>WhatsApp do Cliente</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listaClientes as $lc) : ?>
                                        <tr>
                                            <td><span class="text-primary"><?=$lc['nomeCliente']." ".$lc['sobrenomeCliente']?></span></td>
                                            <td><a href="tel:<?=$lc['telefoneCliente']?>"><?=$lc['telefoneCliente']?></a></td>
                                            <td>
                                                <?php
                                                    $whatsapp = $lc['whatsappCliente'];
                                                    $whatsapp = preg_replace("/[^0-9]/", "", $whatsapp);
                                                ?>
                                                <a href="https://api.whatsapp.com/send?phone=55<?=$whatsapp?>">
                                                <?=$lc['whatsappCliente']?>
                                            </td>
                                            <td class="td-actions">
                                                <a data-toggle="modal" data-target="#modalExCl" data-id="<?= $lc['idCliente']; ?>" data-nome="<?= $lc['nomeCliente']." ".$lc['sobrenomeCliente'];?>"><i class="la la-close delete"></i></a>
                                            </td>
                                            <div id="modal-centered<?=$lc['idCliente']?>" class="modal fade">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Informações do Cliente</h4>
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
                                                                        <span class="text-primary"><?=$lc['nomeCliente']." ".$lc['sobrenomeCliente']?></span>
                                                                    </div>
                                                                    <div class="col-lg-4 mb-5">
                                                                        Telefone:<br>
                                                                        <span class="text-primary">
                                                                            <a href="tel:<?=$lc['telefoneCliente']?>">
                                                                                <?=$lc['telefoneCliente']?>
                                                                            </a>
                                                                        </span>
                                                                    </div>
                                                                    <div class="col-lg-4 mb-5">
                                                                        WhatsApp:<br>
                                                                        <span class="text-primary">
                                                                            <?php
                                                                                $whatsapp = $lc['whatsappCliente'];
                                                                                $whatsapp = preg_replace("/[^0-9]/", "", $whatsapp);
                                                                            ?>
                                                                            <a href="https://api.whatsapp.com/send?phone=55<?=$whatsapp?>">
                                                                                <?=$lc['whatsappCliente']?>
                                                                            </a>
                                                                        </span>
                                                                    </div>
                                                                    <div class="col-lg-12 mb-5">
                                                                        Endereço para entrega:<br>
                                                                        <span class="text-primary">
                                                                            <?php
                                                                                echo $lc['logradouro'].", Nº:".$lc['numero'].", ".$lc['complemento'];
                                                                            ?>
                                                                        </span>
                                                                        <span class="text-primary">
                                                                            <?php
                                                                                echo $lc['referencia']." - ".$lc['bairro']." - ".$lc['cidade'];
                                                                            ?>
                                                                        </span>
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
<div class="modal fade" id="modalExCl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <button type="button" id="excluirCl" class="btn btn-danger"><i class="ion-trash-a"></i> Sim, excluir.</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="addCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-light">
      <div class="modal-header bg-primary">
        <h3 class="modal-title text-white" id="exampleModalLabel">Adicionar Cliente</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="needs-validation mt-3" id="cadastroCliente" novalidate>
            <div class="col-lg-6 offset-lg-3 text-center section-title mb-5">
                <h3>Informações Gerais</h3>
            </div>
            <div class="form-group row d-flex align-items-center mb-3">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Nome *</label>
                <div class="col-lg-5">
                    <input type="text" class="form-control" id="nome" placeholder="Digite seu nome">
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-3">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Sobrenome *</label>
                <div class="col-lg-5">
                    <div class="input-group">
                        <input type="text" class="form-control" id="sobrenome" placeholder="Digite seu sobrenome">
                    </div>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-3">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Telefone *</label>
                <div class="col-lg-5">
                    <div class="input-group">
                        <input type="text" class="form-control telefone" id="telefone" placeholder="Digite seu número de telefone">
                    </div>
                </div>
            </div>
            <div class="form-group row mb-3">
                <div class="col-lg-6 offset-lg-4">
                    <div class="custom-control custom-checkbox styled-checkbox">
                        <input class="custom-control-input" type="checkbox" name="checkbox" id="check">
                        <label class="custom-control-descfeedback" for="check">O número de telefone acima é o mesmo do WhatsApp.</label>
                    </div>
                </div>
            </div>
            <div id="wpp" class="form-group row align-items-center mb-3 d-flex">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">WhatsApp</label>
                <div class="col-lg-5">
                    <div class="input-group">
                        <input type="text" class="form-control telefone" id="whatsapp" placeholder="Digite seu número do WhatsApp">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 offset-lg-3 text-center section-title mt-5 mb-5">
                <h3>Informações da Conta</h3>
            </div>
            <div class="form-group row d-flex align-items-center mb-3">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">E-mail *</label>
                <div class="col-lg-5">
                    <div class="input-group">
                        <input type="email" class="form-control" id="email" placeholder="Digite seu e-mail">
                    </div>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-3">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Senha *</label>
                <div class="col-lg-5">
                    <input type="password" class="form-control" id="senha" placeholder="Digite sua senha">
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-3">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Confirmar Senha *</label>
                <div class="col-lg-5">
                    <input type="password" class="form-control" id="csenha" placeholder="Digite sua senha novamente">
                </div>
            </div>
            <div class="em-separator separator-dashed"></div>
            <div class="text-center">
                <button class="btn btn-gradient-01" type="submit">Cadastrar Cliente</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php require 'suporte/footer.php' ?>