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
  <title><?php  echo "$datos_WebSite[titulo_web_site]".PHP_EOL; ?> - Perfil</title>
  <!-- Favicon -->
    <link rel="icon" href="\assets\media\empresa\<?php  echo "$datos_WebSite[logo_pestana]".PHP_EOL; ?>" type="image/png">
  <!-- Font Awesome 5 -->
  <link rel="stylesheet" href="../../assets/libs/%40fortawesome/fontawesome-pro/css/all.min.css"><!-- Page CSS -->
  <link rel="stylesheet" href="../../assets/libs/quill/dist/quill.core.css" type="text/css">
  <link rel="stylesheet" href="../../assets/libs/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="../../assets/libs/flatpickr/dist/flatpickr.min.css">
  <!-- Purpose CSS -->
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
            <!-- Change avatar -->
            <div class="card bg-gradient-warning hover-shadow-lg border-0">
              <div class="card-body py-3">
                <div class="row row-grid align-items-center">
                  <div class="col-lg-8">
                    <div class="media align-items-center">
                      <a href="#" class="avatar avatar-lg rounded-circle mr-3">
                        <img alt="Image placeholder" src="<?php echo(strlen($datos_usuario['foto'])>=2)?'/assets/media/usuarios/'.$datos_usuario['foto']:'/assets/media/empresa/'.$datos_WebSite['logo_pestana'];?>">
                      </a>
                      <div class="media-body">
                        <h5 class="text-white mb-0"><?php echo $datos_usuario['nombre'].' '. $datos_usuario['apellido'];?></h5>
                        <div>
                          <a href="/admin-/application/account/settings#cambiaFoto" class="text-white">cambiar foto de perfil</a>
                        </div>
                      </div>
                    </div>

                    <div id="accordion-2" class="accordion accordion-spaced">
                  
                  
                  
              </div>
                  </div>
                  <div class="col-auto flex-fill mt-4 mt-sm-0 text-sm-right d-none d-lg-block">
                    <a href="/" class="btn btn-sm btn-white rounded-pill btn-icon shadow">
                      <span class="btn-inner--icon"><i class="far fa-fire"></i></span>
                      <span class="btn-inner--text">Conseguir un curso</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                  <!-- General information -->
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">Nombre</label>
                        <input class="form-control" name="nombre" type="text" placeholder="Escribe tu nombre" value="<?php echo $datos_usuario['nombre'];?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">Apellido</label>
                        <input class="form-control" name="apellido" type="text" placeholder="" value="<?php echo $datos_usuario['apellido'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row align-items-center">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">Birthday</label>
                        <input type="text" name="cumpleanos" class="form-control" data-toggle="date" placeholder="Tu fecha de cumpleaños es.." value="<?php echo $datos_usuario['fecha_nacimiento'];?>" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">Teléfono</label>
                        <input class="form-control" name="telefono" type="text" placeholder="+40-777 245 549" value="<?php echo $datos_usuario['telefono'];?>">
                      </div>
                    </div>
                  </div>

                  <div class="row align-items-center">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">CURP</label>
                        <input class="form-control" name="curp" type="text" placeholder="" value="<?php echo $datos_usuario['curp'];?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">RFC</label>
                        <input class="form-control" name="rfc" type="text" placeholder="" value="<?php echo $datos_usuario['rfc'];?>">
                      </div>
                    </div>
                  </div>

                  <hr />

                  <div class="row align-items-center">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">Ocupación</label>
                        <input class="form-control" name="ocupacion" placeholder="Ingeniero en Sistemas" type="text" value="<?php echo $datos_usuario['ocupacion'];?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">Puesto</label>
                        <input class="form-control" name="puesto" type="text" placeholder="Developer" value="<?php echo $datos_usuario['puesto'];?>">
                      </div>
                    </div>
                  </div>

                  <hr />

                  <!-- Description -->
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <div class="form-group">
                          <label class="form-control-label">Biografia</label>
                          <textarea class="form-control" name="bio" placeholder="Tell us a few words about yourself" rows="3"><?php echo $datos_usuario['biografia'];?></textarea>
                          <small class="form-text text-muted mt-2">Hablanos de ti ..</small>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr />
                  <!-- Save changes buttons -->
                  <button type="submit" name="actualiza_datos_perfil" class="btn btn-sm btn-primary rounded-pill">Guardar cambios</button>
                  <a href="/admin-/" class="btn btn-link text-muted">Home</a>
                </form>
              </div>
            </div>

            <?php
              if (isset($_POST['actualiza_datos_perfil'])) {
                $nombre=$_POST['nombre'];
                $apellido=$_POST['apellido'];
                $cumpleanos=$_POST['cumpleanos'];
                $telefono=$_POST['telefono'];
                $bio=$_POST['bio'];
                $curp=$_POST['curp'];
                $rfc=$_POST['rfc'];
                $ocupacion=$_POST['ocupacion'];
                $puesto=$_POST['puesto'];

                //ENCRYPT
                $nombre=openssl_encrypt( $nombre,$metodo,$pass);
                $apellido=openssl_encrypt($apellido,$metodo,$pass);
                $telefono=openssl_encrypt($telefono,$metodo,$pass);
                $curp=openssl_encrypt( $curp,$metodo,$pass);
                $rfc=openssl_encrypt( $rfc,$metodo,$pass);

                $contador=new usuarios();
                $contador=$contador->sqlquery("UPDATE `usuario` SET nombre='$nombre',apellido='$apellido',fecha_nacimiento='$cumpleanos',telefono='$telefono',biografia='$bio',curp='$curp',rfc='$rfc',ocupacion='$ocupacion',puesto='$puesto' WHERE id=$datos_usuario[id]");  
                echo '<script>location.href="/admin-/application/account/profile"</script>';
              }
            ?>

            <!-- Accordion card seo -->
            <div class="card" style="cursor:pointer;">
                      <div class="card-header py-4" id="heading-2-2" data-toggle="collapse" role="button" data-target="#collapse-2-2" aria-expanded="false" aria-controls="collapse-2-2">
                          <h6 class="mb-0"> <i class="far fa-user-circle"></i> REDES SOCIALES</h6>
                      </div>
                      <div id="collapse-2-2" class="collapse" aria-labelledby="heading-2-2" data-parent="#accordion-2">
                          <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                          <div class="card-body">
                              <div class="form-group">
                                  <label class="form-control-label">
                                    Facebook
                                  </label>
                                  <small class="form-text text-muted mb-2 mt-0">facebook.com<strong>/xxx-xxx</strong> </small>
                                  <input type="text" name="facebook" class="form-control" placeholder="" value="<?php echo $redes_sociales['facebook']; ?>">
                              </div>
                              <div class="form-group">
                                  <label class="form-control-label">
                                    Instagram
                                  </label>
                                  <input type="text" name="instagram" class="form-control" placeholder=""  value="<?php echo $redes_sociales['instagram']; ?>">
                              </div>
                              <div class="form-group">
                                  <label class="form-control-label">
                                    Twitter
                                  </label>
                                  <input type="text" name="twitter" class="form-control" placeholder="" value="<?php echo $redes_sociales['twitter']; ?>">
                              </div>
                              <div class="form-group">
                                <button name="guardar_redes_sociales" class="btn btn-sm btn-primary rounded-pill" type="submit">Guardar</button>
                              </div>
                          </div>
                          </form>
                      </div>
                  </div>
                  <?php
                    if (isset($_POST['guardar_redes_sociales'])) {
                      $facebook=$_POST['facebook'];
                      $twitter=$_POST['twitter'];
                      $instagram=$_POST['instagram'];

                      $contador=new usuarios();
                      $contador=$contador->sqlquery("UPDATE `usuario` SET facebook='$facebook',twitter='$twitter',instagram='$instagram' WHERE id=$datos_usuario[id]");  
                      echo '<script>location.href="/admin-/application/account/profile"</script>';
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
  
</body>


<!-- Mirrored from preview.webpixels.io/purpose-application-ui-kit/application/task/create-new by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Nov 2020 09:10:10 GMT -->
</html>