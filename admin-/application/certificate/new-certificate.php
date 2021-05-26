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
?>
<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
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

<?php
    $data_=[];
    if(isset($_GET['action']) AND $_GET['action']=='update'){
        $id_certificado = $_GET['id'];
        $certificado_gen = new Empresas();
        $query="SELECT * FROM certificados_generados WHERE id_certificados='$id_certificado'";
        $certificado_gen = $certificado_gen->sqlquery($query);

        foreach($certificado_gen as $creadential):
            $data_['curp']=$creadential['curp'];
            $data_['repr_legal']=$creadential['repr_legal'];
            $data_['repr_trabajadores']=$creadential['repr_trabajadores'];
            $data_['nombre']=$creadential['nombre'];
            $data_['id_empresa_dirigida']=$creadential['id_empresa_dirigida'];
            $data_['curso']=$creadential['curso'];
            $data_['area_tematica_curso']=$creadential['area_tematica_curso'];
            $data_['dia_empezo_c']=$creadential['dia_empezo_c'];
            $data_['dia_termino_c']=$creadential['dia_termino_c'];
            $data_['diploma_generate']=$creadential['diploma_generate'];
            $data_['dc3_generate']=$creadential['dc3_generate'];
            $data_['plantilla']=$creadential['plantilla'];
            $data_['email']=$creadential['email'];
            $data_['id_empresa_dirigida']=$creadential['id_empresa_dirigida'];
            
            $data_['puesto']=$creadential['puesto'];
            $data_['ocupacion']=$creadential['ocupacion'];
        endforeach;
    }
    
