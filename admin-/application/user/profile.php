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
  <title><?php  echo "$datos_WebSite[titulo_web_site]".PHP_EOL; ?> - Perfil</title>
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
                <h5 class="h4 d-inline-block font-weight-400 mb-0 text-white">Mi Perfil</h5>
              </div>
              <!-- Additional info -->
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <!-- Profile stats -->
            <div class="card card-fluid">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <!-- Avatar -->
                    <a href="#" class="avatar rounded-circle">
                      <img alt="Image placeholder" src="<?php echo(strlen($datos_usuario['foto'])>=2)?'/assets/media/usuarios/'.$datos_usuario['foto']:'/assets/media/empresa/'.$datos_WebSite['logo_pestana'];?>" class="">
                    </a>
                  </div>
                  <div class="col ml-md-n2">
                    <a href="/admin-/application/account/profile" class="d-block h6 mb-0"><?php echo $datos_usuario['nombre'];?></a>
                    <small class="d-block text-muted"><?php echo $datos_usuario['email'];?></small>
                  </div>
                  <div class="col-auto">
                    <a href="/admin-/application/account/profile" class="btn btn-xs btn-primary btn-icon rounded-pill">
                      <span class="btn-inner--icon"><i class="far fa-edit"></i></span>
                      <span class="btn-inner--text">Edit</span>
                    </a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-6 text-center">
                    <span class="h5 mb-0">
                    <?php
                      $contador=new usuarios();
                      $contador=$contador->sqlquery("SELECT COUNT(*) as 'cuenta' FROM `producto_favorito_usuario` WHERE id_usuario=$_SESSION[id]");
                      echo $contador[0]['cuenta'];
                    ?>
                    </span>
                    <span class="d-block text-sm">Favoritos</span>
                  </div>
                  <div class="col-6 text-center">
                    <span class="h5 mb-0">0</span>
                    <span class="d-block text-sm">Certificados</span>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="row align-items-center">
                  <div class="col-4">
                  </div>
                  <div class="col-8 text-right">
                    <a href="/admin-/application/account/my-certificate" class="btn btn-xs btn-secondary rounded-pill"><i class="far fa-receipt"></i> Mis Certificados</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <!-- Profile contacts -->
            <div class="card card-fluid">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">
                    <h6 class="text-sm mb-0">
                      <i class="fab fa-facebook mr-2"></i>Facebook
                    </h6>
                  </div>
                  <div class="col-auto">
                    <span class="text-sm">
                      <a href=" //facebook.com<?php echo $redes_sociales['facebook']; ?>" target="new">
                        <?php echo $redes_sociales['facebook']; ?>
                      </a>
                    </span>
                  </div>
                </div>
                <hr class="my-3">
                <div class="row align-items-center">
                  <div class="col">
                    <h6 class="text-sm mb-0">
                      <i class="fab fa-whatsapp mr-2"></i>WhatsApp
                    </h6>
                  </div>
                  <div class="col-auto">
                    <span class="text-sm">
                      <a href="//tel:<?php echo $datos_usuario['telefono'] ?>">
                        <?php echo $datos_usuario['telefono'] ?>
                      </a>
                    </span>
                  </div>
                </div>
                <hr class="my-3">
                <div class="row align-items-center">
                  <div class="col">
                    <h6 class="text-sm mb-0">
                      <i class="fab fa-instagram mr-2"></i>Instagram
                    </h6>
                  </div>
                  <div class="col-auto">
                    <span class="text-sm">
                      <a href="//www.instagram.com<?php echo $redes_sociales['instagram']; ?>">
                        <?php echo $redes_sociales['instagram']; ?>
                      </a>
                    </span>
                  </div>
                </div>
                <hr class="my-3">
                <div class="row align-items-center">
                  <div class="col">
                    <h6 class="text-sm mb-0">
                      <i class="fab fa-linkedin mr-2"></i>Twitter
                    </h6>
                  </div>
                  <div class="col-auto">
                    <span class="text-sm">
                    <a href="//twitter.com<?php echo $redes_sociales['twitter']; ?>">
                      <?php echo $redes_sociales['twitter']; ?>
                    </a>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <!-- Profile performance -->
            <div class="card card-fluid">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">
                    <h6 class="text-sm mb-0">Dirección</h6>
                    <span class="text-nowrap h6 text-muted text-sm"><?php echo  $direccion_usuario["direccion"]; ?></span>
                  </div>
                </div>
                <hr class="my-3">
                <div class="row align-items-center">
                  <div class="col">
                    <h6 class="text-sm mb-0">Ciudad</h6>
                    <span class="text-nowrap h6 text-muted text-sm"><?php echo  $direccion_usuario["ciudad"]; ?></span>
                  </div>
                </div>
                <hr class="my-3">
                <div class="row align-items-center">
                  <div class="col">
                    <h6 class="text-sm mb-0">Pais</h6>
                    <span class="badge badge-xs badge-soft-info ml-2"> MX</span>
                  </div>
                </div>
                <hr class="my-3">
                <div class="row align-items-center">
                  <div class="col">
                    <h6 class="text-sm mb-0">Comentarios</h6>
                    <span class="text-nowrap h6 text-muted text-sm"><?php echo  $direccion_usuario["pais"]; ?></span></span>
                  </div>
                </div>
                <hr class="my-3">
                <div class="row align-items-center">
                  <div class="col">
                    <h6 class="text-sm mb-0">CP</h6>
                    <span class="badge badge-xs badge-soft-info ml-2"><i class="far fa-arrow-up"></i> <?php echo  $direccion_usuario["cp"]; ?></span></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
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