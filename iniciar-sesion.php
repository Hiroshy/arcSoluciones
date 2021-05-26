<?php
  include_once("admin-/modelo/bd.php");
  include_once("admin-/modelo/info.class.php");
  include_once("admin-/modelo/interesado.class.php");
  include_once("admin-/modelo/categoria.class.php");
  include_once("admin-/modelo/producto.class.php");
  include_once("admin-/modelo/usuarios.class.php");

  include_once("./part/info_page.php");
?>
<!doctype html>
<html lang="<?=$info_empresa['idioma']?>">
  <head>
    <?php include_once("./part/meta.php"); ?>
    <link rel="stylesheet" href="<?php echo $backend_admin ?>assets/libs/%40fortawesome/fontawesome-pro/css/all.min.css"><!-- Purpose CSS -->
    <link rel="stylesheet" href="<?php echo $backend_admin ?>assets/css/purpose.css" id="stylesheet">
    <?php include_once("./part/opengraph.php"); ?>
    <?php include_once("./part/head-seguimiento.php"); ?>
    <title><?=(strlen($info_empresa_meta['lema'])>0)? strtoupper($info_empresa_meta['lema']) .' | '.strtoupper($info_empresa['empresa']):strtoupper($info_empresa['empresa'])?></title>
  </head>

<body class="application application-offset">
  <!-- Chat modal -->

  <!-- Application container -->
  <div class="container-fluid container-application">
    <!-- Sidenav -->
    <!-- Content -->
    <div class="main-content position-relative">
      <!-- Main nav -->
      <style>
        .application-offset .container-application:before {
            background-color: #222;
        }
        .btn-primary {
            color: #fff;
            background-color: #222;
            border-color: #222;
        }
        .btn-primary:hover {
            color: #000;
            background-color: #c4c4c4;
            border-color: #c4c4c4;
        }
        a {
            color: #222;
            background-color: transparent;
        }
        .form-control:focus , .focused .input-group-text , .focused .input-group-merge .input-group-text{
            border-color:#222;
        }
        .focused .input-group{
            box-shadow:none;
        }
        .btn-regresar{
            position: absolute;
            top: 3%;
            left: 5%;
        }
    </style>
      <!-- Page content -->
      <div class="page-content">
      <a href="/" class="text-light btn-regresar">
        <i class="far fa-arrow-alt-circle-left fa-2x"></i>
      </a>
        <div class="min-vh-100 py-5 d-flex align-items-center">
          <div class="w-100">
            <div class="row justify-content-center">
              <div class="col-sm-8 col-lg-4">
                <div class="card shadow zindex-100 mb-0">
                  <div class="card-body px-md-5 py-5">
                    <div class="mb-5">
                      <h6 class="h3">Acceder</h6>
                      <p class="text-muted mb-0">Somos más de 3M de personas y tú eres una de ellas.</p>
                    </div>
                    <span class="clearfix"></span>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" role="form" method="post">
                      <div class="form-group">
                        <label class="form-control-label">Correo electrónico</label>
                        <div class="input-group input-group-merge">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-user"></i></span>
                          </div>
                          <input type="email" class="form-control" name="email" id="input-email" placeholder="persona@arcsoluciones.com.mx">
                        </div>
                      </div>
                      <div class="form-group mb-4">
                        <div class="d-flex align-items-center justify-content-between">
                          <div>
                            <label class="form-control-label">Contraseña</label>
                          </div>
                          <div class="mb-2">
                            <a href="/recupera-clave" class="small text-muted text-underline--dashed border-primary">Olvide mi Contraseña ?</a>
                          </div>
                        </div>
                        <div class="input-group input-group-merge">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-key"></i></span>
                          </div>
                          <input type="password" class="form-control" name="password" id="input-password" placeholder="Password">
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <a href="#" data-toggle="password-text" data-target="#input-password">
                                <i class="far fa-eye"></i>
                              </a>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="mt-4">
                        <button type="submit" name="login" class="btn btn-sm btn-primary btn-icon rounded-pill">
                          <span class="btn-inner--text">Acceder</span>
                          <span class="btn-inner--icon"><i class="far fa-long-arrow-alt-right"></i></span>
                        </button>
                      </div>
                    </form>
                  </div>
                  <?php
                    if(isset($_POST['login'])):
                      $email=openssl_encrypt($_POST['email'],$metodo,$pass);
                      $pass=openssl_encrypt($_POST['password'],$metodo,$pass);
                      $login_=new usuarios();
                      $login_=$login_->sqlquery("SELECT * FROM usuario WHERE email='$email' AND clave='$pass' ");
                      if ($login_) {
                        foreach($login_ as $userloged):
                          $datos_usuario=[
                            "id"=>$userloged['id'],
                            "nombre"=>$userloged['nombre'],
                            "apellido"=>$userloged['apellido'],
                            "biografia"=>$userloged['biografia'],
                            "curp"=>$userloged['curp'],
                            "rfc"=>$userloged['rfc'],
                            "empresa"=>$userloged['empresa'],
                            "fecha_nacimiento"=>$userloged['fecha_nacimiento'],
                            "email"=>$userloged['email'],
                            "telefono"=>$userloged['telefono'],
                            "nivel"=>$userloged['nivel']
                          ];
                          $_SESSION['id']=$datos_usuario['id'];
                          $_SESSION['email']=$datos_usuario['email'];
                          $_SESSION['nivel']=$datos_usuario['nivel'];
                          echo '<script> location.href="/"</script>';
                        endforeach;
                      }else{ 
                        echo '<script> location.href="/iniciar-sesion?INVIRIX&token='.md5(rand(0,10)).'&ENCRYPTED=256&trace=error&email='.$email.'"</script>';
                      }
                    endif
                  ?>
                  <?php  if (isset($_GET['trace'])) { 
                    if ($_GET['trace']=="error") {
                  ?>
                  <div class="card-footer">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oh no!</strong> Los datos proporcionados no son los correctos.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                  </div>
                  <?php }} ?>
                  <div class="card-footer px-md-5"><small>Aún no te has registrado...</small>
                    <a href="registrate" class="small font-weight-bold">Crear cuenta</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
    </div>
  </div>
  <!-- Scripts -->
  <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
  <script src="<?php echo $backend_admin ?>assets/js/purpose.core.js"></script>
  <!-- Purpose JS -->
  <script src="<?php echo $backend_admin ?>assets/js/purpose.js"></script>
  <!-- Demo JS - remove it when starting your project -->
  <script src="<?php echo $backend_admin ?>assets/js/demo.js"></script>
</body>
</html>