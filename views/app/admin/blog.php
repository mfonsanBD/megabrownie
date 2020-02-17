<?php require 'suporte/header.php' ?>
<div class="col-xl-10 offset-xl-1 mt-5">
    <div class="container">
        <div class="row">
            <div class="page-header">
                <div class="row">
                    <div class="col-xl-8 col-lg-8">
                        <h2 class="page-header-title mr-4">Blog</h2>
                        <button class="btn btn-primary btn-sm btn-square" data-toggle="modal" data-target="#addNoticia"><i class="ti ti-plus"></i> Nova Postagem</button>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <ul class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="<?=URL_BASE?>painel/"><i class="ti ti-home"></i></a></li>
                            <li class="breadcrumb-item active">Lista de Postagens</li>
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
                            <table id="tabela_blog" class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>Imagem</th>
                                        <th>Título</th>
                                        <th>Data</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listaNoticias as $ln) :
                                        if ($ln['imagemBlog'] == 'padrao.jpg') {
                                            $foto = URL_BASE."assets/img/".$ln['imagemBlog'];
                                        }else{
                                            $foto = URL_BASE."assets/img/blog/".$ln['imagemBlog'];
                                        }
                                    ?>
                                        <tr>
                                            <td>
                                                <div class="fotoNoticiaAdmin">
                                                    <img src="<?=$foto?>" alt="<?=$ln['tituloBlog']?>">
                                                </div>
                                            </td>
                                            <td><a href="<?=URL_BASE.$ln['slug'].'/'?>"><span class="text-primary"><?=$ln['tituloBlog']?></span></a></td>
                                            <td><?=date('d/m/Y H:i:s', strtotime($ln['dataBlog']))?></td>
                                            <td class="td-actions">

                                                <a data-toggle="modal" data-target="#modalEdNoticia" data-id="<?= $ln['idBlog']; ?>" data-titulo="<?= $ln['tituloBlog']; ?>"><i class="la la-edit edit"></i></a>

                                                <a data-toggle="modal" data-target="#modalExNoticia" data-id="<?= $ln['idBlog']; ?>" data-nome="<?= $ln['tituloBlog'];?>"><i class="la la-close delete"></i></a>
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
<div class="modal fade" id="modalExNoticia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-light">
      <div class="modal-header bg-danger">
        <h3 class="modal-title text-white" id="exampleModalLabel"></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="bg-light" id="excluiNoticia"> 
            <p class="texto-confirmacao text-center"></p>
            <div class="em-separator separator-dashed"></div>      
            <div class="text-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="ion-close"></i>  Não, cancelar.</button>
                <button type="button" id="excluirNoticia" class="btn btn-danger"><i class="ion-trash-a"></i> Sim, excluir.</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="addNoticia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered blog" role="document">
    <div class="modal-content bg-light">
      <div class="modal-header bg-primary">
        <h3 class="modal-title text-white" id="exampleModalLabel">Adicionar Postagem</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row d-flex align-items-center mb-3">
            <label class="col-lg-3 form-control-label d-flex justify-content-lg-end">Título da Postagem *</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" id="titulo" placeholder="Defina um título para sua postagem">
            </div>
        </div>
        <div class="form-group row d-flex align-items-center mb-3">
            <label class="col-lg-3 form-control-label d-flex justify-content-lg-end">Texto *</label>
            <div class="col-lg-9">
                <div class="input-group">
                    <textarea type="text" class="form-control" id="texto_blog" name="texto_blog"></textarea>
                </div>
            </div>
        </div>
        <div class="form-group row d-flex align-items-center mb-3">
            <label class="col-lg-3 form-control-label d-flex justify-content-lg-end">Imagem de Destaque *</label>
            <div class="col-lg-9">
                <div class="input-group">
                    <input type="file" class="form-control" id="imagem_destaque" name="imagem_destaque">
                </div>
            </div>
        </div>
        <div class="em-separator separator-dashed"></div>
        <div class="text-center">
            <button class="btn btn-gradient-01" type="submit" id="addPost">Cadastrar Postagem</button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalEdNoticia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered blog" role="document">
    <div class="modal-content bg-light">
      <div class="modal-header bg-primary">
        <h3 class="modal-title text-white" id="exampleModalLabel"></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row d-flex align-items-center mb-3">
            <label class="col-lg-3 form-control-label d-flex justify-content-lg-end">Título da Postagem *</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" id="edita_titulo" name="edita_titulo">
            </div>
        </div>
        <div class="form-group row d-flex align-items-center mb-3">
            <label class="col-lg-3 form-control-label d-flex justify-content-lg-end">Texto *</label>
            <div class="col-lg-9">
                <div class="input-group">
                    <textarea type="text" class="form-control" id="edita_texto_blog" name="edita_texto_blog"></textarea>
                </div>
            </div>
        </div>
        <div class="form-group row d-flex align-items-center justify-content-lg-end mb-3">
            <div class="col-lg-9">
                <div class="input-group">
                    <img id="preview" width="300">
                </div>
            </div>
        </div>
        <div class="form-group row d-flex align-items-center mb-3">
            <label class="col-lg-3 form-control-label d-flex justify-content-lg-end">Imagem de Destaque *</label>
            <div class="col-lg-9">
                <div class="input-group">
                    <input type="file" class="form-control" id="edita_imagem_destaque" name="edita_imagem_destaque">
                </div>
            </div>
        </div>
        <div class="em-separator separator-dashed"></div>
        <div class="text-center">
            <button class="btn btn-gradient-01" type="submit" id="editaPost">Editar Postagem</button>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require 'suporte/footer.php' ?>