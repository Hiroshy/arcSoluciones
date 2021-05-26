<?php
  include("../../modelo/bd.php");
  include("../../modelo/info.class.php");
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
  /***Usuarios-- */
  $usuarios=new usuarios();

  $usuarios=$usuarios->sqlquery("SELECT * FROM usuario WHERE id=$_GET[id]");

  foreach ($usuarios as $usuario) {
    $datos_usuario_data=[
      "nombre"=>htmlspecialchars(openssl_decrypt($usuario['nombre'],$metodo,$pass)),
      "apellido"=>htmlspecialchars(openssl_decrypt($usuario['apellido'],$metodo,$pass)),
      "rfc"=>htmlspecialchars(openssl_decrypt($usuario['rfc'],$metodo,$pass)),
      "curp"=>htmlspecialchars(openssl_decrypt($usuario['curp'],$metodo,$pass)),
      "empresa"=>htmlspecialchars(openssl_decrypt($usuario['empresa'],$metodo,$pass)),
      "fecha_nacimiento"=>htmlspecialchars($usuario['fecha_nacimiento']),
      "email"=>htmlspecialchars(openssl_decrypt($usuario['email'],$metodo,$pass)),
      "telefono"=>htmlspecialchars(openssl_decrypt($usuario['telefono'],$metodo,$pass)),
      "foto"=>$usuario['foto'],
      "biografia"=>htmlspecialchars($usuario['biografia']),
      "facebook"=>htmlspecialchars($usuario['facebook']),
      "twitter"=>htmlspecialchars($usuario['twitter']),
      "instagram"=>htmlspecialchars($usuario['instagram'])
    ];
  }

  $usuarios=new usuarios();

  $usuarios=$usuarios->sqlquery("SELECT * FROM usuario_direccion WHERE id_usuario=$_GET[id]");

  if ($usuarios) {
    foreach ($usuarios as $usuario) {
      $datos_usuario_direccion=[
        "direccion"=>$usuario['direccion'],
        "ciudad"=>$usuario['ciudad'],
        "pais"=>$usuario['pais'],
        "comentarios"=>$usuario['comentarios'],
        "cp"=>$usuario['cp']
      ];
    }
  }else{

      $datos_usuario_direccion=[
        "direccion"=>"",
        "ciudad"=>"",
        "pais"=>"",
        "comentarios"=>"",
        "cp"=>""
      ];

  }

  if ($datos_usuario['nivel']=='usuario') {
    echo '<script>location.href="/admin-/application/account/profile"</script>';
  }
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preview.webpixels.io/purpose-application-ui-kit/application/task/create-new by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Nov 2020 09:10:10 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?php echo "$datos_WebSite[meta_description]".PHP_EOL;?>">
  <meta name="author" content="<?php  echo "$datos_WebSite[autor]".PHP_EOL; ?>">
  <title><?php  echo "$datos_WebSite[titulo_web_site]".PHP_EOL; ?> | Vista Usuario </title>
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
                <h5 class="h4 d-inline-block font-weight-400 mb-0 text-white">Cliente #<?php echo $datos_usuario_data["curp"]; ?></h5>
              </div>
              <!-- Additional info -->
            </div>
          </div>
        </div>
        <!-- Listing -->
        <div class="card card-body p-md-5">
          <div class="row align-items-center mb-5">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <img src="<?php echo (strlen($datos_usuario_data['foto'])>=2)?'/assets/media/usuarios/'.$datos_usuario_data['foto']:'/assets/media/empresa/'.$datos_WebSite['logo_pestana'] ?>" alt="<?php echo $datos_usuario_data["nombre"]." ".$datos_usuario_data["apellido"]; ?>" height="30">
            </div>
            
          </div>
          <div class="row mb-5">
            <div class="col-lg-6 col-md-8">
              <h6 class="text-uppercase"><?php echo $datos_usuario_data["nombre"]." ".$datos_usuario_data["apellido"]; ?></h6>
              <p class="text-sm">
                <?php echo $datos_usuario_data["biografia"]; ?>
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <h5>Datos</h5>
              <!-- Table -->
              <div class="table-responsive">
                <table class="table mb-0">
                  <thead>
                    <tr>
                      <th class="px-0 bg-transparent border-top-0 text-center">Nombre</th>
                      <th class="px-0 bg-transparent border-top-0 text-center">Curp</th>
                      <th class="px-0 bg-transparent border-top-0 text-center">Rfc</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="px-0 text-center">
                        <span class="h6 text-sm"><?php echo $datos_usuario_data["nombre"]." ".$datos_usuario_data["apellido"]; ?></span>
                      </td>
                      <td class="px-0 text-center">
                        <?php echo $datos_usuario_data["curp"]; ?>
                      </td>
                      <td class="px-0 text-center">
                        <?php echo $datos_usuario_data["rfc"]; ?>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-12 col-md-6">
              <h5>Información adicional</h5>
              <dl class="row mt-4 align-items-center">
                <dt class="col-sm-3 h6 text-sm">Email</dt>
                <dd class="col-sm-9 text-sm"><a href="mailto:<?php echo $datos_usuario_data["email"]; ?>" target="_new" ><?php echo $datos_usuario_data["email"]; ?></a></dd>
                <dt class="col-sm-3 h6 text-sm">Teléfono</dt>
                <dd class="col-sm-9 text-sm"><a href="tel:<?php echo $datos_usuario_data["telefono"]; ?>"><?php echo $datos_usuario_data["telefono"]; ?></a></dd>
                <dt class="col-sm-3 h6 text-sm">Facebook</dt>
                <dd class="col-sm-9 text-sm"><?php echo $datos_usuario_data["facebook"]; ?></dd>
                <dt class="col-sm-3 h6 text-sm">Twitter</dt>
                <dd class="col-sm-9 text-sm"><?php echo $datos_usuario_data["twitter"]; ?></dd>
                <dt class="col-sm-3 h6 text-sm">Instagram</dt>
                <dd class="col-sm-9 text-sm"><?php echo $datos_usuario_data["instagram"]; ?></dd>
              </dl>
            </div>
            <div class="col-12 col-md-6">
              <h5>Dirección</h5>
              <dl class="row mt-4 align-items-center">
                <dt class="col-sm-3 h6 text-sm">Dirección</dt>
                <dd class="col-sm-9 text-sm"><?php echo $datos_usuario_direccion["direccion"]; ?></dd>
                
                <dt class="col-sm-3 h6 text-sm">Ciudad</dt>
                <dd class="col-sm-9 text-sm"><?php echo $datos_usuario_direccion["ciudad"]; ?></dd>

                <dt class="col-sm-3 h6 text-sm">País</dt>
                <dd class="col-sm-9 text-sm"><?php echo $datos_usuario_direccion["pais"]; ?></dd>

                <dt class="col-sm-3 h6 text-sm">Referencia</dt>
                <dd class="col-sm-9 text-sm"><?php echo $datos_usuario_direccion["comentarios"]; ?></dd>

                <dt class="col-sm-3 h6 text-sm">Código Postal</dt>
                <dd class="col-sm-9 text-sm"><?php echo $datos_usuario_direccion["cp"]; ?></dd>
              </dl>
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