?>

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
                  <a href="/admin-/application/certificate/new-certificate-wholesale" class="btn btn-sm btn-white btn-icon rounded-pill">
                    <span class="btn-inner--icon"><i class="far fa-users"></i></span>
                    <span class="btn-inner--text">Generar por volumen</span>
                  </a>
                  <a href="//web.whatsapp.com/send?phone=+5215620222283" target="_blank" data-toggle="tooltip" data-placement="left" title="" data-original-title="Solicitar más plantillas" class="btn btn-sm btn-white btn-icon rounded-pill">
                    <span class="btn-inner--icon"> <i class="fas fa-brain"></i> </span>                  
                  </a>
                </div>
              </div>
            </div>
            <form class="mt-4" action="<?php if(isset($_GET['action']) AND $_GET['action']=='update') { echo $_SERVER['REQUEST_URI']; } else {echo $_SERVER['PHP_SELF'];} ?>" method="POST">
              <div class="card">
                <div class="card-body">
                <input type="hidden" class="form-control" name="id_certificado" id="id_certificado" value="<?php if(isset($_GET['action']) AND $_GET['action']=='update'){ echo $id_certificado; }else{ echo md5(chr(rand(0,9999))); } ?>">
                  <!-- Curp -->
                  <div class="form-group">
                    <label class="form-control-label">
                      CURP
                    </label>
                    <input type="text" class="form-control" name="curp" id="curp" value="<?= (isset($data_['curp']))?$data_['curp']:''; ?>">
                  </div>
                </div>
              </div>
              
              <div class="card">
                <div class="card-body">
                  <!-- Representante Legal -->
                  <div class="form-group">
                    <label class="form-control-label">
                      Repr. Legal
                    </label>
                    <input type="text" class="form-control" name="r_legal" id="r_legal" value="<?= (isset($data_['repr_legal']))?$data_['repr_legal']:''; ?>">
                  </div>
                   <!-- Representante de los Trabajadores -->
                  <div class="form-group">
                    <label class="form-control-label">
                      Repr. Trabajadores
                    </label>
                    <input type="text" class="form-control" name="repr_trabajadores" id="repr_trabajadores" value="<?= (isset($data_['repr_trabajadores']))?$data_['repr_trabajadores']:''; ?>">
                  </div>
                </div>
              </div>
              
              
              <div class="card">
                <div class="card-body">
                  <!-- Curp -->
                  <div class="form-group">
                    <label class="form-control-label">
                      Nombre
                    </label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="<?= (isset($data_['nombre']))?$data_['nombre']:''; ?>">
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
                        <option value="<?php echo ucwords($curso['id']) ; ?>" class="tex-uppercase" <?= (isset($data_['id_empresa_dirigida']) AND $curso['id']==$data_['id_empresa_dirigida']) ? 'selected' : ''; ?> > 
                          <?php echo mb_strtoupper($curso['empresas']) ; ?>
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
                        <option value="<?php echo ucwords($curso['id']) ; ?>" class="tex-uppercase" <?= (isset($data_['curso']) AND $data_['curso']==$curso['producto'])?'selected':''; ?>> 
                          <?php echo mb_strtoupper($curso['producto']) ; ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>

                  <!-- Área Tematica Curso-->
                  <div class="form-group">
                    <label for="area_tematica_curso" class="form-control-label">Área Temática del Curso</label>
                    (<small>Solo 5 números</small>)
                    <input type="text" name="area_tematica_curso" class="form-control" pattern="[0-9]{1,5}" id="area_tematica_curso" value="<?= (isset($data_['area_tematica_curso']))?$data_['area_tematica_curso']:''; ?>">
                  </div>

                  <!-- Inicio Curso -->
                  <div class="form-group">
                    <label class="form-control-label">
                      Inicio del curso
                    </label>
                    <input type="date" class="form-control" name="inicio_curso" value="<?= (isset($data_['dia_empezo_c']))?$data_['dia_empezo_c']:''; ?>">
                  </div>

                  <!-- Fin Curso -->
                  <div class="form-group">
                    <label class="form-control-label">
                      Fin del curso
                    </label>
                    <input type="date" class="form-control" name="fin_curso" value="<?= (isset($data_['dia_termino_c']))?$data_['dia_termino_c']:''; ?>">
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="customSwitch1" name="diploma" value="1" <?= (isset($data_['diploma_generate']) AND $data_['diploma_generate']==1)?'checked':''; ?>>
                      <label class="custom-control-label" for="customSwitch1">Generar Diploma</label>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="customSwitch2" name="dc3" value="1" <?= (isset($data_['dc3_generate']) AND $data_['dc3_generate']==1)?'checked':''; ?>>
                      <label class="custom-control-label" for="customSwitch2">Generar DC3</label>
                    </div>
                  </div>

                  <!-- Profesor-->
                  <div class="form-group">
                    <label class="form-control-label">
                      Profesor
                    </label>
                    <select class="custom-select" name="profesor">
                      <?php
                        $datos="SELECT * FROM usuario INNER JOIN certificados_instructor ON usuario.id=certificados_instructor.id_user";
                        $usuarios=new Usuarios();
                        $usuarios=$usuarios->sqlquery($datos);
                        foreach ($usuarios as $usuario) {
                      ?>
                        <option value="<?php echo $usuario['id_user']; ?>" class="tex-uppercase">
                          <?php echo mb_strtoupper(openssl_decrypt( $usuario['nombre'],$metodo,$pass)) .' '.strtoupper(openssl_decrypt( $usuario['apellido'],$metodo,$pass)); ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>

                  <!-- la plantilla -->
                  <div class="form-group">
                    <label class="form-control-label">
                      Plantilla
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
                      $empresas=$empresas->sqlquery("SELECT * FROM certificados_lista"); 
                      foreach($empresas as $empresa){
                      ?>
                        <div class="swiper-slide">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="plantilla" id="plantilla<?php echo $i;?>" value="<?php echo $empresa['ruta'];?>" <?= (isset($data_['plantilla']))?'checked':''; ?>>
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

                  <!-- Email -->
                  <div class="form-group">
                    <label class="form-control-label">
                      Email
                    </label>
                    <input type="text" class="form-control" name="email" id="email" value="<?= (isset($data_['email']))?$data_['email']:''; ?>">
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <!-- Divider -->
                  <hr class="mt-5 mb-4">
                  <!-- Buttons -->
                  <div class="text-right">
                    <a href="/" class="btn btn-link text-sm text-muted font-weight-bold">Cancelar</a>
                    <button type="submit" name="crear" class="btn btn-sm btn-primary rounded-pill">Crear</button>
                  </div>
                </div>
              </div>
            </form>

            <?php
            if(isset($_POST['crear'])):
                  
                date_default_timezone_set("America/Mexico_City");
                setlocale(LC_TIME, "spanish");
                
                $data_teacher=[];
                $data_usuario=[];
                $data_curso=[];
                
                $data=[
                    "id_certificado"=>$_POST['id_certificado'],
                    "nombre"=>$_POST['nombre'],
                    "idcurso"=>$_POST['curso'],
                    "fin_curso_string"=>strftime("%d de %B del %Y",strtotime($_POST['fin_curso'])),
                    "id_certificado"=>$_POST['id_certificado'],
                    "profesor"=>$_POST['profesor'],
                    "plantilla"=>$_POST['plantilla'],
                    "email"=>$_POST['email'],
                    "profesor"=>$_POST['profesor'],
                    "r_legal"=>$_POST['r_legal'],
                    "repr_trabajadores"=>$_POST['repr_trabajadores'],
                    "diploma"=>($_POST['diploma']==1)?$_POST['diploma']:0,
                    "dc3"=>($_POST['dc3']==1)?$_POST['dc3']:0,
                    "curp"=>$_POST['curp'],
                    "inicio_curso"=>$_POST['inicio_curso'],
                    "fin_curso"=>$_POST['fin_curso'],
                    "area_tematica_curso"=>$_POST['area_tematica_curso'],
                    "empresa"=>$_POST['empresas'],
                    "plantilla"=>$_POST['plantilla']
                ];

                $curp_cifrado=openssl_encrypt($_POST['curp'],$metodo,$pass);

                $datos_extra_usuario=new Empresas();
                $string="SELECT puesto,ocupacion FROM usuario WHERE curp='$curp_cifrado'";
                $datos_usuario_plus=$datos_extra_usuario->sqlquery($string);
                var_dump($datos_usuario_plus);
                if(COUNT($datos_usuario_plus)==0){
                    $data_usuario['puesto']=$data_['puesto'];
                    $data_usuario['ocupacion']=$data_['ocupacion'];
                }else{
                    foreach($datos_usuario_plus as $datosUusarioPlus){
                        $data_usuario['puesto']=$datosUusarioPlus['puesto'];
                        $data_usuario['ocupacion']=$datosUusarioPlus['ocupacion'];
                    }
                }

                /**sacamos las horas del curso */
                $datos_curso=new Empresas();
                $string="SELECT horas,producto FROM producto WHERE id=$data[idcurso]";
                $datos_curso=$datos_curso->sqlquery($string);

                $data_curso["nombreCurso"]=$datos_curso[0]['producto'];
                $data_curso["horas"]=$datos_curso[0]['horas'];

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


                /**INSERTAMOS DATOS EN LA TABLA */
                
                $fecha=date("Y-m-d");
                
                if(isset($_GET['action']) AND $_GET['action']=='update'){
                    $Myquery="UPDATE `certificados_generados` SET `nombre`='$data[nombre]',`curp`='$data[curp]',`puesto`='$data_usuario[puesto]',`ocupacion`='$data_usuario[ocupacion]',`curso`='$data_curso[nombreCurso]',`dia_empezo_c`= '$data[inicio_curso]',`dia_termino_c`='$data[fin_curso]',`dia_finalizado`= '$data[fin_curso_string]',`horas`='$data_curso[horas]',`area_tematica_curso`='$data[area_tematica_curso]',`profesor`='$data_teacher[nombreMaestro]',`titulo_profesor`='$data_teacher[titulo]',`codSEP`='$data_teacher[idSTPS]',`firma`='$data_teacher[firma]',`email`='$data[email]',`plantilla`='$data[plantilla]',`id_empresa_dirigida`='$data[empresa]',`modify_add`='$fecha',`dc3_generate`=$data[dc3],`diploma_generate`=$data[diploma],`repr_legal`='$data[r_legal]',`repr_trabajadores`='$data[repr_trabajadores]',`id_curso`=$data[idcurso] WHERE `id_certificados`='$data[id_certificado]'";
                }else{
                    $Myquery="INSERT INTO `certificados_generados` (`id_certificados`, `nombre`, `curp`, `puesto`, `ocupacion`, `curso`, `dia_empezo_c`, `dia_termino_c`, `dia_finalizado`, `horas`, `area_tematica_curso`, `profesor`, `titulo_profesor`, `codSEP`, `firma`, `email`, `plantilla`, `id_empresa_dirigida`, `created_add`, `dc3_generate`, `diploma_generate`, `repr_legal`, `repr_trabajadores` , `id_curso`) VALUES ('$data[id_certificado]','$data[nombre]','$data[curp]','$data_usuario[puesto]','$data_usuario[ocupacion]','$data_curso[nombreCurso]','$data[inicio_curso]','$data[fin_curso]','$data[fin_curso_string]','$data_curso[horas]','$data[area_tematica_curso]','$data_teacher[nombreMaestro]','$data_teacher[titulo]','$data_teacher[idSTPS]','$data_teacher[firma]','$data[email]','$data[plantilla]','$data[empresa]','$fecha',$data[dc3],$data[diploma],'$data[r_legal]','$data[repr_trabajadores]',$data[idcurso])";
                }
                
                $insertar_tabla=new Empresas();
                    $resultadoInsertar=$insertar_tabla->sqlquery($Myquery);
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
                        <img style="max-width: 100.0%;" width="172" alt="ARC SOLUCIONES" src="https://www.arcsoluciones.com.mx/assets/media/empresa/'.$datos_WebSite['logo_pestana'].'">
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
                      <small> Aún no te has registrado. <a href="//www.arcsoluciones.com.mx/registrate">Dale</a> </small>
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
                        <a href="https://'.$_SERVER['HTTP_HOST'].'/assets/media/certificados/files_generator/generator.php?id='.$data['id_certificado'].'">Ver mi certificado</a>
                      <br></td>
                      </tr>
                    ';

                    if($data['dc3']==1){
                      $message.='
                        <tr bgcolor="#f7f7f8">
                        <td style="font-weight: 700; color: #333; margin: 0;padding: 12.0px 19.0px;">DC3 :<br></td>
                        <td style="color: rgb(21,35,43);margin: 0;padding: 12.0px 19.0px;">
                          <a href="https://'.$_SERVER['HTTP_HOST'].'/assets/media/certificados/files_generator/generator_ds3.php?id='.$data['id_certificado'].'">Ver mi DC3</a>
                        <br></td>
                        </tr>
                      ';
                    }

                    if($data['diploma']==1){
                      $message.='
                        <tr bgcolor="#f7f7f8">
                        <td style="font-weight: 700; color: #333; margin: 0;padding: 12.0px 19.0px;">Diploma :<br></td>
                        <td style="color: rgb(21,35,43);margin: 0;padding: 12.0px 19.0px;">
                          <a href="https://'.$_SERVER['HTTP_HOST'].'/assets/media/certificados/files_generator/generator_diploma.php?id='.$data['id_certificado'].'">Ver mi Diploma</a>
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
                  
                  
            endif
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
  <!-- Purpose JS -->
  <script src="../../assets/js/purpose.js"></script>
  <!-- Demo JS - remove it when starting your project -->
  <script src="../../assets/js/demo.js"></script>
  <script>
    $(function () {
			$('[data-toggle="popover"]').popover()
		})
  </script>
  <script>
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
  </script>

  <script>
        var btnLike=document.getElementById('curp');

        btnLike.addEventListener("keyup",(e)=>{
            var id=btnLike.value;
            const XHR=new XMLHttpRequest();
            XHR.open('POST','curp.php',true);
            XHR.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            XHR.send("curp="+id);
            
            XHR.onreadystatechange=function(){
              if (this.readyState == 4 && this.status==200) {
                let data_user=JSON.parse(this.responseText);
                console.log(JSON.parse(this.responseText))
                document.getElementById("nombre").value=data_user.nombre+' '+data_user.apellido
                document.getElementById("email").value=data_user.email
              }
            }
        })
  </script>
</body>

</html>