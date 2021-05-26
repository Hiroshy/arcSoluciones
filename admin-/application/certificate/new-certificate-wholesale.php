<?php
    include("../../modelo/bd.php");
    include("../../modelo/info.class.php");
    include("../../modelo/interesado.class.php");
    include("../../modelo/empresa.class.php");
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

  /***Empresas */
  $interesados=new Interesado();
  if ($datos_usuario['nivel']=='usuario') {
    echo '<script>location.href="/admin-/application/account/profile"</script>';
  }
?>
<!DOCTYPE html>
<html lang="en">

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
                    <h5 class="h4 d-inline-block font-weight-400 mb-0 text-white">Generar Certificado</h5>
                  </div>
                  <!-- Additional info -->
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-end">
                  <a href="/admin-/application/certificate/new-certificate" class="btn btn-sm btn-white btn-icon rounded-pill">
                    <span class="btn-inner--icon"><i class="far fa-user"></i></span>
                    <span class="btn-inner--text">Generar por usuario</span>
                  </a>
                  <a href="//web.whatsapp.com/send?phone=+5215620222283" target="_blank"  data-toggle="tooltip" data-placement="left" title="" data-original-title="Solicitar más plantillas" class="btn btn-sm btn-white btn-icon rounded-pill">
                    <span class="btn-inner--icon"> <i class="fas fa-brain"></i> </span>                  
                  </a>
                </div>
              </div>
            </div>
            <form class="mt-4" method="POST" enctype=multipart/form-data >
                
            <div class="card">
                <div class="card-body">
                  <!-- Representante Legal -->
                  <div class="form-group">
                    <label class="form-control-label">
                      Repr. Legal
                    </label>
                    <input type="text" class="form-control" name="r_legal" id="r_legal">
                  </div>
                   <!-- Representante de los Trabajadores -->
                  <div class="form-group">
                    <label class="form-control-label">
                      Repr. Trabajadores
                    </label>
                    <input type="text" class="form-control" name="repr_trabajadores" id="repr_trabajadores">
                  </div>
                </div>
              </div>
                 
              <div class="card">
                <div class="card-body">
                    <!-- Profesor-->
                  <input type="hidden" class="form-control" name="id_certificado" id="id_certificado" value="<?php echo md5(chr(rand(0,9999))); ?>">
                  <div class="form-group">
                    <label class="form-control-label">
                      ¿ Quién lo firmará ?
                    </label>
                    <select class="custom-select" name="profesor">
                      <?php
                        $datos="SELECT * FROM usuario INNER JOIN certificados_instructor ON usuario.id = certificados_instructor.id_user  WHERE nivel='colaborador'"; 
                        $usuarios=new Usuarios();
                        $usuarios=$usuarios->sqlquery($datos);
                        foreach ($usuarios as $usuario) {
                      ?>
                        <option value="<?php echo $usuario['id_user'];?>" class="tex-uppercase">
                          <?php echo strtoupper(openssl_decrypt( $usuario['nombre'],$metodo,$pass)) .' '.strtoupper(openssl_decrypt( $usuario['apellido'],$metodo,$pass)); ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                  <!-- Curso-->
                  <div class="form-group">
                    <label class="form-control-label">
                      Curso
                    </label>
                    <select class="custom-select" name="curso">
                      <?php
                        $datos="SELECT * FROM producto WHERE es_curso=1";
                        $cursos=new Empresas();
                        $cursos=$cursos->sqlquery($datos);
                        foreach ($cursos as $curso) {
                      ?>
                        <option value="<?php echo ucwords($curso['id']) ; ?>" class="tex-uppercase">
                          <?php echo mb_strtoupper($curso['producto']) ; ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>


                  <!-- Empresa-->
                  <div class="form-group">
                    <label class="form-control-label">
                      Empresa
                    </label>
                    <select class="custom-select" name="empresas">
                      <?php
                        $datos="SELECT id,empresas FROM empresas";
                        $cursos=new Empresas();
                        $cursos=$cursos->sqlquery($datos);
                        foreach ($cursos as $curso) {
                      ?>
                        <option value="<?php echo ucwords($curso['id']) ; ?>" class="tex-uppercase">
                          <?php echo mb_strtoupper($curso['empresas']) ; ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="area_tematica_curso" class="form-control-label">Área Temática del Curso</label>
                    (<small>Solo 5 números</small>)
                    <input type="text" name="area_tematica_curso" class="form-control" pattern="[0-9]{1,5}" id="area_tematica_curso">
                  </div>

                  <!-- la plantilla -->
                  <div class="form-group">
                    <label class="form-control-label">
                      Selecciona una plantilla
                    </label>
                    <div class="form-group">
                    <!-- Swiper -->
                    <style>
                      input[type='radio']{
                        display:none;
                      }
                      input[type='radio']:checked ~ label{
                        filter:grayscale(1);
                      }
                    </style>
                    <div class="swiper-container">
                      <div class="swiper-wrapper">
                      <?php 
                      $empresas=new Empresas();
                      $empresas=$empresas->sqlquery("SELECT * FROM certificados_lista"); 
                      foreach($empresas as $empresa){
                      ?>
                        <div class="swiper-slide">
                    
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="plantilla" id="plantilla<?php echo $i;?>" value="<?php echo $empresa['ruta'];?>">
                            <label class="form-check-label" for="plantilla<?php echo $i;?>">
                              <img src="/assets/media/certificados/preview/<?php echo $empresa['previsualizar'];?>" width="200" class="img-fluid" alt="">
                            </label>
                            <?= $empresa['template'];?>
                          </div>
                        </div>

                      <?php };?>
                      </div>
                    </div>
                  </div>

                  <!-- Fin Curso -->
                  <div class="form-group">
                    <label class="form-control-label">
                      Inicio del curso
                    </label>
                    <input type="date" class="form-control" name="inicio_curso">
                  </div>

                  <!-- Fin Curso -->
                  <div class="form-group">
                    <label class="form-control-label">
                      Fin del curso
                    </label>
                    <input type="date" class="form-control" name="fin_curso">
                  </div>
                    <label class="form-control-label">
                      Subir Archivo CSV
                    </label>
                    <div class="custom-file mb-3">
                        <label class="custom-file-label" for="validatedCustomFile">Subir Archivo</label>
                        <input type="file" id="validatedCustomFile" name="file_generator" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                    </div>
                    
                    <div class="form-group">
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="customSwitch2" name="dc3" value="1">
                      <label class="custom-control-label" for="customSwitch2">Generar DC3</label>
                    </div>
                  </div>
                  
                  <!-- Divider -->
                  <hr class="mt-5 mb-4">
                  <!-- Buttons -->
                  <div class="text-right">
                    <a href="#" class="btn btn-link text-sm text-muted font-weight-bold">Cancelar</a>
                    <button type="submit" name="generate_now" class="btn btn-sm btn-primary rounded-pill">Crear</button>
                  </div>
                </div>
              </div>
            </form>

            <?php 
              if(isset($_POST['generate_now'])):
                /**ruta para el archivo CSV */
                $ruta="../../../assets/media/certificados/datos/";

                /**Zona horaria MX */
                date_default_timezone_set("America/Mexico_City");
                setlocale(LC_TIME, "spanish");
                $fecha_create=date("Y-m-d");

                $data_teacher=[];
                $data_usuario=[];
                $data_curso=[];
                
                $data=[
                    "id_certificado"=>$_POST['id_certificado'],
                    "idcurso"=>$_POST['curso'],
                    "fin_curso_string"=>strftime("%d de %B del %Y",strtotime($_POST['fin_curso'])),
                    "profesor"=>$_POST['profesor'],
                    "plantilla"=>$_POST['plantilla'],
                    "r_legal"=>$_POST['r_legal'],
                    "repr_trabajadores"=>$_POST['repr_trabajadores'],
                    "diploma"=>($_POST['diploma']==1)?$_POST['diploma']:0,
                    "dc3"=>($_POST['dc3']==1)?$_POST['dc3']:0,
                    "inicio_curso"=>$_POST['inicio_curso'],
                    "fin_curso"=>$_POST['fin_curso'],
                    "area_tematica_curso"=>$_POST['area_tematica_curso'],
                    "empresa"=>$_POST['empresas'],
                    "plantilla"=>$_POST['plantilla']
                ];
                
                $nombre_archivo=$_FILES['file_generator']['name'];
                $ruta_temporal=$_FILES['file_generator']['tmp_name'];

                /**sacamos las horas del curso */
                $datos_curso=new Empresas();
                $string="SELECT horas,producto FROM producto WHERE id=$data[idcurso]";
                $datos_curso=$datos_curso->sqlquery($string);

                $data_curso["nombreCurso"]=$datos_curso[0]['producto'];
                echo $data_curso["horas"]=$datos_curso[0]['horas'];

                /**sacamos los datos del maestro */
                $datos_maestros=new Empresas();
                $string="SELECT * FROM certificados_instructor WHERE id_user=$data[profesor]";
                $datos_maestros=$datos_maestros->sqlquery($string);
                foreach($datos_maestros as $maestro){
                    $data_teacher["firma"]=$maestro['firma'];
                    $data_teacher["idSTPS"]=$maestro['idSTPS'];
                    $data_teacher["titulo"]=$maestro['titulo'];
                }

                $nombreMaestro=new Empresas();
                $string="SELECT nombre,apellido FROM usuario WHERE id=$data[profesor]";
                $nombreMaestro=$nombreMaestro->sqlquery($string);
                $data_teacher["nombreMaestro"]=$nombreMaestro=openssl_decrypt($nombreMaestro[0]['nombre'],$metodo,$pass).' '.openssl_decrypt($nombreMaestro[0]['apellido'],$metodo,$pass);
                
                $fecha=getdate();
                $fecha=$fecha['mday'].'-'.$fecha['mon'].'-'.$fecha['year'].'_'.$fecha['hours'].'-'.$fecha['minutes'].'-'.$fecha['seconds'].'.csv';
                $destino=$ruta.$fecha;

                $explo=explode(".",$nombre_archivo);
                if( $explo[1] <> "csv"){
                  $alert=1;
                }else{
                  if(move_uploaded_file($ruta_temporal,$destino)){
                    $alert=2;
                  }
                }
              
              $x=0;
              $data_=array();
              $fichero=fopen($destino,"r");
              while(($misDatos = fgetcsv($fichero,1000)) != FALSE){
                $x++;
                if($x>1){
                    
                    $data_[]="INSERT INTO certificados_generados (id_certificados,nombre,curp,puesto,ocupacion,curso,dia_empezo_c,dia_termino_c,dia_finalizado,horas,area_tematica_curso,profesor,titulo_profesor,codSEP,firma,email,plantilla,diploma_generate,dc3_generate,id_empresa_dirigida,created_add,repr_legal,repr_trabajadores, `id_curso`) values 
                    ('$data[id_certificado]$x','$misDatos[0]','$misDatos[2]','$misDatos[3]','$misDatos[4]','$data_curso[nombreCurso]','$data[inicio_curso]','$data[fin_curso]','$data[fin_curso_string]','$data_curso[horas]','$data[area_tematica_curso]','$data_teacher[nombreMaestro]','$data_teacher[titulo]','$data_teacher[idSTPS]','$data_teacher[firma]','$misDatos[1]','$data[plantilla]',$misDatos[5],$data[dc3],$data[empresa],'$fecha_create','$data[r_legal]','$data[repr_trabajadores]',$data[idcurso])";
                    print_r($data_);
                    $subject = "Nuevo Certificado en ARC SOLUCIONES";
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
                      <td><img style="max-width: 100.0%;" width="172" alt="ARC SOLUCIONES" src="https://'.$_SERVER['HTTP_HOST'].'/assets/media/empresa/'.$datos_WebSite['logo_pestana'].'"><br></td>
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
                        <a href="
                        https://'.$_SERVER['HTTP_HOST'].'/assets/media/certificados/files_generator/generator.php?id='.$data['id_certificado'].$x.'">Ver mi certificado</a>
                      <br></td>
                      </tr>
                    ';
                    
                    if($data['dc3']==1){
                      $message.='
                        <tr bgcolor="#f7f7f8">
                        <td style="font-weight: 700; color: #333; margin: 0;padding: 12.0px 19.0px;">DC3 :<br></td>
                        <td style="color: rgb(21,35,43);margin: 0;padding: 12.0px 19.0px;">
                          <a href="https://'.$_SERVER['HTTP_HOST'].'/assets/media/certificados/files_generator/generator_ds3.php?id='.$data['id_certificado'].$x.'">Ver mi DC3</a>
                        <br></td>
                        </tr>
                      ';
                    }

                    if($misDatos[5]==1){
                      $message.='
                        <tr bgcolor="#f7f7f8">
                        <td style="font-weight: 700; color: #333; margin: 0;padding: 12.0px 19.0px;">Diploma :<br></td>
                        <td style="color: rgb(21,35,43);margin: 0;padding: 12.0px 19.0px;">
                          <a href="https://'.$_SERVER['HTTP_HOST'].'/assets/media/certificados/files_generator/generator_diploma.php?id='.$data['id_certificado'].$x.'">Ver mi Diploma</a>
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
                    $headers .= "From: noreply@arcsoluciones.com.mx" . "\r\n";
                    mail($misDatos[1], $subject, $message, $headers);
                }
              }
              

              $datos_curso=new Empresas();
              $insertamos=implode(";",$data_);

              if($datos_curso=$datos_curso->sqlquery($insertamos)){
                echo "<script>location.href='/admin-/application/certificate/choose'</script>";
              }

              fclose($fichero);
              echo "<script>location.href='/admin-/application/certificate/choose'</script>";
              
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
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <!-- Initialize Swiper -->
  <script>
    window.addEventListener("load",()=>{
      if(screen.width<500){
      var swiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 90,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
      });
    }else{
      var swiper = new Swiper('.swiper-container', {
        slidesPerView: 2,
        spaceBetween: 90,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
      });
    }});

  </script>
  <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
  <script>
    $(document).ready(function () {
      bsCustomFileInput.init()
    })
  </script>
  <script>
    $(function () {
            $('[data-toggle="tooltip"]').tooltip()
    })
  </script>
</body>


</html>