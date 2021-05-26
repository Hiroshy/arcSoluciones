<?php
    include("../../modelo/bd.php");
    include("../../modelo/info.class.php");
    include("../../modelo/interesado.class.php");
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

  /***Empresas */
  $empresas=new Empresas();

  $interesados=new Interesado();
  if ($datos_usuario['nivel']=='usuario') {
    echo '<script>location.href="/admin-/application/account/profile"</script>';
  }

  //error_reporting(null);
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
  <title><?php  echo "$datos_WebSite[titulo_web_site]".PHP_EOL; ?> - Productos</title>
  <!-- Favicon -->
    <link rel="icon" href="\assets\media\empresa\<?php  echo "$datos_WebSite[logo_pestana]".PHP_EOL; ?>" type="image/png">
  <!-- Font Awesome 5 -->
  <link rel="stylesheet" href="../../assets/libs/%40fortawesome/fontawesome-pro/css/all.min.css"><!-- Page CSS -->
  <link rel="stylesheet" href="../../assets/libs/quill/dist/quill.core.css" type="text/css">
  <link rel="stylesheet" href="../../assets/libs/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="../../assets/libs/flatpickr/dist/flatpickr.min.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
  <!-- Purpose CSS -->
  <link rel="stylesheet" href="../../assets/css/purpose.css" id="stylesheet">
  <style>
    .swiper-container {
      width: 100%;
      height: 100%;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;

      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }
  </style>
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
                    <h5 class="h4 d-inline-block font-weight-400 mb-0 text-white">Nuevo Template</h5>
                  </div>
                  <!-- Additional info -->
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-end">
                  <a href="//web.whatsapp.com/send?phone=+5215620222283" ata-toggle="tooltip" data-placement="left" title="" data-original-title="Solitar más plantillas" class="btn btn-sm btn-white btn-icon rounded-pill">
                    <span class="btn-inner--icon"> <i class="fas fa-brain"></i> </span>                  
                  </a>
                </div>
              </div>
            </div>
            <form class="mt-4" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
              <div class="card">
                <div class="card-body">

                  <!-- ID STPS-->
                  <div class="form-group">
                    <label class="form-control-label">
                        Nombre
                        <small style="display:block;">Nombre del Template</small>
                    </label>
                   
                    <input type="text" class="form-control" name="template" placeholder="Certificado de Seguridad Vial">
                  </div>

                <div class="form-group">
                    <label for="customFile" class="form-control-label">Preview</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="img_preview" accept="image/x-png,image/gif,image/jpeg" required>
                        <label class="custom-file-label" for="customFile">Vista Miniatura</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="customFile" class="form-control-label">Plantilla</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="img_plantilla" required>
                        <label class="custom-file-label" for="customFile">Subir Plantilla</label>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                    <!-- Divider -->
                    <hr class="mt-5 mb-4">
                    <!-- Buttons -->
                    <div class="text-right">
                        <a href="#" class="btn btn-link text-sm text-muted font-weight-bold">Cancelar</a>
                        <button type="submit" name="crear_template" class="btn btn-sm btn-primary rounded-pill">Crear</button>
                    </div>
                    </div>
                </div>

                </div>
              </div>
              
            </form>
            <?php

                if(isset($_POST['crear_template'])):
                    ///assets/media/certificados/file/
                    ///assets/media/certificados/preview/
                    $rutaPlantilla='../../../assets/media/certificados/files_generator/';
                    $rutaPreview='../../../assets/media/certificados/preview/';

                    $template=$_POST['template'];

                    $nombre_archivo_preview=$_FILES['img_preview']['name'];
                    $ruta_temporal_preview=$_FILES['img_preview']['tmp_name'];

                    $nombre_archivo_plantilla=$_FILES['img_plantilla']['name'];
                    $ruta_temporal_plantilla=$_FILES['img_plantilla']['tmp_name'];

                    
                    if(move_uploaded_file($ruta_temporal_plantilla,$rutaPlantilla.$nombre_archivo_plantilla)){
                        if(move_uploaded_file($ruta_temporal_preview,$rutaPreview.$nombre_archivo_preview)){
                            $string="INSERT INTO certificados_lista (template, previsualizar, ruta) VALUES ('$template','$nombre_archivo_preview','$nombre_archivo_plantilla')";
                            $empresas=new Empresas();
                            $empresas=$empresas->sqlquery($string);
                        }
                    }
                   echo "<script>location.href='/admin-/application/certificados-templates/mis-templates'</script>";
                endif;
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


<!-- Mirrored from preview.webpixels.io/purpose-application-ui-kit/application/task/create-new by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Nov 2020 09:10:10 GMT -->
</html>