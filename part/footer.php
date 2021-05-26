<footer class="container-fluid mt-5  py-5 dark-2 text-light">
    <div class="container">
        <div class="col-12 mb-3">
            <p class="lead text-parrafo">
                Te brindamos abanico de opciones que aseguran tu negocio ante diferentes riesgos, procurando las mejores ofertas comerciales que se adecuen a tus necesidades e intereses.
            </p>
        </div>
        <div class="row">
            <div class="col-md-4 align-self-center">
                <ul class="text-parrafo">
                    <li>
                        <a href="/" class="text-parrafo text-light pb-2">
                            Inicio
                        </a>
                    </li>
                    <li>
                        <a href="/nosotros" class="text-parrafo text-light pb-2">
                            Nosotros
                        </a>
                    </li>
                    <li>
                        <a href="#categorias" class="text-parrafo text-light pb-2">
                            Categorias
                        </a>
                    </li>
                    <li>
                        <a href="#servicios" class="text-parrafo text-light pb-2">
                            Servicio
                        </a>
                    </li>
                    <li>
                        <a href="#contacta" class="text-parrafo text-light pb-2">
                            Contáctanos
                        </a>
                    </li>
                </ul>  
            </div>
            <div class="col-md-5 align-self-center">
                <a href="tel:<?php echo  $info_empresa['telefono']; ?>" class="d-block text-light text-parrafo pb-2 text-break-all"><i class="fas fa-headphones"></i> <?php echo  $info_empresa['telefono']; ?></a>
                <a href="mailto:<?php echo  $info_empresa['email']; ?>" class="d-block text-light text-parrafo pb-2 text-break-all"><i class="fas fa-inbox"></i> <?php echo  $info_empresa['email']; ?></a>
                <a href="<?php echo  $info_empresa['link_direccion']; ?>" target=new class="d-block text-light text-parrafo pb-2 text-break-all">&nbsp;<i class="fas fa-map-pin"></i> &nbsp; <?php echo  $info_empresa['direccion']; ?></a>
            </div>
            <div class="col-md-3 text-justify align-self-center">
                <?php   
                    $meta_keyword=explode(",",$info_empresa_meta['meta_palabra_clave']);
                    for ($i=0; $i < count($meta_keyword); $i++) { 
                ?>
                    <h1 class="metakey"><?php echo htmlspecialchars($meta_keyword[$i]); ?></h1>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</footer>