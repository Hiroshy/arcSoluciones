<?php
  include_once("admin-/modelo/bd.php");
  include_once("admin-/modelo/info.class.php");
  include_once("admin-/modelo/interesado.class.php");
  include_once("admin-/modelo/categoria.class.php");
  include_once("admin-/modelo/producto.class.php");
  include_once("admin-/modelo/usuarios.class.php");

  include_once("./part/info_page.php");
  $backend_admin='/admin-/';
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
        .tool_access{
          display:none;
        }
    </style>
  <!-- Chat modal -->

  <!-- Application container -->
  <div class="container-fluid container-application">
    <!-- Sidenav -->
    <!-- Content -->
    <div class="main-content position-relative">
      <!-- Main nav -->
      <!-- Page content -->
      <div class="page-content">
      <a href="/" class="text-light btn-regresar">
        <i class="far fa-arrow-alt-circle-left fa-2x"></i>
      </a>
        <div class="min-vh-100 py-5 d-flex align-items-center">
          <div class="w-100">
            <div class="row justify-content-center">
              <div class="col-sm-8 col-md-8 col-lg-5">
                <div class="card shadow zindex-100 mb-0">
                  <div class="card-body px-md-5 py-5">
                    <div class="mb-5">
                      <h6 class="h3">Crear cuenta</h6>
                      <p class="text-muted mb-0">Tu seguridad, nuestro bienestar</p>
                    </div>
                    <span class="clearfix"></span>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" role="form" method="post">
                      <div class="form-group">
                        <label class="form-control-label">Correo electrónico </label>
                        <div class="input-group input-group-merge">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-user"></i></span>
                          </div>
                          <input type="email" class="form-control" name="email" id="input-email" placeholder="persona@arcsoluciones.com.mx">
                        </div>
                      </div>
                      <div class="form-group mb-4">
                        <label class="form-control-label">Contraseña</label>
                        <div class="input-group input-group-merge">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-key"></i></span>
                          </div>
                          <input type="password" class="form-control" name="password" id="input-password" placeholder="********">
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <a href="#" data-toggle="password-text" data-target="#input-password">
                                <i class="far fa-eye"></i>
                              </a>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="form-control-label">Confirma contraseña</label>
                        <div class="input-group input-group-merge">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-key"></i></span>
                          </div>
                          <input type="password" class="form-control" name="rePassword" id="input-password-confirm" placeholder="********">
                        </div>
                      </div>
                      <div class="my-4">
                        <div class="custom-control custom-checkbox mb-3">
                          <input type="checkbox" checked class="custom-control-input" id="check-terms">
                          <label class="custom-control-label" for="check-terms">Yo acepto los  <a href="#" data-toggle="modal" data-target="#termsCondition">terms and conditions</a></label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" checked class="custom-control-input" id="check-privacy">
                          <label class="custom-control-label" for="check-privacy">Yo acepto las  <a href="#" data-toggle="modal" data-target="#policy">privacy policy</a></label>
                        </div>
                      </div>
                      <div class="mt-4"><button type="submit" name="crearUsuario" class="btn btn-sm btn-primary btn-icon rounded-pill">
                          <span class="btn-inner--text">Unirse</span>
                          <span class="btn-inner--icon"><i class="far fa-long-arrow-alt-right"></i></span>
                        </button></div>
                    </form>
                  </div>
                  <div class="card-footer px-md-5"><small>Ya tengo una cuenta</small>
                    <a href="/iniciar-sesion" class="small font-weight-bold"> Entrar</a></div>
                </div>
                <?php
                    if(isset($_POST['crearUsuario'])):
                      $email=openssl_encrypt($_POST['email'],$metodo,$pass);
                      $password=openssl_encrypt($_POST['password'],$metodo,$pass);
                      $rePassword=openssl_encrypt($_POST['rePassword'],$metodo,$pass);
                      
                      if ($password!==$rePassword || strlen($password)<8) {
                        echo '
                          <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong> <i class="fas fa-bug"></i> !</strong> No coinciden las contraseñas.
                            Recuerda que deben ser iguales y deben tener un minimo de 8 caracteres.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        ';
                      }else{
                      
                      $login_=new usuarios();
                      $login_=$login_->sqlquery("SELECT COUNT(*) FROM usuario WHERE email='$email'");
                      if ($login_[0]['COUNT(*)']>=1) {
                        echo '
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong> <i class="fas fa-bug"></i> !</strong> Ya existe un correo electrónico.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        ';
                        var_dump($login_);
                      }else{ 
                        $login_=new usuarios();
                        $login_=$login_->sqlquery("INSERT INTO `usuario` ( `email`, `clave`, `nivel`) VALUES ('$email','$password','usuario') ");
                        $miConteo=new usuarios();
                        $select=$miConteo->sqlquery("SELECT id,email,nivel FROM usuario WHERE email='$email' ");
                        foreach($select as $sel):
                          $_SESSION['id']=$sel['id'];
                          $_SESSION['email']=$sel['email'];
                          $_SESSION['nivel']=$sel['nivel'];
                        endforeach;
                        echo '<script> location.href="/";</script>';
                      }
                    }
                    endif
                  ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
    </div>
  </div>
  <?php include_once("./part/plugin.php"); ?>
  <!-- Scripts -->
  <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
  <script src="<?php echo $backend_admin ?>assets/js/purpose.core.js"></script>
  <!-- Purpose JS -->
  <script src="<?php echo $backend_admin ?>assets/js/purpose.js"></script>
  <!-- Demo JS - remove it when starting your project -->
  <script src="<?php echo $backend_admin ?>assets/js/demo.js"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
</body>


</html>