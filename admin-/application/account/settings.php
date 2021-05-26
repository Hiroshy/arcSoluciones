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
  <title><?php  echo "$datos_WebSite[titulo_web_site]".PHP_EOL; ?> - Configurar</title>
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
                <h5 class="h4 d-inline-block font-weight-400 mb-0 text-white">Configurar cuenta</h5>
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
              <div class="card-header">
                <h5 class=" h6 mb-0">Cambiar cuenta</h5>
              </div>
              <div class="card-body">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">Contraseña Actual</label>
                        <input class="form-control" type="password" name="oldPassword">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">Nueva contraseña</label>
                        <input class="form-control" type="password" name="password">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">Confirmar contraseña</label>
                        <input class="form-control" type="password" name="rePassword">
                      </div>
                    </div>
                  </div>
                  <div class="mt-4">
                    <button type="submit" name="cambiaPass" class="btn btn-sm btn-primary rounded-pill">Actualizar</button>
                  </div>
                </form>
              </div>
            </div>

            <?php
              if (isset($_POST['cambiaPass'])) {
                $myoldPassword=$_POST['oldPassword'];
                $mypassword=$_POST['password'];
                $rePassword=$_POST['rePassword'];

                // Encriptando

                $oldPassword=openssl_encrypt($myoldPassword,$metodo,$pass);
                $password=openssl_encrypt($mypassword,$metodo,$pass);
                

                if ($mypassword != $rePassword) {
                  echo '
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong> <i class="fas fa-bug"></i> !</strong> No coinciden las contraseñas.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  ';
                  echo $mypassword;
                  echo "<br>";
                  echo $rePassword;
                }else{
                  $contador=new usuarios();
                  $contador=$contador->sqlquery("SELECT COUNT(*) as 'cuenta' FROM `usuario` WHERE clave='$oldPassword'");
                  if ($contador[0]['cuenta']==1) {
                    $contador=new usuarios();
                    $contador=$contador->sqlquery("UPDATE `usuario` SET clave='$password' WHERE clave='$oldPassword'");  
                    echo '
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong> <i class="far fa-smile-wink"></i> !</strong> Contraseña actualizada.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    ';
                  }else{
                    echo '
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong> <i class="fas fa-bug"></i> !</strong> Esa no es tu contraseña actual.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                  ';
                  }
                }
              }
            ?>


            <div id="cambiaFoto" class="col-lg-8 order-lg-1">
              <div class="card">
                <div class="card-header">
                  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype=multipart/form-data>
                    <p class="lead text-dark font-weight-bold">Actualizar foto de Perfil</p>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile" name="img_usuario">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <div class="mt-4">
                      <button type="submit" name="changeFoto" class="btn btn-sm btn-primary rounded-pill">Actualizar</button>
                    </div>
                  </form>

                  <?php
                  if (isset($_POST['changeFoto'])) {
                    $ruta='../../../assets/media/usuarios/';
                    $datos=[
                      "img_usuario_name"=>$_FILES['img_usuario']['name'],
                      "img_usuario_tmp_name"=>$_FILES['img_usuario']['tmp_name'],
                      "img_usuario_type"=>$_FILES['img_usuario']['type'],
                      "img_usuario_size"=>$_FILES['img_usuario']['size']
                    ];
                    if ((strpos($_FILES['img_usuario']['type'], "gif") || strpos($_FILES['img_usuario']['type'], "jpeg") || strpos($_FILES['img_usuario']['type'], "png") && ($_FILES['img_usuario']['size'] < 100000))) {
                      move_uploaded_file($_FILES['img_usuario']['tmp_name'], $ruta.$datos["img_usuario_name"]);
                    }
                    $contador=new usuarios();
                    $contador=$contador->sqlquery("UPDATE `usuario` SET foto='$datos[img_usuario_name]' WHERE id=$datos_usuario[id]");  
                    echo '
                        <script>
                          location.href="/admin-/application/account/settings";
                        </script>
                    ';                  }
                  ?>
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
  <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
  <script>
    $(document).ready(function () {
      bsCustomFileInput.init()
    })
  </script>
</body>
</html>