<?php
    include("../../modelo/bd.php");
    include("../../modelo/info.class.php");
    include("../../modelo/categoria.class.php");
    include("../../modelo/producto.class.php");
    include("../../modelo/interesado.class.php");
    include("../../modelo/usuarios.class.php");
    include("../../modelo/backend.class.php");


    $new_site=new Site();
  
    $registro=[
      "campo"=>"*"
    ];
  
    $datos=$new_site->consultar($registro);
  
    foreach($datos as $dato){
      $datos_WebSite=[
        "autor"=>"invirix",
        "logo_pestana"=>$dato['logo_pestana'],
        "logo"=>$dato['logo'],
        "titulo_web_site"=>$dato['titulo_web_site'],
        "titulo_alternativo"=>$dato['titulo_alternativo'],
        "meta_title"=>$dato['meta_title'],
        "meta_description"=>$dato['meta_description'],
        "meta_keywords"=>$dato['meta_keywords'],
      ];
    }

    /***Categorias-- */
    $categorias=new Categoria();
    
    /***Productos-- */
    $productos=new Productos();
  
    /***Interesado-- */
    $interesados=new Interesado();
?>
<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?php echo "$datos_WebSite[meta_description]".PHP_EOL;?>">
  <meta name="author" content="<?php  echo "$datos_WebSite[autor]".PHP_EOL; ?>">
  <title><?php  echo "$datos_WebSite[titulo_web_site]".PHP_EOL; ?> - Favoritos</title>
  <!-- Favicon -->
    <link rel="icon" href="\assets\media\empresa\<?php  echo "$datos_WebSite[logo_pestana]".PHP_EOL; ?>" type="image/png">
  <!-- Font Awesome 5 -->
  <link rel="stylesheet" href="../../assets/libs/%40fortawesome/fontawesome-pro/css/all.min.css"><!-- Purpose CSS -->
  <link rel="stylesheet" href="../../assets/css/purpose.css" id="stylesheet">
</head>

<body class="application application-offset">
  <!-- Application container -->
  <div class="container-fluid container-application">
    <?php include_once("../../application/part/navbar-left.php") ?>
    <!-- Content -->
    <div class="main-content position-relative">
      <!-- Main nav -->
      <?php include_once("../../application/part/navbar-top.php") ?>
      <!-- Page content -->
      <div class="page-content">
        <!-- Page title -->
        <div class="page-title">
          <div class="row justify-content-between align-items-center">
            <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-start mb-3 mb-md-0">
              <!-- Page title + Go Back button -->
              <div class="d-inline-block">
                <h5 class="h4 d-inline-block font-weight-400 mb-0 text-white">Favoritos</h5>
              </div>
              <!-- Additional info -->
            </div>
            
          </div>
        </div>
        <!-- Listing -->
        <div class="row">
          <?php 
            $contador=new usuarios();
            $contador=$contador->sqlquery("SELECT COUNT(*) as 'cuenta' FROM `producto_favorito_usuario` WHERE id_usuario=$_SESSION[id]");
                if($contador[0]['cuenta'] >= 1){

                  $contador=new usuarios();
                  $contador=$contador->sqlquery("SELECT producto.id,producto.producto,producto.resumen_corto,producto.slug,producto.foto,producto.puntuacion,categoria.slug as 'slugCategoria',categoria.categoria FROM producto_favorito_usuario INNER JOIN producto ON producto_favorito_usuario.id_producto=producto.id   INNER JOIN categoria ON producto.id_categoria=categoria.id  WHERE id_usuario=$_SESSION[id]");
                  foreach($contador as $contador):
          ?>
            <div class="col-lg-4">
              <div class="card hover-shadow-lg">
                <div class="card-header border-0">
                  <div class="row align-items-center">
                    <div class="col-10">
                      <h6 class="mb-0"><a href="/producto/<?php echo $contador['slugCategoria'];?>/<?php echo $contador['slug'];?>" class="text-uppercase"><?php echo $contador['producto'];?></a></h6>
                    </div>
                    <div class="col-2 text-right">
                    </div>
                  </div>
                </div>
                <div class="card-body pt-0">
                  <div class="p-3 border border-dashed">
                    <span class="text-sm text-muted font-weight-600">Categoria #<a href="/categoria/<?php echo $contador['slugCategoria'];?>"><?php echo $contador['categoria'];?></a></span>
                    <div class="row align-items-center mt-3">
                      <div class="col-12">
                        <span class="text-sm text-muted">
                          <?php echo $contador['resumen_corto'];?>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="media mt-4 align-items-center">
                    <img alt="Image placeholder" src="/assets/media/producto/<?php echo json_decode(base64_decode($contador['foto']))[0]; ?>" class="avatar  rounded-circle avatar-sm">
                    <div class="media-body pl-3">
                      <div class="text-sm my-0">PUNTUACIÓN: <a href="#" class="text-primary font-weight-bold"><?php echo $contador['puntuacion'];?></a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php 
          endforeach;
            }else{
              ?>
              <div class="col-lg-12">
                <div class="card hover-shadow-lg">
                  <div class="card-header border-0 text-center">
                    <div class="form-row">
                      <div class="col-md-6 py-3 align-self-center">
                        <p class="h1">
                          No tienes ningun servicio añadido como favorito.
                        </p>
                        <a href="/" class="btn btn-primary">
                        <i class="fas fa-shopping-basket"></i> Visitar
                        </a>
                      </div>
                      <div class="col-md-6 py-3 align-self-center">
                        <i class="fas fa-store-alt fa-6x text-primary"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
            }
          ?>
        </div>
      </div>
      <!-- Footer -->
      <?php include_once("../../application/part/footer.php") ?>
    </div>
  </div>
  <!-- Scripts -->
  <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
  <script src="../../assets/js/purpose.core.js"></script>
  <!-- Page JS -->
  <script src="../../assets/libs/dropzone/dist/min/dropzone.min.js"></script>
  <script src="../../assets/libs/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="../../assets/libs/quill/dist/quill.min.js"></script>
  <script src="../../assets/libs/select2/dist/js/select2.min.js"></script>
  <script src="../../assets/libs/flatpickr/dist/flatpickr.min.js"></script>
  <!-- Purpose JS -->
  <script src="../../assets/js/purpose.js"></script>
  <!-- Demo JS - remove it when starting your project -->
  <script src="../../assets/js/demo.js"></script>
  
</body>


<!-- Mirrored from preview.webpixels.io/purpose-application-ui-kit/application/task/create-new by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Nov 2020 09:10:10 GMT -->
</html>