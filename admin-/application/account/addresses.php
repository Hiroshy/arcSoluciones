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

    if ($datos_usuario['nivel']=='' || $datos_usuario['nivel']==null) {
      echo '<script>location.href="/"</script>';
    }
?>
<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?php echo "$datos_WebSite[meta_description]".PHP_EOL;?>">
  <meta name="author" content="<?php  echo "$datos_WebSite[autor]".PHP_EOL; ?>">
  <title><?php  echo "$datos_WebSite[titulo_web_site]".PHP_EOL; ?> - Dirección</title>
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
                <h5 class="h4 d-inline-block font-weight-400 mb-0 text-white">Mi Direccion</h5>
              </div>
              <!-- Additional info -->
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-end">
            </div>
          </div>
        </div>
        <div class="row">
          <?php include_once("menu.php") ?>
          <div class="col-lg-8 order-lg-1">
            <div class="card">
              <div class="card-header border-0">
                <h5 class=" h6 mb-0">
                    <?php
                      if(isset($_POST['direccion'])){
                        $ciudad=$_POST['city'];
                        $calle=$_POST['address'];
                        $comentarios=$_POST['comentarios'];
                        $cp=$_POST['zipcode'];

                        $contador=new usuarios();
                        $contador=$contador->sqlquery("INSERT INTO usuario_direccion (`id_usuario`, `direccion`, `ciudad`, `pais`, `comentarios`, `cp`) VALUES ($datos_usuario[id],'$calle','$ciudad','MX','$comentarios','$cp') ON DUPLICATE KEY UPDATE direccion = '$calle', ciudad = '$ciudad', pais = 'MX', pais = '$comentarios', cp = '$cp';");
                        echo "Cambios guardados con éxito";
                      }else{
                        echo "Inserta o Actualiza tu Dirección";
                      }
                    ?>
                </h5>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h5 class=" h6 mb-0">Añadir mi dirección</h5>
              </div>
              <!-- New address -->
              <div class="card-body">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">Ciudad</label>
                        <input class="form-control" required="" name="city" type="text">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">Pais</label>
                        <input class="form-control" required="" name="county" type="text" value="MX" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-9">
                      <div class="form-group">
                        <label class="form-control-label">Calle</label>
                        <input class="form-control" placeholder="Calle, Número, Alcaldia o Municipio, Departamento., etc" required="" name="address" type="text">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-control-label">Código Póstal</label>
                        <input class="form-control" required="" name="zipcode" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label">Referencias o Comentarios</label>
                        <textarea name="comentarios" class="form-control"></textarea>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <!-- Save changes -->
                  <div>
                    <button type="submit" name="direccion" class="btn btn-sm btn-primary rounded-pill">Guardar</button>
                  </div>
                </form>
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