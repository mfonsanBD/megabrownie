<?php require 'suporte/header.php' ?>
<div class="page-header pt-5 pb-5 pl-0 pr-0 titulo-cliente">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 text-center">
                <h2 class="page-header-title text-white text-uppercase mr-4" style="font-size: 40px;">Notícias</h2>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-10 offset-xl-1 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 mt-5">
                <div class="row">
                    <?php foreach ($listaNoticias as $ln) :
                        if ($ln['imagemBlog'] == 'padrao.jpg') {
                            $foto = URL_BASE."assets/img/".$ln['imagemBlog'];
                        }else{
                            $foto = URL_BASE."assets/img/blog/".$ln['imagemBlog'];
                        }
                    ?>
                        <div class="col-lg-4">
                            <div class="fotoNoticiaCliente">
                                <img src="<?=$foto?>" alt="<?=$ln['tituloBlog']?>">
                            </div>
                            <a href="<?=URL_BASE.$ln['slug'].'/'?>">
                                <h2 class="text-dark text-uppercase mt-3" style="font-weight: 600 !important"><?=$ln['tituloBlog']?></h2>
                            </a><br>
                            <span class="mb-4"><?=date('d/m/Y', strtotime($ln['dataBlog']))?></span><br>
                            <?=mb_strimwidth($ln['textoBlog'], 0, 200, "...")?>
                            <p><a href="<?=URL_BASE.$ln['slug'].'/'?>" class="btn btn-primary rounded text-white btn-block mt-4 mr-1 mb-5">Leia Mais</a></p>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'suporte/footer.php' ?>