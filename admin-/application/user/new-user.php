<?php
    include("../../modelo/bd.php");
    include("../../modelo/info.class.php");
    include("../../modelo/usuarios.class.php");
    include("../../modelo/empresa.class.php");
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
  /***Usuarios-- */
  $usuarios=new usuarios();

  /***Empresas */
  $empresas=new Empresas();

  $datos="SELECT * FROM usuario WHERE nivel='colaborador'";

  $usuarios=$usuarios->sqlquery($datos);
  if ($datos_usuario['nivel']=='usuario') {
    echo '<script>location.href="/admin-/application/account/profile"</script>';
  }
  error_reporting(null);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?php echo "$datos_WebSite[meta_description]".PHP_EOL;?>">
  <meta name="author" content="<?php  echo "$datos_WebSite[autor]".PHP_EOL; ?>">
  <title><?php  echo "$datos_WebSite[titulo_web_site]".PHP_EOL; ?> - Crear Usuario</title>
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
                    <h5 class="h4 d-inline-block font-weight-400 mb-0 text-white">Crear Usuario</h5>
                  </div>
                  <!-- Additional info -->
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-end">
                  <a href="/admin-/application/user/new-business" class="btn btn-sm btn-white btn-icon rounded-pill">
                    <span class="btn-inner--icon"><i class="far fa-users"></i></span>
                    <span class="btn-inner--text">Crear Empresa</span>
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
                  "nombre"=> "",
                  "apellido"=>"",
                  "biografia"=>"",
                  "curp"=> "",
                  "rfc"=>"",
                  "empresa"=>"",
                  "fecha_nacimiento"=>"",
                  "email"=>"",
                  "telefono"=>"",
                  "nivel"=>"",
                ];

                $consulta_usuarios=new usuarios();

                $consulta_usuarios=$consulta_usuarios->consultar($datos_consulta);
                
                foreach($consulta_usuarios as $resultado){
                  $datos_categoria=[
                    "nombre"=> openssl_decrypt($resultado['nombre'],$metodo,$pass),
                    "apellido"=>openssl_decrypt($resultado['apellido'],$metodo,$pass),
                    "biografia"=>$resultado['biografia'],
                    "curp"=> openssl_decrypt($resultado['curp'],$metodo,$pass),
                    "rfc"=>openssl_decrypt($resultado['rfc'],$metodo,$pass),
                    "clave"=>openssl_decrypt($resultado['clave'],$metodo,$pass),
                    "empresa"=>$resultado['empresa'],
                    "fecha_nacimiento"=>$resultado['fecha_nacimiento'],
                    "email"=>openssl_decrypt($resultado['email'],$metodo,$pass),
                    "telefono"=>openssl_decrypt($resultado['telefono'],$metodo,$pass),
                    "nivel"=>$resultado['nivel']
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
              ?>               
              <div class="card">
                <div class="card-body">
                  <div class="form-group">
                    <label class="form-control-label">
                      Nombre
                    </label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo (isset($datos_categoria['nombre']))?$datos_categoria['nombre']:''; ?>">
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">
                      Apellidos
                    </label>
                    <input type="text" class="form-control" name="apellido" value="<?php echo (isset($datos_categoria['apellido']))?$datos_categoria['apellido']:''; ?>">
                  </div>
                  <!-- Empresas -->
                  <div class="form-group">
                    <label class="form-control-label">
                      Empresa
                    </label>
                    <select class="custom-select" name="empresa">
                      <?php
                        $empresas=$empresas->consultar($registro);
                        foreach ($empresas as $empresa) {
                      ?>
                        <option <?php echo (isset($datos_categoria['empresa']) AND $datos_categoria['empresa']==$empresa['empresas'])?'selected':'' ?> value="<?php echo  $empresa['empresas']; ?>" class="tex-uppercase">
                          <?php echo strtoupper( $empresa['empresas'] ) ; ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">
                      Tipo usuario
                    </label>
                    <select class="custom-select" name="nivel">
                      <?php if (isset($datos_categoria['nivel'])): ?>
                      <option <?php echo ($datos_categoria['nivel']=="usuario")?"selected":""; ?> value="usuario" selected>Usuario</option>
                      <option <?php echo ($datos_categoria['nivel']=="colaborador")?"selected":""; ?> value="colaborador">Colaborador</option>
                      <option <?php echo ($datos_categoria['nivel']=="administrador")?"selected":""; ?> value="administrador">Administrador</option>
                      <?php endif ;
                        if(!isset($datos_categoria['nivel'])):?>
                        <option value="usuario" selected>Usuario</option>
                        <option value="colaborador">Colaborador</option>
                        <option value="administrador">Administrador</option>
                      <?php endif?>
                    </select>
                  </div>

                  <!-- Task members -->
                  <div class="form-group">
                    <label class="form-control-label">
                      CURP
                    </label>
                    <input type="text" class="form-control" name="curp" value="<?php echo (isset($datos_categoria['curp']))?$datos_categoria['curp']:''; ?>">
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">
                      RFC
                    </label>
                    <input type="text" class="form-control" name="rfc" value="<?php echo (isset($datos_categoria['rfc']))?$datos_categoria['rfc']:''; ?>">
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">
                      Email
                    </label>
                    <input type="text" class="form-control" name="email" value="<?php echo (isset($datos_categoria['email']))?$datos_categoria['email']:''; ?>">
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">
                      Password
                    </label>
                    <input type="text" class="form-control" name="clave" value="<?php echo (isset($datos_categoria['clave']))?$datos_categoria['clave']:''; ?>">
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <div class="form-group">
                    <label class="form-control-label">
                      Biografia
                    </label>
                    <textarea name="biografia" class=form-control><?php echo (isset($datos_categoria['biografia']))?$datos_categoria['biografia']:''; ?></textarea>
                  </div>

                  <div class="form-group">
                    <label class="form-control-label">
                      Fecha Nacimiento
                    </label>
                    <input type="date" name="fecha_nacimiento" class=form-control id="" value="<?php echo (isset($datos_categoria['fecha_nacimiento']))?$datos_categoria['fecha_nacimiento']:''; ?>">
                  </div>

                  <div class="form-group">
                    <label class="form-control-label">
                      Teléfono
                    </label>
                    <input type="text" name="telefono" class=form-control id="" maxlength="10" value="<?php echo (isset($datos_categoria['telefono']))?$datos_categoria['telefono']:''; ?>">
                  </div>

                  </div>
                </div>
              <div class="card">
                <div class="card-body">
                  <div class="form-group">
                    <label class="form-control-label mb-0">
                      Foto
                    </label>
                    <small class="form-text text-muted mb-2 mt-0">
                      clic y sube tu foto
                    </small>
                    <div class="custom-file mb-3">
                      <?php
                        if (isset($_GET['id'])) {
                      ?>
                        <input type="file" id="validatedCustomFile" name="img_usuario" accept="image/x-png,image/gif,image/jpeg"  >
                      <?php
                        }else{
                      ?>
                      <input type="file" id="validatedCustomFile" name="img_usuario" accept="image/x-png,image/gif,image/jpeg" required>
                      <?php
                        }
                      ?>                      <label class="custom-file-label" for="validatedCustomFile">Subir Archivo</label>
                    </div>
                  </div>
                  <!-- Divider -->
                  <hr class="mt-5 mb-4">
                  <!-- Buttons -->
                  <div class="text-right">
                    <a href="#" class="btn btn-link text-sm text-muted font-weight-bold">Cancelar</a>
                    <button type="submit" name="crear" class="btn btn-sm btn-primary rounded-pill">Crear</button>
                  </div>
                </div>
              </div>
            </form>
            <?php
                  if (isset($_POST['crear'])) {
                    $usuarios=new usuarios();

                    $ruta='../../../assets/media/usuarios/';

                    if (isset($_GET['id'])) {

                      if (strlen($_FILES['img_usuario']['name'])>3) {
                        $datos=[
                          "id"=>$_GET['id'],
                          "nombre"=>openssl_encrypt($_POST['nombre'],$metodo,$pass),
                          "apellido"=>openssl_encrypt($_POST['apellido'],$metodo,$pass),
                          "empresa"=>$_POST['empresa'],
                          "nivel"=>$_POST['nivel'],
                          "curp"=>openssl_encrypt($_POST['curp'],$metodo,$pass),
                          "rfc"=>openssl_encrypt($_POST['rfc'],$metodo,$pass),
                          "email"=>openssl_encrypt($_POST['email'],$metodo,$pass),
                          "mipassword"=>openssl_encrypt($_POST['clave'],$metodo,$pass),
                          "biografia"=>$_POST['biografia'],
                          "fecha_nacimiento"=>$_POST['fecha_nacimiento'],
                          "telefono"=>openssl_encrypt($_POST['telefono'],$metodo,$pass),
                          "img_usuario_name"=>$_FILES['img_usuario']['name'],
                          "img_usuario_tmp_name"=>$_FILES['img_usuario']['tmp_name'],
                          "img_usuario_type"=>$_FILES['img_usuario']['type'],
                          "img_usuario_size"=>$_FILES['img_usuario']['size']
                        ];
                        if ((strpos($_FILES['img_usuario']['type'], "gif") || strpos($_FILES['img_usuario']['type'], "jpeg") || strpos($_FILES['img_usuario']['type'], "png") && ($_FILES['img_usuario']['size'] < 100000))) {
                          move_uploaded_file($_FILES['img_usuario']['tmp_name'], $ruta.$datos["img_usuario_name"]);
                        }
              
                        if ($usuarios->actualizar($datos)==1) {
                          echo "
                          <div class='alert alert-success' role='alert'>
                            Categoria actualizada con éxito. <a href='$url_con_id' class='alert-link'>actualizar aqui</a>
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
                          "nombre"=>openssl_encrypt($_POST['nombre'],$metodo,$pass),
                          "apellido"=>openssl_encrypt($_POST['apellido'],$metodo,$pass),
                          "empresa"=>$_POST['empresa'],
                          "nivel"=>$_POST['nivel'],
                          "curp"=>openssl_encrypt($_POST['curp'],$metodo,$pass),
                          "rfc"=>openssl_encrypt($_POST['rfc'],$metodo,$pass),
                          "email"=>openssl_encrypt($_POST['email'],$metodo,$pass),
                          "mipassword"=>openssl_encrypt($_POST['clave'],$metodo,$pass),
                          "biografia"=>$_POST['biografia'],
                          "fecha_nacimiento"=>$_POST['fecha_nacimiento'],
                          "telefono"=>openssl_encrypt($_POST['telefono'],$metodo,$pass)
                        ];
              
                        if ($usuarios->actualizar($datos)==1) {
                          echo "
                          <div class='alert alert-success' role='alert'>
                            Usuario actualizado con éxito. <a href='$url_con_id' class='alert-link'>actualizar aqui</a>
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
                          "nombre"=>openssl_encrypt($_POST['nombre'],$metodo,$pass),
                          "apellido"=>openssl_encrypt($_POST['apellido'],$metodo,$pass),
                          "empresa"=>$_POST['empresa'],
                          "nivel"=>$_POST['nivel'],
                          "curp"=>openssl_encrypt($_POST['curp'],$metodo,$pass),
                          "rfc"=>openssl_encrypt($_POST['rfc'],$metodo,$pass),
                          "email"=>openssl_encrypt($_POST['email'],$metodo,$pass),
                          "mipassword"=>openssl_encrypt($_POST['clave'],$metodo,$pass),
                          "biografia"=>$_POST['biografia'],
                          "fecha_nacimiento"=>$_POST['fecha_nacimiento'],
                          "telefono"=>openssl_encrypt($_POST['telefono'],$metodo,$pass),
                          "img_usuario_name"=>$_FILES['img_usuario']['name'],
                          "img_usuario_tmp_name"=>$_FILES['img_usuario']['tmp_name'],
                          "img_usuario_type"=>$_FILES['img_usuario']['type'],
                          "img_usuario_size"=>$_FILES['img_usuario']['size']
                      ];
            
                      if ((strpos($_FILES['img_usuario']['type'], "gif") || strpos($_FILES['img_usuario']['type'], "jpeg") || strpos($_FILES['img_usuario']['type'], "png") && ($_FILES['img_usuario']['size'] < 100000))) {
                        move_uploaded_file($_FILES['img_usuario']['tmp_name'], $ruta.$datos["img_usuario_name"]);
                      }

                      if ($usuarios->insertar($datos)==1) {
                        echo "
                        <div class='alert alert-success' role='alert'>
                          Usuario insertado con éxito.
                        </div>
                        ";
                      }else{
                        echo $usuarios->insertar($datos);
                        echo "
                        <div class='alert alert-danger' role='alert'>
                          Error al insertar , posible dato duplicado. Intenta nuevamente
                        </div>
                        ";
                      }
                    }

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