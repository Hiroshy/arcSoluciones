<?php
  include_once("admin-/modelo/bd.php");
  include_once("admin-/modelo/info.class.php");
  include_once("admin-/modelo/interesado.class.php");
  include_once("admin-/modelo/categoria.class.php");
  include_once("admin-/modelo/producto.class.php");
  include_once("admin-/modelo/usuarios.class.php");

  include_once("./part/info_page.php");
?> 
<!doctype html>
<html lang="<?=$info_empresa['idioma']?>">
  <head>
    <?php include_once("./part/meta.php"); ?>
    <?php include_once("./part/css.php"); ?>
    <?php include_once("./part/opengraph.php"); ?>
    <?php include_once("./part/head-seguimiento.php"); ?>
    <title><?=(strlen($info_empresa_meta['lema'])>0)? strtoupper($info_empresa_meta['lema']) .' | '.strtoupper($info_empresa['empresa']):strtoupper($info_empresa['empresa'])?></title>
  </head>
  <body>
    <?php include_once("./part/body-seguimiento.php"); ?>
     
    <?php include_once("./part/header/nav.php"); ?>

    <div class="container-fluid mt-5 py-5">
        <?php $imagenes=json_decode(base64_decode($detalleProducto['imagenes'])); ?>
        <div class="container">
            <div class="row">
                <div class="col-md-5 align-self-center">
                    <div id="arc_producto" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php foreach($imagenes as $imagen): ?>
                            <div class="carousel-item">
                                <img src="/assets/media/producto/<?php echo $imagen; ?>" class="d-block w-100" loading="lazy" alt="<?php echo $detalleProducto['descripcion']; ?>">
                            </div>
                            <?php endforeach ?>
                        </div>
                        <a class="carousel-control-prev" href="#arc_producto" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#arc_producto" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-6" itemtype="http://schema.org/Course" itemscope>
                <meta itemprop="mpn" content="<?php echo $detalleProducto['slug']; ?>" />
                    <meta itemprop="name" content="Executive Anvil" />
                    <?php foreach($imagenes as $imagen): ?>
                    <link itemprop="image" href="/assets/media/producto/<?php echo $imagen; ?>" />
                    <?php endforeach ?>
                    <meta itemprop="description" content="<?php echo $detalleProducto['descripcion']; ?>" />
                    <div itemprop="offers" itemtype="http://schema.org/Offer" itemscope>
                        <link itemprop="url" href="<?php echo  $info_empresa['url_direccion']?>" />
                        <meta itemprop="availability" content="https://schema.org/InStock" />
                        <meta itemprop="priceCurrency" content="MXN" />
                        <meta itemprop="itemCondition" content="https://schema.org/NewCondition" />
                    </div>
                    <div itemprop="aggregateRating" itemtype="http://schema.org/AggregateRating" itemscope>
                        <meta itemprop="reviewCount" content="89" />
                        <meta itemprop="ratingValue" content="<?php echo $detalleProducto['puntuacion']; ?>" />
                    </div>
                    <div itemprop="review" itemtype="http://schema.org/Review" itemscope>
                        <div itemprop="author" itemtype="http://schema.org/Person" itemscope>
                        <meta itemprop="name" content="ARC SOLUCIONES" />
                        </div>
                        <div itemprop="reviewRating" itemtype="http://schema.org/Rating" itemscope>
                        <meta itemprop="ratingValue" content="<?php echo $detalleProducto['puntuacion']; ?>" />
                        <meta itemprop="bestRating" content="<?php echo $detalleProducto['puntuacion']; ?>" />
                        </div>
                    </div>
                    <meta itemprop="sku" content="<?php echo $detalleProducto['slug']; ?>" />
                    <div itemprop="brand" itemtype="http://schema.org/Brand" itemscope>
                        <meta itemprop="name" content="ACME" />
                    </div>
                    <div class="form-group">
                        <h1 class="text-titulo-other text-uppercase"><?php echo $detalleProducto['producto']; ?></h1>
                    </div>
                    <div class="form-group">
                        <?php
                            for ($i=0; $i <$detalleProducto['puntuacion'] ; $i++) { 
                        ?>
                            <i class="fas fa-star text-golden"></i>
                        <?php
                            }
                        ?>

                        <?php
                            for ($i=0; $i <5-$detalleProducto['puntuacion'] ; $i++) { 
                        ?>
                            <i class="far fa-star"></i>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="form-group">
                        <p class="text-parrafo lead">
                            <span class="text-titulo">Servicio</span> : <?php echo $detalleProducto['categoria']; ?>
                        </p>
                    </div>
                    <div class="form-group">
                        <p class="text-parrafo lead text-justify">
                            <?php echo $detalleProducto['resumen_largo']; ?>
                        </p>
                    </div>
                    <div class="form-group text-center ">
                        <a href="#contacta" class="btn-submit-form">Vamos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="opinionesComentarios" class="container py-5">
        <div class="row">
                <div class="col-12">
                    <div class="list-group list-group-horizontal text-center" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active text-uppercase text-parrafo fa-2x" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">
                            <i class="far fa-comment-dots"></i> <span class="w-desktop">opinar</span> 
                        </a>
                        <a class="list-group-item list-group-item-action text-uppercase text-parrafo fa-2x" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">
                            <i class="far fa-grin-stars"></i> <span class="w-desktop">reseñas</span>
                        </a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                        <?php include_once("./part/producto/opinar.php"); ?>
                    </div>
                    <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                        <?php include_once("./part/producto/resenas.php"); ?>
                    </div>                
                </div>
            </div>
        </div>
    </div>
    <?php include_once("./part/servicios.php"); ?>
    <?php include_once("./part/palabra-.php"); ?>
    <?php include_once("./part/proceso.php"); ?>
    <?php include_once("./part/contacto.php"); ?>
    <?php include_once("./part/plugin.php"); ?>
    <?php include_once("./part/clientes.php"); ?>
    <?php include_once("./part/notification.php"); ?>
    <?php include_once("./part/footer.php"); ?>
    <?php include_once("./part/js.php"); ?>
    <script>
        let itemCarousel=document.querySelectorAll(".carousel-item")
        itemCarouselArray=Array.from(itemCarousel)
        itemCarouselArray[0].classList.add("active")
    </script>
  </body>
</html>
    
</body>
</html>
<?php
    // echo bin2hex("ARC SOLUCIONES");

    // echo "==================================";

    // $palabra="ARC SOLUCIONES";
    // $pass="123";
    // $metodo="aes256";

    // $encriptado=openssl_encrypt($palabra,$metodo,$pass);

    // echo "Texto encriptado en AES 256 : ".$encriptado."<br/>";

    // echo "Texto desencriptado en AES 256 : ".openssl_decrypt($encriptado,$metodo,$pass)."<br/>";

    // echo "INVRX-".rand(0,9999);