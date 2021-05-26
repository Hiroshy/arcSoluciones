<?php
    $productos=new Productos();
    $systemNotification=$productos->sqlquery("SELECT producto.id,producto.slug,producto.producto,producto.resumen_largo,producto.resumen_corto,producto.puntuacion,producto.foto,producto.orden,producto.meta_description,producto.meta_keyword,categoria.slug as 'slug-categoria' FROM `producto` INNER JOIN categoria ON producto.id_categoria=categoria.id ORDER BY rand() LIMIT 1");
    foreach ($systemNotification as $producto) {
    $foto_portada_img=json_decode(base64_decode($producto['foto']));
?>
<div id="notificacion" class="box-notification">
    <a href="/producto/<?php echo $producto['slug-categoria']?>/<?php echo htmlspecialchars($producto['slug']) ?>">
        <div class="box-content">
            <div class="bar-time animate__animated animate__bounceIn">
                <div id="content-bar-time" class="content-bar-time "></div
            ></div>
            <div class="col-md-6 w-desktop px-0">
                <img loading="lazy" src="/assets/media/producto/<?php echo $foto_portada_img[0]; ?>" height="250px" class=img-fluid alt="">
            </div>
            <div class="col-md-6 py-3">
                <h1 class="text-titulo text-dark text-titulo-other">
                    <?php echo htmlspecialchars($producto['producto']) ?>
                </h1>
                <p class="text-parrafo text-dark">
                    <?php echo htmlspecialchars($producto['resumen_corto']) ?>        
                </p>
            </div>
        </div>
    </a>
</div>

<?php
    }
?>