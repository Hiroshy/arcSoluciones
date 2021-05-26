<div id="categorias" class="ccontainer-fluid py-5 scroll-margin-5">
    <div class="container py4"> 
        <div class="form-group text-center">
            <p class="h1 text-uppercase text-titulo">Productos Principales</p>
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
                $categorias=new Categoria;
                $categorias=$categorias->sqlquery("SELECT * FROM `categoria` WHERE NOT servicio=1 ORDER BY orden");
                foreach ($categorias as $categoria) {
            ?>
            <div class="swiper-slide">
                <a href="/categoria/<?php echo htmlspecialchars($categoria['slug']); ?>" data-toggle="tooltip" data-placement="left" title="<?php echo htmlspecialchars($categoria['resumen']);?>">
                    <div class="card">
                        <img loading="lazy" src="<?php echo (strlen($categoria['foto'])>1)?"/assets/media/categoria/".$categoria['foto']:'/assets/media/logo_arc.png' ?>" class="card-img-top" alt="">
                        <!-- <div class="card-body">
                            <div class="form-group">
                                <p class="text-parrafo text-dark text-uppercase font-weight-bold"><?php echo htmlspecialchars($categoria['categoria']) ?></p>
                            </div>
                        </div>-->
                    </div>
                </a>
            </div>
            <?php 
                }
            ?>
            </div>
            <!-- Add Pagination  <div class="swiper-pagination"></div>-->
            
        </div>
    </div>
</div>