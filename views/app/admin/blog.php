<?php require 'suporte/header.php' ?>
<div class="col-xl-10 offset-xl-1 mt-5">
    <div class="container">
        <div class="row">
            <div class="page-header">
                <div class="row">
                    <div class="col-xl-8 col-lg-8">
                        <h2 class="page-header-title mr-4">Blog</h2>
                        <button class="btn btn-primary btn-sm btn-square"><i class="ti ti-plus"></i> Nova Postagem</button>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <ul class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="<?=URL_BASE?>painel/"><i class="ti ti-home"></i></a></li>
                            <li class="breadcrumb-item active">Lista de Notícias</li>
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
                                        <th>Texto</th>
                                        <th>Data</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listaNoticias as $ln) :
                                        if ($ln['imagemBlog'] == 'padrao.jpg') {
                                            $foto = URL_BASE."assets/img/".$ln['imagemBlog'];
                                        }else{
                                            $foto = URL_BASE."assets/img/blog/".$ln['idBlog']."/".$ln['imagemBlog'];
                                        }
                                    ?>
                                        <tr>
                                            <td><img src="<?=$foto?>" width="80" alt="<?=$lpr['tituloBlog']?>"></td>
                                            <td><span class="text-primary"><?=$ln['tituloBlog']?></span></td>
                                            <td><?=mb_strimwidth($ln['textoBlog'], 0, 30, "...")?></td>
                                            <td><?=date('d/m/Y', strtotime($ln['dataBlog']))?></td>
                                            <td class="td-actions">
                                                <a href="#"><i class="la la-edit edit"></i></a>
                                                <a href="#"><i class="la la-close delete"></i></a>
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
<?php require 'suporte/footer.php' ?>