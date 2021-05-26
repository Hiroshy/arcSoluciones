<div class="container-fluid py-5 scroll-margin-5">
    <div class="container"> 
        <div class="form-group text-center">
            <p class="h1 text-uppercase text-titulo">Soluciones en  ..</p>
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
                $productos=$productos->sqlquery("SELECT producto.id,producto.slug,producto.producto,producto.resumen_largo,producto.resumen_corto,producto.puntuacion,producto.foto,producto.orden,producto.meta_description,producto.meta_keyword,categoria.slug as 'slug-categoria' FROM `producto` INNER JOIN categoria ON producto.id_categoria=categoria.id ORDER BY orden;");
                  
                foreach ($productos as $producto) {
                    $foto=json_decode(base64_decode($producto['foto']));
                ?>
                <div class="swiper-slide" itemtype="http://schema.org/Product" itemscope>
                    <div class="card">
                        
                        <div class="box-img">
                            <a href="/producto/<?php echo $producto['slug-categoria']?>/<?php echo $producto['slug']?>">
                                <img loading="lazy" src="/assets/media/producto/<?php echo $foto[0]; ?>" class="card-img-top" alt="">
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

                        
                        <meta itemprop="mpn" content="925872" />
                        <meta itemprop="name" content="<?php echo $producto['producto']?>" />
                        <link itemprop="image" href="https://www.arcsoluciones.com.mx/assets/media/producto/<?php echo $foto[0]; ?>" />
                        <meta itemprop="description" content="<?php echo $producto['resumen_corto']?>" />
                        <div itemprop="offers" itemtype="http://schema.org/Offer" itemscope>
                            <link itemprop="url" href="https://www.arcsoluciones.com.mx/producto/<?php echo $producto['slug-categoria']?>/<?php echo $producto['slug']?>" />
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
                            <meta itemprop="name" content="ARC SOLUCIONES" />
                        </div>
                        <a href="/producto/<?php echo $producto['slug-categoria']?>/<?php echo $producto['slug']?>" class="text-decoration" class="text-light">
                            <div class="container pt-2 dark-2 text-light d-flex prueba">
                                <h5 class="text-parrafo"><?php echo $producto['producto']?></h5>
                            </div>
                        </a>
                        <div class="card-body">
                        <p class="card-text text-justify">
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