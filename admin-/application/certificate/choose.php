<?php
    include("../../modelo/bd.php");
    include("../../modelo/info.class.php");
    include("../../modelo/interesado.class.php");
    include("../../modelo/usuarios.class.php");
    include("../../modelo/backend.class.php");
    include("../../modelo/empresa.class.php");

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
?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from preview.webpixels.io/purpose-application-ui-kit/application/task/create-new by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Nov 2020 09:10:10 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?php echo "$datos_WebSite[meta_description]".PHP_EOL;?>">
  <meta name="author" content="<?php  echo "$datos_WebSite[autor]".PHP_EOL; ?>">
  <title><?php  echo "$datos_WebSite[titulo_web_site]".PHP_EOL; ?> - Certificados</title>
  <!-- Favicon -->
    <link rel="icon" href="\assets\media\empresa\<?php  echo "$datos_WebSite[logo_pestana]".PHP_EOL; ?>" type="image/png">
  <!-- Font Awesome 5 -->
  <link rel="stylesheet" href="../../assets/libs/%40fortawesome/fontawesome-pro/css/all.min.css"><!-- Page CSS -->
  <link rel="stylesheet" href="../../assets/libs/quill/dist/quill.core.css" type="text/css">
  <link rel="stylesheet" href="../../assets/libs/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="../../assets/libs/flatpickr/dist/flatpickr.min.css">
  <!-- Purpose CSS -->
  <link rel="stylesheet" href="../../assets/css/purpose.css" id="stylesheet">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

</head>

