<?php
  include_once("admin-/modelo/bd.php");
  include_once("admin-/modelo/info.class.php");
  include_once("admin-/modelo/interesado.class.php");
  include_once("admin-/modelo/categoria.class.php");
  include_once("admin-/modelo/producto.class.php");
  include_once("admin-/modelo/usuarios.class.php");

  include_once("./part/info_page_category.php");
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
    <div class="container-fluid py-5 scroll-margin-5">
    <div class="container py-4"> 
        <div class="form-group text-center">
            <p class="h1 text-uppercase text-titulo-other">Todo en <?php echo $info_empresa_meta['lema']; ?> </p>
        </div>
        <p class="lead text-center">
            La tranquilidad de tener una protección para tu recurso humano y material en una sola administración.
        </p>
    </div>
    <div class="container pt-3">
        <!-- Swiper -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php
                $productos=$productos->sqlquery("SELECT producto.id,producto.slug,producto.producto,producto.resumen_largo,producto.resumen_corto,producto.puntuacion,producto.foto,producto.orden,producto.meta_description,producto.meta_keyword,categoria.slug as 'slug-categoria' 
                FROM `producto` 
                INNER JOIN categoria 
                ON producto.id_categoria=categoria.id 
                WHERE categoria.slug='$_GET[slug]' ;");
                  
                foreach ($productos as $producto) {
                    $foto=json_decode(base64_decode($producto['foto']));
                ?>
                <div class="swiper-slide" itemtype="http://schema.org/Product" itemscope>
                    <div class="card">
                        <a href="/producto/<?php echo $producto['slug-categoria']?>/<?php echo $producto['slug']?>">

                            <div class="box-img">
                                <a href="/producto/<?php echo $producto['slug-categoria']?>/<?php echo $producto['slug']?>">
                                    <img src="/assets/media/producto/<?php echo $foto[0]; ?>" class="card-img-top" alt="">
                                </a>
                                <button id="<?php echo $producto['id']?>" type="button" class="i_liked  
                                <?php
                                    if(isset($_SESSION['id'])):
                                        $validator=new usuarios();
                                        $validator=$validator->sqlquery("SELECT COUNT(*) as 'cuenta' FROM `producto_favorito_usuario` WHERE id_producto=$producto[id] AND id_usuario=$_SESSION[id] ");                            
                                        if($validator[0]['cuenta'] >= 1):
                                            echo "text-danger";
                                        endif;
                                    endif;
                                ?>
                                ">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>

                        </a>
                        <meta itemprop="mpn" content="925872" />
                        <meta itemprop="name" content="Executive Anvil" />
                        <link itemprop="image" href="https://example.com/photos/16x9/photo.jpg" />
                        <meta itemprop="description" content="Sleeker than ACME's Classic Anvil, the Executive Anvil is perfect for the business traveler looking for something to drop from a height." />
                        <div itemprop="offers" itemtype="http://schema.org/Offer" itemscope>
                            <link itemprop="url" href="https://example.com/anvil" />
                            <meta itemprop="availability" content="https://schema.org/InStock" />
                            <meta itemprop="priceCurrency" content="USD" />
                            <meta itemprop="itemCondition" content="https://schema.org/UsedCondition" />
                            <meta itemprop="price" content="119.99" />
                            <meta itemprop="priceValidUntil" content="2020-11-20" />
                        </div>
                        <div itemprop="aggregateRating" itemtype="http://schema.org/AggregateRating" itemscope>
                            <meta itemprop="reviewCount" content="89" />
                            <meta itemprop="ratingValue" content="4.4" />
                        </div>
                        <div itemprop="review" itemtype="http://schema.org/Review" itemscope>
                            <div itemprop="author" itemtype="http://schema.org/Person" itemscope>
                            <meta itemprop="name" content="Fred Benson" />
                            </div>
                            <div itemprop="reviewRating" itemtype="http://schema.org/Rating" itemscope>
                            <meta itemprop="ratingValue" content="4" />
                            <meta itemprop="bestRating" content="5" />
                            </div>
                        </div>
                        <meta itemprop="sku" content="0446310786" />
                        <div itemprop="brand" itemtype="http://schema.org/Brand" itemscope>
                            <meta itemprop="name" content="ACME" />
                        </div>
                        <a href="/producto/<?php echo $producto['slug-categoria']?>/<?php echo $producto['slug']?>" class="text-decoration" data-toggle="tooltip" data-placement="left" title="<?php echo $producto['resumen_corto']?>" class="text-light">
                            <div class="container pt-2 dark-2 text-light d-flex prueba">
                                <h5 class="text-parrafo"><?php echo $producto['producto']?></h5>
                            </div>
                        </a>
                        <div class="card-body">
                        <p class="card-text">
                            <?php echo $producto['resumen_corto']?>
                        </p>

                        <a href="/producto/<?php echo $producto['slug-categoria']?>/<?php echo $producto['slug']?>" class="text-dark font-weight-bold">
                            <small>Saber más</small>
                        </a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>            
        </div>
    </div>
</div>
    <?php include_once("./part/servicios.php"); ?>
    <?php include_once("./part/proceso.php"); ?>
    <?php include_once("./part/contacto.php"); ?>
    <?php include_once("./part/plugin.php"); ?>
    <?php include_once("./part/clientes.php"); ?>
    <?php include_once("./part/notification.php"); ?>
    <?php include_once("./part/footer.php"); ?>
    <?php include_once("./part/js.php"); ?>
    <script>
        var btnLike=Array.from(document.querySelectorAll('.i_liked'));

        for (let index = 0; index < btnLike.length; index++) {
            btnLike[index].addEventListener("click",(e)=>{
                e.preventDefault();
                var id=btnLike[index].id;
                const XHR=new XMLHttpRequest();
                console.log(id)
                XHR.open('POST','/me-gusta_in-category.php',true);
                XHR.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                XHR.send("idProduct="+id);
                
                XHR.onreadystatechange=function(){
                    if (this.readyState == 4 && this.status==200) {
                        <?php if (!isset($_SESSION['id']) || $_SESSION['id']=="" || $_SESSION['id']==null) { ?>
                            location.href="/iniciar-sesion?INVIRIX&token="+"<?php echo md5(rand(0,10)) ?>"+"&ENCRYPTED=256";
                        <?php }else{ ?>
                            console.log(this.responseText);
                            btnLike[index].classList.toggle('text-danger');
                        <?php } ?>
                    }
                }
            })
        }
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