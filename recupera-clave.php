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
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from preview.webpixels.io/purpose-application-ui-kit/application/authentication/recover.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Nov 2020 09:10:10 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
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
    </style>
  <!-- Chat modal -->
  <div class="modal fade fixed-right" id="modal-chat" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-vertical" role="document">
      <div class="modal-content">
        <div class="modal-header align-items-center">
          <div class="modal-title">
            <h6 class="mb-0">Chat</h6>
            <span class="d-block text-sm">3 new conversations</span>
          </div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="scrollbar-inner">
          <!-- Chat contacts -->
          <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                <div>
                  <div class="avatar-parent-child">
                    <img alt="Image placeholder" src="<?php echo $backend_admin ?>assets/img/theme/light/team-1-800x800.jpg" class="avatar  rounded-circle">
                    <span class="avatar-child avatar-badge bg-warning"></span>
                  </div>
                </div>
                <div class="flex-fill ml-3">
                  <h6 class="text-sm mb-0">John Sullivan</h6>
                  <p class="text-sm mb-0">
                    Working remotely
                  </p>
                </div>
              </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                <div>
                  <div class="avatar-parent-child">
                    <img alt="Image placeholder" src="<?php echo $backend_admin ?>assets/img/theme/light/team-2-800x800.jpg" class="avatar  rounded-circle">
                    <span class="avatar-child avatar-badge bg-warning"></span>
                  </div>
                </div>
                <div class="flex-fill ml-3">
                  <h6 class="text-sm mb-0">Heather Wright</h6>
                  <p class="text-sm mb-0">
                    Working remotely
                  </p>
                </div>
              </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                <div>
                  <div class="avatar-parent-child">
                    <img alt="Image placeholder" src="<?php echo $backend_admin ?>assets/img/theme/light/team-3-800x800.jpg" class="avatar  rounded-circle">
                    <span class="avatar-child avatar-badge bg-warning"></span>
                  </div>
                </div>
                <div class="flex-fill ml-3">
                  <h6 class="text-sm mb-0">James Lewis</h6>
                  <p class="text-sm mb-0">
                    Working remotely
                  </p>
                </div>
              </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                <div>
                  <div class="avatar-parent-child">
                    <img alt="Image placeholder" src="<?php echo $backend_admin ?>assets/img/theme/light/team-4-800x800.jpg" class="avatar  rounded-circle">
                    <span class="avatar-child avatar-badge bg-warning"></span>
                  </div>
                </div>
                <div class="flex-fill ml-3">
                  <h6 class="text-sm mb-0">Martin Gray</h6>
                  <p class="text-sm mb-0">
                    Working remotely
                  </p>
                </div>
              </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                <div>
                  <div class="avatar-parent-child">
                    <img alt="Image placeholder" src="<?php echo $backend_admin ?>assets/img/theme/light/team-5-800x800.jpg" class="avatar  rounded-circle">
                    <span class="avatar-child avatar-badge bg-warning"></span>
                  </div>
                </div>
                <div class="flex-fill ml-3">
                  <h6 class="text-sm mb-0">John Snow</h6>
                  <p class="text-sm mb-0">
                    Working remotely
                  </p>
                </div>
              </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                <div>
                  <div class="avatar-parent-child">
                    <img alt="Image placeholder" src="<?php echo $backend_admin ?>assets/img/theme/light/team-1-800x800.jpg" class="avatar  rounded-circle">
                    <span class="avatar-child avatar-badge bg-warning"></span>
                  </div>
                </div>
                <div class="flex-fill ml-3">
                  <h6 class="text-sm mb-0">John Michael</h6>
                  <p class="text-sm mb-0">
                    Working remotely
                  </p>
                </div>
              </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                <div>
                  <div class="avatar-parent-child">
                    <img alt="Image placeholder" src="<?php echo $backend_admin ?>assets/img/theme/light/team-2-800x800.jpg" class="avatar  rounded-circle">
                    <span class="avatar-child avatar-badge bg-warning"></span>
                  </div>
                </div>
                <div class="flex-fill ml-3">
                  <h6 class="text-sm mb-0">Monroe Parker</h6>
                  <p class="text-sm mb-0">
                    Working remotely
                  </p>
                </div>
              </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                <div>
                  <div class="avatar-parent-child">
                    <img alt="Image placeholder" src="<?php echo $backend_admin ?>assets/img/theme/light/team-3-800x800.jpg" class="avatar  rounded-circle">
                    <span class="avatar-child avatar-badge bg-warning"></span>
                  </div>
                </div>
                <div class="flex-fill ml-3">
                  <h6 class="text-sm mb-0">Danielle Levin</h6>
                  <p class="text-sm mb-0">
                    Working remotely
                  </p>
                </div>
              </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                <div>
                  <div class="avatar-parent-child">
                    <img alt="Image placeholder" src="<?php echo $backend_admin ?>assets/img/theme/light/team-4-800x800.jpg" class="avatar  rounded-circle">
                    <span class="avatar-child avatar-badge bg-warning"></span>
                  </div>
                </div>
                <div class="flex-fill ml-3">
                  <h6 class="text-sm mb-0">Jesse Stevens</h6>
                  <p class="text-sm mb-0">
                    Working remotely
                  </p>
                </div>
              </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                <div>
                  <div class="avatar-parent-child">
                    <img alt="Image placeholder" src="<?php echo $backend_admin ?>assets/img/theme/light/team-5-800x800.jpg" class="avatar  rounded-circle">
                    <span class="avatar-child avatar-badge bg-warning"></span>
                  </div>
                </div>
                <div class="flex-fill ml-3">
                  <h6 class="text-sm mb-0">John Snow</h6>
                  <p class="text-sm mb-0">
                    Working remotely
                  </p>
                </div>
              </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                <div>
                  <div class="avatar-parent-child">
                    <img alt="Image placeholder" src="<?php echo $backend_admin ?>assets/img/theme/light/team-1-800x800.jpg" class="avatar  rounded-circle">
                    <span class="avatar-child avatar-badge bg-warning"></span>
                  </div>
                </div>
                <div class="flex-fill ml-3">
                  <h6 class="text-sm mb-0">John Sullivan</h6>
                  <p class="text-sm mb-0">
                    Working remotely
                  </p>
                </div>
              </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                <div>
                  <div class="avatar-parent-child">
                    <img alt="Image placeholder" src="<?php echo $backend_admin ?>assets/img/theme/light/team-2-800x800.jpg" class="avatar  rounded-circle">
                    <span class="avatar-child avatar-badge bg-warning"></span>
                  </div>
                </div>
                <div class="flex-fill ml-3">
                  <h6 class="text-sm mb-0">Heather Wright</h6>
                  <p class="text-sm mb-0">
                    Working remotely
                  </p>
                </div>
              </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                <div>
                  <div class="avatar-parent-child">
                    <img alt="Image placeholder" src="<?php echo $backend_admin ?>assets/img/theme/light/team-3-800x800.jpg" class="avatar  rounded-circle">
                    <span class="avatar-child avatar-badge bg-warning"></span>
                  </div>
                </div>
                <div class="flex-fill ml-3">
                  <h6 class="text-sm mb-0">James Lewis</h6>
                  <p class="text-sm mb-0">
                    Working remotely
                  </p>
                </div>
              </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                <div>
                  <div class="avatar-parent-child">
                    <img alt="Image placeholder" src="<?php echo $backend_admin ?>assets/img/theme/light/team-4-800x800.jpg" class="avatar  rounded-circle">
                    <span class="avatar-child avatar-badge bg-warning"></span>
                  </div>
                </div>
                <div class="flex-fill ml-3">
                  <h6 class="text-sm mb-0">Martin Gray</h6>
                  <p class="text-sm mb-0">
                    Working remotely
                  </p>
                </div>
              </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                <div>
                  <div class="avatar-parent-child">
                    <img alt="Image placeholder" src="<?php echo $backend_admin ?>assets/img/theme/light/team-5-800x800.jpg" class="avatar  rounded-circle">
                    <span class="avatar-child avatar-badge bg-warning"></span>
                  </div>
                </div>
                <div class="flex-fill ml-3">
                  <h6 class="text-sm mb-0">John Snow</h6>
                  <p class="text-sm mb-0">
                    Working remotely
                  </p>
                </div>
              </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                <div>
                  <div class="avatar-parent-child">
                    <img alt="Image placeholder" src="<?php echo $backend_admin ?>assets/img/theme/light/team-1-800x800.jpg" class="avatar  rounded-circle">
                    <span class="avatar-child avatar-badge bg-warning"></span>
                  </div>
                </div>
                <div class="flex-fill ml-3">
                  <h6 class="text-sm mb-0">John Michael</h6>
                  <p class="text-sm mb-0">
                    Working remotely
                  </p>
                </div>
              </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                <div>
                  <div class="avatar-parent-child">
                    <img alt="Image placeholder" src="<?php echo $backend_admin ?>assets/img/theme/light/team-2-800x800.jpg" class="avatar  rounded-circle">
                    <span class="avatar-child avatar-badge bg-warning"></span>
                  </div>
                </div>
                <div class="flex-fill ml-3">
                  <h6 class="text-sm mb-0">Monroe Parker</h6>
                  <p class="text-sm mb-0">
                    Working remotely
                  </p>
                </div>
              </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                <div>
                  <div class="avatar-parent-child">
                    <img alt="Image placeholder" src="<?php echo $backend_admin ?>assets/img/theme/light/team-3-800x800.jpg" class="avatar  rounded-circle">
                    <span class="avatar-child avatar-badge bg-warning"></span>
                  </div>
                </div>
                <div class="flex-fill ml-3">
                  <h6 class="text-sm mb-0">Danielle Levin</h6>
                  <p class="text-sm mb-0">
                    Working remotely
                  </p>
                </div>
              </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                <div>
                  <div class="avatar-parent-child">
                    <img alt="Image placeholder" src="<?php echo $backend_admin ?>assets/img/theme/light/team-4-800x800.jpg" class="avatar  rounded-circle">
                    <span class="avatar-child avatar-badge bg-warning"></span>
                  </div>
                </div>
                <div class="flex-fill ml-3">
                  <h6 class="text-sm mb-0">Jesse Stevens</h6>
                  <p class="text-sm mb-0">
                    Working remotely
                  </p>
                </div>
              </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                <div>
                  <div class="avatar-parent-child">
                    <img alt="Image placeholder" src="<?php echo $backend_admin ?>assets/img/theme/light/team-5-800x800.jpg" class="avatar  rounded-circle">
                    <span class="avatar-child avatar-badge bg-warning"></span>
                  </div>
                </div>
                <div class="flex-fill ml-3">
                  <h6 class="text-sm mb-0">John Snow</h6>
                  <p class="text-sm mb-0">
                    Working remotely
                  </p>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="modal-footer py-3 mt-auto">
          <a href="#" class="btn btn-block btn-sm btn-neutral btn-icon rounded-pill">
            <span class="btn-inner--icon"><i class="fab fa-facebook-messenger"></i></span>
            <span class="btn-inner--text">Open Chat</span>
          </a>
        </div>
      </div>
    </div>
  </div>
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
              <div class="col-sm-8 col-lg-5 col-xl-4">
                <div class="card shadow zindex-100 mb-0">
                  <div class="card-body px-md-5 py-5">
                    <div class="mb-5">
                      <h6 class="h3">Restablecer contraseña</h6>
                      <p class="text-muted mb-0">No te preocupes, esto llega a suceder... </p>
                    </div>
                    <span class="clearfix"></span>
                    <form role="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                      <div class="form-group">
                        <label class="form-control-label">Correo electrónico</label>
                        <div class="input-group input-group-merge">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-user"></i></span>
                          </div>
                          <input type="email" name="email" class="form-control" id="input-email" placeholder="persona@arcsoluciones.com.mx">
                        </div>
                      </div>
                      <div class="mt-4"><button type="submit" name="restablecer"  class="btn btn-sm btn-primary btn-icon rounded-pill">
                          <span class="btn-inner--text">Restablecer</span>
                          <span class="btn-inner--icon"><i class="far fa-long-arrow-alt-right"></i></span>
                        </button></div>
                    </form>
                  </div>
                  <div class="card-footer px-md-5"><small>No tengo una cuenta ?</small>
                    <a href="/registrate" class="small font-weight-bold">Creala hoy</a></div>
                </div>
                <?php
                  if (isset($_POST['restablecer'])) {
                    $url=$_SERVER['HTTP_HOST'];
                    $email=openssl_encrypt($_POST['email'],$metodo,$pass);
                    $login_=new usuarios();
                    $login_=$login_->sqlquery("SELECT * FROM usuario WHERE email='$email'");
                    
                    $nombre=openssl_decrypt($login_[0]['nombre'],$metodo,$pass);
                    $apellido=openssl_decrypt($login_[0]['apellido'],$metodo,$pass);
                    $email=openssl_decrypt($login_[0]['email'],$metodo,$pass);
                    $clave=openssl_decrypt($login_[0]['clave'],$metodo,$pass);

                    $to = $_POST['email'];
                    $subject = "Recupera tu cuenta ARC";
                    $message = '
                    
                    <div style="font-family: Didact Gothic, sans-serif; margin: 0;padding: 19.0px;">
                    <table style="border-collapse: collapse;width: 100.0%;color: rgb(69,85,96);margin: 0 auto 12.0px;padding: 0;">
                    <tbody>
                    <tr>
                    <td><br></td>
                    <td style="display: block;max-width: 700.0px;clear: both;margin: 0 auto 31.0px;padding: 0;">
                    <div style="display: block;max-width: 700.0px;margin: 19.0px auto 31.0px;padding: 0 19.0px;">
                    <table style="border-collapse: collapse;width: 100.0%;margin: 0;padding: 0;">
                    <tbody>
                    <tr>
                    <td><img style="max-width: 100.0%;" width="172" alt="ARC SOLUCIONES" src="https://www.arcsoluciones.com.mx/assets/media/empresa/'.$info_empresa['logo_pestana'].'"><br></td>
                    </tr>
                    </tbody>
                    </table>
                    </div>
                    </td>
                    <td><br></td>
                    </tr>
                    </tbody>
                    </table>
                    <table style="border-collapse: collapse;width: 100.0%; color: #333; margin: 0;padding: 0;">
                    <tbody>
                    <tr>
                    <td><br></td>
                    <td bgcolor="#fff" style="display: block;max-width: 700.0px;clear: both;border-radius: 3.0px;margin: 0 auto 31.0px;padding: 0 0 19.0px;border: 1.0px solid rgb(207,212,216);">
                    <div style="display: block;max-width: 700.0px;margin: 0 auto;padding: 0;">
                    <table style="border-collapse: collapse;width: 100.0%;margin: 0;padding: 0;">
                    <tbody>
                    <tr>
                    <td style="border-bottom-width: 1.0px;border-bottom-color: rgb(207,212,216);border-bottom-style: solid;margin: 0;padding: 19.0px 31.0px;">
                    <h4 style="line-height: 28.0px;font-weight: 700;font-size: 21.0px;margin: 0;padding: 0;">
                        Vemos que tratas de recuperar tu cuenta. No te preocupe, esto suele suceder. Te mandamos tus datos <br> 
                    <span style="font-weight: 400;margin: 0;padding: 0;">Enviado el '.date("Y-m-d h:i:s").'</span></h4>
                    </td>
                    </tr>
                    <tr>
                    <td>
                    <div align="left" style="margin: 0;padding: 19.0px 31.0px 12.0px;">
                    <table style="border-collapse: collapse;width: 100.0%;font-size: 16.0px;margin: 0;padding: 0;border: 0;">
                    <tbody>
                    
                    <tr bgcolor="#0056a3">
                    <td style="font-weight: 700; color: #fff; margin: 0;padding: 12.0px 19.0px;text-align:center;" colspan="2">Información personal<br></td>
                    </tr>
                    
                    <tr bgcolor="#f7f7f8">
                    <td style="font-weight: 700; color: #333; margin: 0;padding: 12.0px 19.0px;">Email:<br></td>
                    <td style="color: rgb(21,35,43);margin: 0;padding: 12.0px 19.0px;">'.$email.'<br></td>
                    </tr>
                    
                    <tr bgcolor="#cfd4d8">
                    <td style="font-weight: 700; color: #333; margin: 0;padding: 12.0px 19.0px;">Password:<br></td>
                    <td style="color: rgb(21,35,43);margin: 0;padding: 12.0px 19.0px;">'.$clave.'<br></td>
                    </tr>
                    
                    <tr bgcolor="#0056a3">
                    <td style="font-weight: 700; color: #fff; margin: 0;padding: 12.0px 19.0px;text-align:center;" colspan="2"> <a href="http://arcsoluciones.com.mx/iniciar-sesion" style="color:#fff;">Inicia Sesión</a><br></td>
                    </tr>
                   
                    </tbody>
                    </table>
                    </div>
                    </td>
                    <td><br></td>
                    </tr>
                    </tbody>
                    </table>
                    
                    </div>
                    <style>
                    @import url("https://fonts.googleapis.com/css?family=Didact+Gothic&display=swap");
                    
                    </style>
                    
                    ';
                    
                    $headers  ='MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                    $headers .= "From: noreply@arcsoluciones.com.mx" . "\r\n";
                    if (mail($to, $subject, $message, $headers)) {
                        echo '
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong> Grandioso !</strong> Te hemos enviado un correo , de no verlo. Revisa en SPAM.
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        ';
                    }else{
                      echo '
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong> <i class="fas fa-bug"></i> !</strong> No hemos podido enviar el correo.
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      ';
                    }
                  }
                ?>
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