<body class="application application-offset">
  <style>
    .gray-scale{
        transition:.3s all ease;
    }
    .gray-scale:hover{
        filter: grayscale(100%);
    }
  </style>
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
                    <h5 class="h4 d-inline-block font-weight-400 mb-0 text-white">Generar Certificado</h5>
                  </div>
                  <!-- Additional info -->
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-end">
                  <a href="/admin-/application/certificate/new-certificate-wholesale" class="btn btn-sm btn-white btn-icon rounded-pill">
                    <span class="btn-inner--icon"><i class="far fa-users"></i></span>
                    <span class="btn-inner--text">Generar por volumen</span>
                  </a>
                </div>
              </div>
            </div>
            <form class="mt-4">
              <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-6" class="text-center">
                            <div class="form-group">
                                <a href="./new-certificate">
                                    <img src="../../../../../assets/media/certificados/individual.jpg" class="img-fluid gray-scale" alt="crear certificados individuales de ARC">
                                </a>
                            </div>
                            <div class="form-group">
                                <strong class="text-center mt-3">INDIVIDUAL</strong>
                            </div>
                        </div>

                        <div class="col-md-6" class="text-center">
                            <div class="form-group">
                                <a href="./new-certificate-wholesale">
                                    <img src="../../../../../assets/media/certificados/multiple.jpg" class="img-fluid gray-scale" alt="crear certificados individuales de ARC">
                                </a>
                            </div>
                            <div class="form-group">
                                <strong class="text-center mt-3">MULTIPLE</strong>
                            </div>
                        </div>

                    </div>
                </div>
              </div>
            </form>
          </div>
        </div>

        <!-- Listing -->
        <div class="card">
            <!-- Card header -->
            <div class="card-header actions-toolbar border-0">
              <div class="row justify-content-between align-items-center">
                <div class="col-12">
                  <h6 class="d-inline-block mb-0">Certificados Generados</h6>
                  <button type="button" class="btn btn-outline-dark btn-sm mx-3" data-toggle="modal" data-target="#filter_date"> <i class="fas fa-filter"></i> Filtros </button>
                </div>
                <div class="col text-right">
                
                </div>
              </div>
            </div>
            <!-- Table -->
            <div class="table-responsive p-1">
            <table id="example" class="display" style="width:100%">

                <thead>
                  <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Email</th>
                    <th scope="col">Honores</th>
                    <th scope="col"></th>
                  </tr>
                </thead>

                <tbody>
                      <?php 
                        date_default_timezone_set("America/Mexico_City");
                        setlocale(LC_TIME, "spanish");
                        $fecha=date("Y-m-d");
                        if(isset($_GET['inicio_filtro']) AND isset($_GET['fin_filtro'] )){
                            $query_string="SELECT * FROM certificados_generados WHERE created_add BETWEEN '$_GET[inicio_filtro]' AND '$_GET[fin_filtro]' "; 
                        }else{
                            $query_string="SELECT * FROM certificados_generados WHERE created_add='$fecha'"; 
                        }
                        //echo $query_string;
                        $empresas=$empresas->sqlquery($query_string);
                        foreach($empresas as $empresa){
                      ?>
                        <tr>
                          <th scope="row">
                            <?php echo $empresa['nombre']; ?>
                          </th>
                          <td>
                              <a href="#" class="name h6 mb-0 text-sm text-uppercase">
                                <?php echo $empresa['curso']; ?>
                              </a>           
                          </td>
                          <td>
                              <a href="#" class="name h6 mb-0 text-sm text-uppercase">
                                <?php echo $empresa['email']; ?>
                              </a>                  
                          </td>
                          <td class="text-right">
                            <!-- Actions -->
                            <div class="actions ml-3">
                                
                              <a href="/assets/media/certificados/files_generator/generator.php?id=<?php echo  $empresa['id_certificados']; ?>" target="new" class="action-item text-dark mr-2" data-toggle="tooltip" title="Reconocimiento">
                                <i class="fas fa-file-certificate"></i>
                              </a>
                              
                              <?php 
                                if($empresa['dc3_generate']==1){
                              ?>
                              <a target="_blank" href="/assets/media/certificados/files_generator/generator_ds3.php?id=<?php echo $empresa['id_certificados']; ?>" class="text-dark mr-2" data-toggle="tooltip" title="DC3">
                                <strong>DC3</strong>
                              </a>
                              <?php 
                                }
                                if($empresa['diploma_generate']==1){
                              ?>
                                <a target="_blank" href="/assets/media/certificados/files_generator/generator_diploma.php?id=<?php echo $empresa['id_certificados']; ?>" class="text-dark mr-2" data-toggle="tooltip" title="Diploma">
                                  <i class="far fa-file-certificate"></i>
                                </a>
                              <?php 
                                }
                              ?>
                            </div>
                          </td>
                          <td>
                              <a href="/admin-/application/certificate/new-certificate?id=<?php echo  $empresa['id_certificados']; ?>&action=update" class="action-item mr-2" data-toggle="tooltip" title="Editar">
                                <i class="fas fa-pencil-alt"></i>
                              </a>
                              
                              <a href="/admin-/application/certificate/choose?id=<?php echo  $empresa['id_certificados']; ?>&action=delete" class="action-item text-danger mr-2" data-toggle="tooltip" title="Eliminar">
                                <i class="far fa-trash"></i>
                              </a>
                              
                              <a href="/admin-/application/certificate/choose?id=<?php echo  $empresa['id_certificados']; ?>&action=resend_email" class="action-item text-info mr-2" data-toggle="tooltip" title="Reenviar email">
                                <i class="fas fa-shipping-fast"></i>
                              </a>
                          </td>
                        </tr>
                      <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Email</th>
                    <th scope="col">Honores</th>
                    <th scope="col"></th>
                  </tr>
                </tfoot>
                </table>
            </div>
            <?php
            
              if(isset($_GET['id']) AND $_GET['action']=='delete'):
                $string="DELETE FROM certificados_generados WHERE id_certificados='$_GET[id]'";
                $empresas=new Empresas();
                $empresas=$empresas->sqlquery($string);
                echo "<script>location.href='/admin-/application/certificate/choose'</script>";
              endif;
              
              if(isset($_GET['action']) AND $_GET['action']=='resend_email'):
              
                    $id_certificado = $_GET['id'];
                    $certificado_gen = new Empresas();
                    $query="SELECT email,diploma_generate,dc3_generate FROM certificados_generados WHERE id_certificados='$id_certificado'";
                    $certificado_gen = $certificado_gen->sqlquery($query);
            
                    foreach($certificado_gen as $creadential):
                        $data['email']=$creadential['email'];
                        $data['diploma_generate']=$creadential['diploma_generate'];
                        $data['dc3_generate']=$creadential['dc3_generate'];
                    endforeach;
        
                    $to = $data['email'];
                    $subject = "Nuevo Certificado en ARC SOLUCIONES";
                    $message = '
                    
                      <div style="font-family: Didact Gothic, sans-serif; margin: 0;padding: 19.0px;">
                      <table style="border-collapse: collapse;width: 100.0%;color: rgb(69,85,96);margin: 0 auto 12.0px;padding: 0;">
                      <tbody>
                      <tr>
                      <td><br></td>
                      <td style="display: block;max-width: 700.0px;clear: both;margin: 0 auto 31.0px;padding: 0;">
                      <div style="display: block;max-width: 700.0px;margin: 19.0px auto 31.0px;padding: 0 19.0px;">
                      <table style="border-collapse: collapse;width: 100%;margin: 0;padding: 0;">
                      <tbody>
                      <tr>
                      <td> 
                        <img style="max-width: 100.0%;" width="172" alt="ARC SOLUCIONES" src="https://'.$_SERVER['HTTP_HOST'].'/assets/media/empresa/'.$datos_WebSite['logo_pestana'].'">
                      </td>
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
                        Felicitaciones!! Acabas de recibir un certificado <br> 
                      <span style="font-weight: 400;margin: 0;padding: 0;">Enviado el '.date("Y-m-d h:i:s").'</span></h4>
                      <small> Aún no te has registrado. <a href="//'.$_SERVER['HTTP_HOST'].'/registrate">Dale</a> </small>
                      </td>
                      </tr>
                      <tr>
                      <td>
                      <div align="left" style="margin: 0;padding: 19.0px 31.0px 12.0px;">
                      <table style="border-collapse: collapse;width: 100.0%;font-size: 16.0px;margin: 0;padding: 0;border: 0;">
                      <tbody>
                      
                      <tr bgcolor="#0056a3">
                      <td style="font-weight: 700; color: #fff; margin: 0;padding: 12.0px 19.0px;text-align:center;" colspan="2">Certificado<br></td>
                      </tr>
                      
                      <tr bgcolor="#f7f7f8">
                      <td style="font-weight: 700; color: #333; margin: 0;padding: 12.0px 19.0px;">Certificado :<br></td>
                      <td style="color: rgb(21,35,43);margin: 0;padding: 12.0px 19.0px;">
                        <a href="https://'.$_SERVER['HTTP_HOST'].'/assets/media/certificados/files_generator/generator.php?id='.$id_certificado.'">Ver mi certificado</a>
                      <br></td>
                      </tr>
                    ';

                    if($data['dc3_generate']==1){
                      $message.='
                        <tr bgcolor="#f7f7f8">
                        <td style="font-weight: 700; color: #333; margin: 0;padding: 12.0px 19.0px;">DC3 :<br></td>
                        <td style="color: rgb(21,35,43);margin: 0;padding: 12.0px 19.0px;">
                          <a href="https://'.$_SERVER['HTTP_HOST'].'/assets/media/certificados/files_generator/generator_ds3.php?id='.$id_certificado.'">Ver mi DC3</a>
                        <br></td>
                        </tr>
                      ';
                    }

                    if($data['diploma_generate']==1){
                      $message.='
                        <tr bgcolor="#f7f7f8">
                        <td style="font-weight: 700; color: #333; margin: 0;padding: 12.0px 19.0px;">Diploma :<br></td>
                        <td style="color: rgb(21,35,43);margin: 0;padding: 12.0px 19.0px;">
                          <a href="https://'.$_SERVER['HTTP_HOST'].'/assets/media/certificados/files_generator/generator_diploma.php?id='.$id_certificado.'">Ver mi Diploma</a>
                        <br></td>
                        </tr>
                      ';
                    }

                    $message.='

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
                    $headers .= "From: servidor@arcsoluciones.com.mx" . "\r\n";
                    $headers .= "Cc: scdt.bussines@gmail.com" . "\r\n";
                  if(mail($to, $subject, $message, $headers)){
                      echo "<script>location.href='/admin-/application/certificate/choose'</script>";
                  }else{
                      echo "No se ha podido enviar el email";
                  }
            endif;

            ?>
            
          </div>
      </div>
      <!-- Footer -->
      <?php include_once("../../application/part/footer.php") ?>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script>
      $(document).ready(function() {
      $('#example').DataTable();
  } );
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <!-- Purpose JS -->
  <script src="../../assets/js/purpose.js"></script>
  
</body>
<?php 
    date_default_timezone_set("America/Mexico_City");
    setlocale(LC_TIME, "spanish");
    $fecha=date("Y-m-d");
?>
<!-- Modal -->
<div class="modal fade" id="filter_date" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">APLICANDO FILTROS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
        <div class="form-group row">
            <div class="col-md-6">
                <label id="inicio_filtro">De:</label>
                <input type="date" id="inicio_filtro" name="inicio_filtro" class="form-control" value="<?php if( isset($_GET['inicio_filtro']) ){ echo $_GET['inicio_filtro']; } ?>">
            </div>
            <div class="col-md-6">
                <label id="fin_filtro">Hasta:</label>
                <input type="date" name="fin_filtro" class="form-control" max="<?=$fecha?>" value="<?php if(isset($_GET['fin_filtro'])){echo $_GET['fin_filtro']; } ?>">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <?php if(isset($_GET['inicio_filtro']) AND isset($_GET['fin_filtro'] )){?><a type="button" class="btn btn-secondary" href="/admin-/application/certificate/choose">Eliminar Filtros</a><?php } ?>
        <button type="submit" class="btn btn-dark">Aplicar</button>
        </form>
      </div>
    </div>
  </div>
</div>

</html>