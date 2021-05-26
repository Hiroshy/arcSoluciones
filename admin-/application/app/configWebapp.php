<?php
    include("../../modelo/bd.php");
    include("../../modelo/info.class.php");
    include("../../modelo/empresa.class.php");
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
        "email"=>$dato['email'],
        "telefono"=>$dato['telefono'],
        "direccion"=>$dato['direccion'],
        "url_direccion"=>$dato['url_direccion'],
        "titulo_alternativo"=>$dato['titulo_alternativo'],
        "meta_title"=>$dato['meta_title'],
        "meta_description"=>$dato['meta_description'],
        "meta_keywords"=>$dato['meta_keywords'],
      ];
    }

  /***Empresas */
  $empresas=new Empresas();
  if ($datos_usuario['nivel']=='usuario') {
    echo '<script>location.href="/admin-/application/account/profile"</script>';
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?php echo "$datos_WebSite[meta_description]".PHP_EOL;?>">
  <meta name="author" content="<?php  echo "$datos_WebSite[autor]".PHP_EOL; ?>">
  <title><?php  echo "$datos_WebSite[titulo_web_site]".PHP_EOL; ?> - Config Web App</title>
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
        <!-- Modals -->
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <!-- Page title -->
            <div class="page-title">
              <div class="row justify-content-between align-items-center">
                <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-start mb-3 mb-md-0">
                  <!-- Page title + Go Back button -->
                  <div class="d-inline-block">
                    <h5 class="h4 d-inline-block font-weight-400 mb-0 text-white">Editar WEBAPP</h5>
                  </div>
                  <!-- Additional info -->
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-end">
                  <a href="/admin-/application/user/new-user" class="btn btn-sm btn-white btn-icon rounded-pill mb-3">
                    <span class="btn-inner--icon"><i class="far fa-users"></i></span>
                    <span class="btn-inner--text">Crear Usuario</span>
                  </a>
                </div>
              </div>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="card">
                <div class="card-body">
                  <div class="form-group">
                    <label class="form-control-label">
                      Empresa
                    </label>
                    <input type="text" class="form-control" name="empresa" value="<?php  echo "$datos_WebSite[titulo_web_site]".PHP_EOL; ?>">
                  </div>
                  <!-- Titulo alt -->
                  <div class="form-group">
                    <label class="form-control-label">
                        Titulo Alternativo
                    </label>
                    <input type="text" class="form-control" name="titulo_alt" value="<?php  echo htmlspecialchars("$datos_WebSite[titulo_alternativo]")?>" >
                  </div>
                  <!-- Email -->
                  <div class="form-group">
                    <label class="form-control-label mb-0">
                      Email
                    </label>
                    <textarea name="email" id="" class="form-control"><?php  echo htmlspecialchars("$datos_WebSite[email]")?></textarea>
                  </div>

                  <!-- Teléfono -->
                  <div class="form-group">
                    <label class="form-control-label mb-0">
                        Telefono
                    </label>
                    <textarea name="telefono" id="" class="form-control"><?php  echo htmlspecialchars("$datos_WebSite[telefono]")?></textarea>
                  </div>

                  <!-- Dirección -->
                  <div class="form-group">
                    <label class="form-control-label mb-0">
                        Dirección
                    </label>
                    <textarea name="direccion" id="" class="form-control"><?php  echo htmlspecialchars("$datos_WebSite[direccion]")?></textarea>
                  </div>

                  <!-- Dirección -->
                  <div class="form-group">
                    <label class="form-control-label mb-0">
                        URL Dirección (g-maps)
                    </label>
                    <textarea name="url_direccion" id="" class="form-control"><?php  echo htmlspecialchars("$datos_WebSite[url_direccion]")?></textarea>
                  </div>
                    <!-- Divider -->
                    <hr class="mt-5 mb-4">
                    <!-- Buttons -->  
                    <div class="text-right">
                        <a href="/" class="btn btn-link text-sm text-muted font-weight-bold">Cancelar</a>
                        <button type="submit" name="actualizarMod1" class="btn btn-sm btn-primary rounded-pill">Crear Empresa</button>
                    </div>
                </div>
              </div>
              
                <?php
                    if (isset($_POST['actualizarMod1'])) {
                        $recuperaInfo=new usuarios();
                        $recuperaInfo=$recuperaInfo->sqlquery("UPDATE `website` SET 
                        `titulo_web_site`='$_POST[empresa]',
                        `titulo_alternativo`='$_POST[titulo_alt]',
                        `email`='$_POST[email]',
                        `telefono`='$_POST[telefono]',
                        `direccion`='$_POST[direccion]',
                        `url_direccion`='$_POST[url_direccion]'
                        ");
                        echo '<script>location.href="/admin-/application/app/configWebapp"</script>';
                    }
                ?>
            </form>


            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body">
                    <div class="form-group">
                        <label class="form-control-label mb-0">
                        logo
                        </label>
                        <small class="form-text text-muted mb-2 mt-0">
                        Arrastra y suelta aqui
                        </small>
                        <div class="custom-file mb-3">

                            <input type="file" id="validatedCustomFile" name="img_empresa" accept="image/x-png,image/gif,image/jpeg">

                        <label class="custom-file-label" for="validatedCustomFile">Subir Archivo</label>
                        </div>
                    </div>
                    <!-- Divider -->
                    <hr class="mt-5 mb-4">
                    <!-- Buttons -->  
                    <div class="text-right">
                        <a href="/" class="btn btn-link text-sm text-muted font-weight-bold">Cancelar</a>
                        <button type="submit" name="actualizar_img_logo" class="btn btn-sm btn-primary rounded-pill">Crear Empresa</button>
                    </div>
                    </div>
                </div>
            </form>

            <?php
                $ruta='../../../assets/media/empresa/';
                if (isset($_POST['actualizar_img_logo'])) {
                    $datos=[
                        "img_empresa_name"=>$_FILES['img_empresa']['name'],
                        "img_empresa_tmp_name"=>$_FILES['img_empresa']['tmp_name'],
                        "img_empresa_type"=>$_FILES['img_empresa']['type'],
                        "img_empresa_size"=>$_FILES['img_empresa']['size']
                      ];
                      $recuperaInfo=new usuarios();
                        $recuperaInfo=$recuperaInfo->sqlquery("UPDATE `website` SET `logo`='$datos[img_empresa_name]'");
                        
                    if ((strpos($_FILES['img_empresa']['type'], "gif") || strpos($_FILES['img_empresa']['type'], "jpeg") || strpos($_FILES['img_empresa']['type'], "png") && ($_FILES['img_empresa']['size'] < 100000))) {
                        move_uploaded_file($_FILES['img_empresa']['tmp_name'], $ruta.$datos["img_empresa_name"]);
                    }

                    echo '<script>location.href="/admin-/application/app/configWebapp"</script>';
                }
            ?>

            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body">
                    <div class="form-group">
                        <label class="form-control-label mb-0">
                        logo Pestaña
                        </label>
                        <small class="form-text text-muted mb-2 mt-0">
                        Arrastra y suelta aqui
                        </small>
                        <div class="custom-file mb-3">

                            <input type="file" id="img_empresa_pestana" name="img_empresa" accept="image/x-png,image/gif,image/jpeg">

                        <label class="custom-file-label" for="img_empresa_pestana">Subir Archivo</label>
                        </div>
                    </div>
                    <!-- Divider -->
                    <hr class="mt-5 mb-4">
                    <!-- Buttons -->  
                    <div class="text-right">
                        <a href="/" class="btn btn-link text-sm text-muted font-weight-bold">Cancelar</a>
                        <button type="submit" name="actualizar_img_logo_pestana" class="btn btn-sm btn-primary rounded-pill">Crear Empresa</button>
                    </div>
                    </div>
                </div>
            </form>

            <?php
                if (isset($_POST['actualizar_img_logo_pestana'])) {
                    $datos=[
                        "img_empresa_name"=>$_FILES['img_empresa']['name'],
                        "img_empresa_tmp_name"=>$_FILES['img_empresa']['tmp_name'],
                        "img_empresa_type"=>$_FILES['img_empresa']['type'],
                        "img_empresa_size"=>$_FILES['img_empresa']['size']
                    ];
                    $recuperaInfo=new usuarios();
                        $recuperaInfo=$recuperaInfo->sqlquery("UPDATE `website` SET `logo_pestana`='$datos[img_empresa_name]'");
                        
                    if ((strpos($_FILES['img_empresa']['type'], "gif") || strpos($_FILES['img_empresa']['type'], "jpeg") || strpos($_FILES['img_empresa']['type'], "png") && ($_FILES['img_empresa']['size'] < 100000))) {
                        move_uploaded_file($_FILES['img_empresa']['tmp_name'], $ruta.$datos["img_empresa_name"]);
                    }

                    echo '<script>location.href="/admin-/application/app/configWebapp"</script>';
                }
            ?>

            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <div class="card">
                    <div class="card-body">
                        <!-- Email -->
                        <div class="form-group">
                            <label class="form-control-label mb-0">
                                Meta Title
                            </label>
                            <textarea name="meta_title" id="" class="form-control"><?php echo "$datos_WebSite[titulo_web_site]".PHP_EOL;?></textarea>
                        </div>

                        <!-- Teléfono -->
                        <div class="form-group">
                            <label class="form-control-label mb-0">
                                Meta Descripción
                            </label>
                            <textarea name="meta_descripcion" id="" class="form-control"><?php echo "$datos_WebSite[meta_description]".PHP_EOL;?></textarea>
                        </div>

                        <!-- Dirección -->
                        <div class="form-group">
                            <label class="form-control-label mb-0">
                                Meta Keyword
                            </label>
                            <small>Recuerda separar por "," las palabras clave</small>
                            <textarea name="meta_keyword" id="" class="form-control"><?php echo "$datos_WebSite[meta_keywords]".PHP_EOL;?></textarea>
                        </div>
                    </div>
                    <!-- Divider -->
                    <hr class="mt-5 mb-4" />
                    <!-- Buttons -->
                    <div class="text-right">
                        <a href="/" class="btn btn-link text-sm text-muted font-weight-bold">Cancelar</a>
                        <button type="submit" name="actualizar_metaKey" class="btn btn-sm btn-primary rounded-pill">Crear Empresa</button>
                    </div>
                </div>
            </form>
            <?php
                    if (isset($_POST['actualizar_metaKey'])) {
                        $recuperaInfo=new usuarios();
                        $recuperaInfo=$recuperaInfo->sqlquery("UPDATE `website` SET 
                        `meta_title`='$_POST[meta_title]',
                        `meta_description`='$_POST[meta_descripcion]',
                        `meta_keywords`='$_POST[meta_keyword]'
                        ");
                        echo '<script>location.href="/admin-/application/app/configWebapp"</script>';
                    }
                ?>

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