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
  <title><?php  echo "$datos_WebSite[titulo_web_site]".PHP_EOL; ?> - Nueva Empresa</title>
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
                    <h5 class="h4 d-inline-block font-weight-400 mb-0 text-white">Crear Empresa</h5>
                  </div>
                  <!-- Additional info -->
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-end">
                  <a href="/admin-/application/user/new-user" class="btn btn-sm btn-white btn-icon rounded-pill">
                    <span class="btn-inner--icon"><i class="far fa-users"></i></span>
                    <span class="btn-inner--text">Crear Usuario</span>
                  </a>
                </div>
              </div>
            </div>
            <?php
            if (isset($_GET['id'])) {
              
              $datos_consulta=[
                "campo"=>"*",
                "condicion"=>"id",
                "condicionValor"=>$_GET['id']
              ];
              $datos_categoria=[
                "slug"=> "",
                "logo"=>"",
                "empresas"=>"",
                "rubro"=> "",
                "comentario"=>""
              ];

              $empresas=$empresas->consultar($datos_consulta);
               
              foreach($empresas as $empresa){
                $datos_categoria=[
                  "slug"=> $empresa['slug'],
                  "logo"=>$empresa['logo'],
                  "empresas"=>$empresa['empresas'],
                  "rubro"=> $empresa['rubro'],
                  "comentario"=>$empresa['comentario']
                ];
              }
              
            } 
            
            ?>

            <?php 
              if (isset($_GET['id'])) {
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF'].'?id='.$_GET['id'] ?>" class="mt-4" method="POST" enctype="multipart/form-data">

            <?php
            $url_con_id=$_SERVER['PHP_SELF'].'?id='.$_GET['id'];
            }else{
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="mt-4" method="POST" enctype="multipart/form-data">
            <?php
            }
            ?>                     <div class="card">
                <div class="card-body">
                  <div class="form-group">
                    <label class="form-control-label">
                      Empresa
                    </label>
                    <input type="text" class="form-control" name="empresa" value="<?php echo (isset($empresa['empresas']))?$empresa['empresas']:''; ?>">
                  </div>
                  <!-- Task project -->
                  <div class="form-group">
                    <label class="form-control-label">
                      Rubro
                    </label>
                    <input type="text" class="form-control" name="rubro" value="<?php echo (isset($empresa['rubro']))?$empresa['rubro']:''; ?>">
                  </div>
                  <!-- Task description -->
                  <div class="form-group">
                    <label class="form-control-label mb-0">
                      Comentario
                    </label>
                    <textarea name="comentario" id="" class="form-control"><?php echo (isset($empresa['comentario']))?$empresa['comentario']:''; ?></textarea>
                  </div>
                </div>
              </div>
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
                      <?php
                        if (isset($_GET['id'])) {
                      ?>
                        <input type="file" id="validatedCustomFile" name="img_empresa" accept="image/x-png,image/gif,image/jpeg">
                      <?php
                        }else{
                      ?>
                      <input type="file" id="validatedCustomFile" name="img_empresa" accept="image/x-png,image/gif,image/jpeg" required>
                      <?php
                        }
                      ?>
                      <label class="custom-file-label" for="validatedCustomFile">Subir Archivo</label>
                    </div>
                  </div>
                  <!-- Divider -->
                  <hr class="mt-5 mb-4">
                  <!-- Buttons -->
                  <div class="text-right">
                    <a href="#" class="btn btn-link text-sm text-muted font-weight-bold">Cancelar</a>
                    <button type="submit" name="crear" class="btn btn-sm btn-primary rounded-pill">Crear Empresa</button>
                  </div>
                </div>
              </div>
              <?php
                  if (isset($_POST['crear'])) {

                    $ruta='../../../assets/media/empresa/';
                    $empresas=new Empresas();

                    if (isset($_GET['id'])) {

                      if (strlen($_FILES['img_empresa']['name'])>3) {
                        $datos=[
                          "id"=>$_GET['id'],
                          "slug"=>$_POST['empresa'],
                          "empresa"=>$_POST['empresa'],
                          "rubro"=>$_POST['rubro'],
                          "comentario"=>$_POST['comentario'],
                          "img_empresa_name"=>$_FILES['img_empresa']['name'],
                          "img_empresa_tmp_name"=>$_FILES['img_empresa']['tmp_name'],
                          "img_empresa_type"=>$_FILES['img_empresa']['type'],
                          "img_empresa_size"=>$_FILES['img_empresa']['size']
                        ];
                        
                        if ((strpos($_FILES['img_empresa']['type'], "gif") || strpos($_FILES['img_empresa']['type'], "jpeg") || strpos($_FILES['img_empresa']['type'], "png") && ($_FILES['img_empresa']['size'] < 100000))) {
                          move_uploaded_file($_FILES['img_empresa']['tmp_name'], $ruta.$datos["img_empresa_name"]);
                        }
              
                        if ($empresas->actualizar($datos)==1) {
                          echo "
                          <div class='alert alert-success' role='alert'>
                            Empresa actualizada con éxito. <a href='$url_con_id' class='alert-link'>actualizar aqui</a>
                          </div>
                          ";
                        }else{
                          echo "
                          <div class='alert alert-danger' role='alert'>
                            Error al actualizar , posible dato duplicado. Intenta nuevamente
                          </div>
                          ";
                        }

                      }else{
                        $datos=[
                          "id"=>$_GET['id'],
                          "slug"=>$_POST['empresa'],
                          "empresa"=>$_POST['empresa'],
                          "rubro"=>$_POST['rubro'],
                          "comentario"=>$_POST['comentario']
                        ];

                        if ($empresas->actualizar($datos)==1) {
                          echo "
                          <div class='alert alert-success' role='alert'>
                            Empresa actualizada con éxito. <a href='$url_con_id' class='alert-link'>actualizar aqui</a>
                          </div>
                          ";
                        }else{
                          echo "
                          <div class='alert alert-danger' role='alert'>
                            Error al actualizar , intenta nuevamente
                          </div>
                          ";
                        }

                      }
                    }else {
                      $datos=[
                          "slug"=>$_POST['empresa'],
                          "empresa"=>$_POST['empresa'],
                          "rubro"=>$_POST['rubro'],
                          "comentario"=>$_POST['comentario'],
                          "img_empresa_name"=>$_FILES['img_empresa']['name'],
                          "img_empresa_tmp_name"=>$_FILES['img_empresa']['tmp_name'],
                          "img_empresa_type"=>$_FILES['img_empresa']['type'],
                          "img_empresa_size"=>$_FILES['img_empresa']['size']
                      ];
            
                      if ((strpos($_FILES['img_empresa']['type'], "gif") || strpos($_FILES['img_empresa']['type'], "jpeg") || strpos($_FILES['img_empresa']['type'], "png") && ($_FILES['img_empresa']['size'] < 100000))) {
                        move_uploaded_file($_FILES['img_empresa']['tmp_name'], $ruta.$datos["img_empresa_name"]);
                      }
            
                      if ($empresas->insertar($datos)==1) {
                        echo "
                        <div class='alert alert-success' role='alert'>
                          Empresa insertado con éxito.
                        </div>
                        ";
                      }else{
                        echo $empresas->insertar($datos);
                        echo "
                        <div class='alert alert-danger' role='alert'>
                          Error al insertar , posible dato duplicado. Intenta nuevamente
                        </div>
                        ";
                      }
                    }

                  }
                ?>
            </form>
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


<!-- Mirrored from preview.webpixels.io/purpose-application-ui-kit/application/task/create-new by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Nov 2020 09:10:10 GMT -->
</html>