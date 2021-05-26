<?php
    include("../../modelo/bd.php");
    include("../../modelo/info.class.php");
    include("../../modelo/categoria.class.php");
    include("../../modelo/producto.class.php");
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

?>
<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?php echo "$datos_WebSite[meta_description]".PHP_EOL;?>">
  <meta name="author" content="<?php  echo "$datos_WebSite[autor]".PHP_EOL; ?>">
  <title><?php  echo "$datos_WebSite[titulo_web_site]".PHP_EOL; ?> - Nueva Categoria</title>
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
                    <h5 class="h4 d-inline-block font-weight-400 mb-0 text-white">Crear Categoria</h5>
                  </div>
                  <!-- Additional info -->
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-end">
                  <a href="/admin-/application/product/new-product" class="btn btn-sm btn-white btn-icon rounded-pill">
                    <span class="btn-inner--icon"><i class="far fa-tasks"></i></span>
                    <span class="btn-inner--text">Crear Producto</span>
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
                "servicio"=>"",
                "descripcion"=>"",
                "comentario"=>"",
                "meta_title"=>"",
                "meta_keyword"=>"",
                "meta_descripcion"=>""
              ];

              $consulta_categorias=new Categoria();

              $consulta_categorias=$consulta_categorias->consultar($datos_consulta);
               
              foreach($consulta_categorias as $resultado){
                $datos_categoria=[
                  "nombre"=> $resultado['categoria'],
                  "servicio"=> $resultado['servicio'],
                  "descripcion"=>$resultado['resumen'],
                  "comentario"=>$resultado['comentario'],
                  "meta_title"=>$resultado['meta_title'],
                  "meta_keyword"=>$resultado['meta_keyword'],
                  "meta_descripcion"=>$resultado['meta_description']
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
                      Categoria
                    </label>
                    <input type="text" class="form-control" name="nombre_categoria" value="<?php echo (isset($datos_categoria['nombre']))?$datos_categoria['nombre']:''; ?>">
                  </div>
                  <!-- Descripcion -->
                  <div class="form-group">
                    <label class="form-control-label mb-0">
                      Descripcion
                    </label>
                    <textarea name="descripcion_categoria" id="" class="form-control"><?php echo (isset($datos_categoria['descripcion']))?$datos_categoria['descripcion']:''; ?></textarea>
                  </div>
                  <!-- Comentario -->
                  <div class="form-group">
                    <label class="form-control-label mb-0">
                      Comentario
                    </label>
                    <textarea name="comentario_categoria" id="" class="form-control"><?php echo (isset($datos_categoria['comentario']))?$datos_categoria['comentario']:''; ?></textarea>
                  </div>
                  <div class="form-group custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="customSwitch1" <?php if (isset($datos_categoria['servicio'])) {
                                                                                                    if ($datos_categoria['servicio']==1) {
                                                                                                      echo "checked";
                                                                                                    };
                                                                                                  } ?> name="servicio" value="1">
                    <label class="custom-control-label" for="customSwitch1">Es un Servicio</label>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <div class="form-group">
                    <label class="form-control-label mb-0">
                      Imagen
                    </label>
                    <div class="custom-file mb-3">
                      <?php
                        if (isset($_GET['id'])) {
                      ?>
                        <input type="file" id="validatedCustomFile" name="img_categoria" accept="image/x-png,image/gif,image/jpeg"  >
                      <?php
                        }else{
                      ?>
                      <input type="file" id="validatedCustomFile" name="img_categoria" accept="image/x-png,image/gif,image/jpeg" required>
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
                    <button type="submit" name="crear" class="btn btn-sm btn-primary rounded-pill">Crear producto</button>
                  </div>
                </div>
              </div>

              <div id="accordion-2" class="accordion accordion-spaced">
                  
                  <!-- Accordion card seo -->
                  <div class="card">
                      <div class="card-header py-4" id="heading-2-2" data-toggle="collapse" role="button" data-target="#collapse-2-2" aria-expanded="false" aria-controls="collapse-2-2">
                          <h6 class="mb-0"><i class="far fa-lock mr-3"></i> SEO</h6>
                      </div>
                      <div id="collapse-2-2" class="collapse" aria-labelledby="heading-2-2" data-parent="#accordion-2">
                          <div class="card-body">
                              <div class="form-group">
                                  <label class="form-control-label">
                                    Meta Title
                                  </label>
                                  <small class="form-text text-muted mb-2 mt-0">Titulo Secundario</small>
                                  <input type="text" class="form-control" name="meta_title" placeholder="EMPRESA | Mi meta Title" value="<?php echo (isset($datos_categoria['meta_title']))?$datos_categoria['meta_title']:''; ?>">
                              </div>
                              <div class="form-group">
                                  <label class="form-control-label">
                                    Meta Keywords
                                  </label>
                                  <small class="form-text text-muted mb-2 mt-0">Recuerda separalos con una ,</small>
                                  <input type="text" class="form-control" name="meta_keyword" value="<?php echo (isset($datos_categoria['meta_keyword']))?$datos_categoria['meta_keyword']:''; ?>" placeholder="keyword 1, keyword 2 ">
                              </div>
                              <div class="form-group">
                                  <label class="form-control-label">
                                    Meta Description
                                  </label>
                                  <input type="text" class="form-control" name="meta_description" placeholder="" value="<?php echo (isset($datos_categoria['meta_descripcion']))?$datos_categoria['meta_descripcion']:''; ?>">
                              </div>
                          </div>
                      </div>
                  </div>
                  
              </div>

            </form>

            <?php
              if (isset($_POST['crear'])) {

                if (isset($_GET['id'])) {

                  if (strlen($_FILES['img_categoria']['name'])>3) {
                    $datos=[
                      "id"=>$_GET['id'],
                      "slug"=>$_POST['nombre_categoria'],
                      "nombre_categoria"=>$_POST['nombre_categoria'],
                      "servicio"=>($_POST['servicio']=='')?0:$_POST['servicio'],
                      "descripcion_categoria"=>$_POST['descripcion_categoria'],
                      "comentario_categoria"=>$_POST['comentario_categoria'],
                      "meta_title"=>$_POST['meta_title'],
                      "meta_keyword"=>$_POST['meta_keyword'],
                      "meta_description"=>$_POST['meta_description'],
                      "img_categoria_name"=>$_FILES['img_categoria']['name'],
                      "img_categoria_tmp_name"=>$_FILES['img_categoria']['tmp_name'],
                      "img_categoria_type"=>$_FILES['img_categoria']['type'],
                      "img_categoria_size"=>$_FILES['img_categoria']['size']
                    ];
                    if ((strpos($_FILES['img_categoria']['type'], "gif") || strpos($_FILES['img_categoria']['type'], "jpeg") || strpos($_FILES['img_categoria']['type'], "png") && ($_FILES['img_categoria']['size'] < 100000))) {
                      move_uploaded_file($_FILES['img_categoria']['tmp_name'], '../../../assets/media/categoria/'.$datos["img_categoria_name"]);
                    }
          
                    if ($categorias->actualizar($datos)==1) {
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
                      "slug"=>$_POST['nombre_categoria'],
                      "nombre_categoria"=>$_POST['nombre_categoria'],
                      "servicio"=>($_POST['servicio']=='')?0:$_POST['servicio'],
                      "descripcion_categoria"=>$_POST['descripcion_categoria'],
                      "comentario_categoria"=>$_POST['comentario_categoria'],
                      "meta_title"=>$_POST['meta_title'],
                      "meta_keyword"=>$_POST['meta_keyword'],
                      "meta_description"=>$_POST['meta_description']
                    ];
          
                    if ($categorias->actualizar($datos)==1) {
                      echo "
                      <div class='alert alert-success' role='alert'>
                        Categoria actualizada con éxito. <a href='$url_con_id' class='alert-link'>actualizar aqui</a>
                      </div>
                      ";

                    }else{
                      echo "
                      <div class='alert alert-danger' role='alert'>
                        Error al actualizar , intenta nuevamente ".$categorias->actualizar($datos)."
                      </div>
                      ";
                    }

                  }
                }else {
                  $datos=[
                    "slug"=>$_POST['nombre_categoria'],
                    "nombre_categoria"=>$_POST['nombre_categoria'],
                    "servicio"=>($_POST['servicio']=='')?0:$_POST['servicio'],
                    "descripcion_categoria"=>$_POST['descripcion_categoria'],
                    "comentario_categoria"=>$_POST['comentario_categoria'],
                    "meta_title"=>$_POST['meta_title'],
                    "meta_keyword"=>$_POST['meta_keyword'],
                    "meta_description"=>$_POST['meta_description'],
                    "img_categoria_name"=>$_FILES['img_categoria']['name'],
                    "img_categoria_tmp_name"=>$_FILES['img_categoria']['tmp_name'],
                    "img_categoria_type"=>$_FILES['img_categoria']['type'],
                    "img_categoria_size"=>$_FILES['img_categoria']['size']
                  ];
        
                  if ((strpos($_FILES['img_categoria']['type'], "gif") || strpos($_FILES['img_categoria']['type'], "jpeg") || strpos($_FILES['img_categoria']['type'], "png") && ($_FILES['img_categoria']['size'] < 100000))) {
                    move_uploaded_file($_FILES['img_categoria']['tmp_name'], '../../../assets/media/categoria/'.$datos["img_categoria_name"]);
                  }
        
                  if ($categorias->insertar($datos)==1) {
                    echo "
                    <div class='alert alert-success' role='alert'>
                      Categoria insertada con éxito.
                    </div>
                    ";
                  }else{
                    echo "
                    <div class='alert alert-danger' role='alert'>
                      Error al insertar , posible dato duplicado. Intenta nuevamente
                    </div>
                    ";
                    echo $categorias->insertar($datos);
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