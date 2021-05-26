<?php

include_once("admin-/modelo/bd.php");
include_once("admin-/modelo/info.class.php");
include_once("admin-/modelo/interesado.class.php");
include_once("admin-/modelo/categoria.class.php");
include_once("admin-/modelo/producto.class.php");
include_once("admin-/modelo/usuarios.class.php");
include_once("admin-/modelo/empresa.class.php");
include("admin-/modelo/backend.class.php");


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
    "telefono"=>$dato['telefono'],
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
?>


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
      "telefono"=>$dato['telefono'],
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
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from preview.webpixels.io/purpose-application-ui-kit/application/utility/error-500 by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Nov 2020 09:10:16 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Purpose Application UI is the following chapter we've finished in order to create a complete and robust solution next to the already known Purpose Website UI.">
  <meta name="author" content="Webpixels">
  <title><?php  echo "$datos_WebSite[titulo_web_site]".PHP_EOL; ?> | Error Server </title>
  <!-- Favicon -->
  <link rel="icon" href="\assets\media\empresa\<?php  echo "$datos_WebSite[logo_pestana]".PHP_EOL; ?>" type="image/png">
  <!-- Font Awesome 5 -->
  <link rel="stylesheet" href="../../assets/libs/%40fortawesome/fontawesome-pro/css/all.min.css"><!-- Purpose CSS -->
  <link rel="stylesheet" href="../../assets/css/purpose.css" id="stylesheet">
</head>

<body>
  <div id="omnisearch" class="omnisearch">
    <div class="container">
      <!-- Search form -->
      <form class="omnisearch-form">
        <div class="form-group">
          <div class="input-group input-group-merge input-group-flush">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="far fa-search"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Type and hit enter ...">
          </div>
        </div>
      </form>
      <div class="omnisearch-suggestions">
        <h6 class="heading">Search Suggestions</h6>
        <div class="row">
          <div class="col-sm-6">
            <ul class="list-unstyled mb-0">
              <li>
                <a class="list-link" href="#">
                  <i class="far fa-search"></i>
                  <span>macbook pro</span> in Laptops
                </a>
              </li>
              <li>
                <a class="list-link" href="#">
                  <i class="far fa-search"></i>
                  <span>iphone 8</span> in Smartphones
                </a>
              </li>
              <li>
                <a class="list-link" href="#">
                  <i class="far fa-search"></i>
                  <span>macbook pro</span> in Laptops
                </a>
              </li>
              <li>
                <a class="list-link" href="#">
                  <i class="far fa-search"></i>
                  <span>beats pro solo 3</span> in Headphones
                </a>
              </li>
              <li>
                <a class="list-link" href="#">
                  <i class="far fa-search"></i>
                  <span>smasung galaxy 10</span> in Phones
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="min-vh-100 h-100vh py-5 d-flex align-items-center bg-gradient-danger">
    <div class="bg-absolute-cover vh-100 overflow-hidden d-none d-md-block">
      <figure class="w-100">
        <img alt="Image placeholder" src="../../assets/img/svg/backgrounds/bg-4.svg" class="svg-inject">
      </figure>
    </div>
    <div class="container position-relative zindex-100">
      <div class="row justify-content-center align-items-center">
        <div class="col-lg-6">
          <h6 class="display-1 mb-3 font-weight-600 text-white">500</h6>
          <p class="lead text-lg text-white mb-5">
            Problemas con la petición.
          </p>
          <a href="/" class="btn btn-white btn-icon rounded-pill hover-translate-y-n3">
            <span class="btn-inner--icon"><i class="far fa-home"></i></span>
            <span class="btn-inner--text">Regresar a casa</span>
          </a>
        </div>
        <div class="col-lg-6 d-none d-lg-block">
          <figure class="w-100">
            <img alt="Image placeholder" src="../../assets/img/svg/illustrations/server-down.svg" class="svg-inject opacity-8 img-fluid" style="height: 500px;">
          </figure>
        </div>
      </div>
    </div>
  </div>
  <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
  <script src="../../assets/js/purpose.core.js"></script>
  <!-- Purpose JS -->
  <script src="../../assets/js/purpose.js"></script>
  <!-- Demo JS - remove it when starting your project -->
  <script src="../../assets/js/demo.js"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-104437451-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-104437451-1');
  </script>
</body>


<!-- Mirrored from preview.webpixels.io/purpose-application-ui-kit/application/utility/error-500 by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Nov 2020 09:10:17 GMT -->
</html>