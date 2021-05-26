<?php
    include("../../modelo/bd.php");
    include("../../modelo/info.class.php");
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
  $empresas=new Empresas();
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
  <title><?php  echo "$datos_WebSite[titulo_web_site]".PHP_EOL; ?> - Instructores</title>
  <!-- Favicon -->
    <link rel="icon" href="\assets\media\empresa\<?php  echo "$datos_WebSite[logo_pestana]".PHP_EOL; ?>" type="image/png">
  <!-- Font Awesome 5 -->
  <link rel="stylesheet" href="../../assets/libs/%40fortawesome/fontawesome-pro/css/all.min.css"><!-- Purpose CSS -->
  <link rel="stylesheet" href="../../assets/css/purpose.css">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
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
          <!-- Listing -->
          <div class="card">
            <!-- Card header -->
            <div class="card-header actions-toolbar border-0">
              <div class="row justify-content-between align-items-center">
                <div class="col">
                  <h6 class="d-inline-block mb-0">Mis Empresas</h6>
                  <a href="nuevo-template" class="ml-3">
                    <i class="fas fa-file-certificate"></i> Nuevo Template
                  </a>
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
                    <th scope="col">Foto</th>
                    <th scope="col">Nombre</th>
                    <th scope="col"></th>
                  </tr>
                </thead>

                <tbody>
                      <?php 
                        $empresas=$empresas->sqlquery("SELECT * FROM certificados_lista"); 
                        foreach($empresas as $empresa){
                      ?>
                        <tr>
                          <th scope="row">
                            <div class="avatar-parent-child">
                              <img alt="Image placeholder" src="<?php echo (strlen($empresa['previsualizar'])>2)?"../../../assets/media/certificados/preview/".$empresa['previsualizar']:'../../../assets/media/logo_arc.png' ?>" class="avatar  rounded-circle">
                            </div>
                          </th>
                          <td>
                              <a href="#" class="name h6 mb-0 text-sm text-uppercase">
                                <?php echo $empresa['template']; ?>
                              </a>                  
                          </td>
                          <td class="text-right">
                            <!-- Actions -->
                            <div class="actions ml-3">
                              <a href="/admin-/application/certificados-templates/mis-templates?id=<?php echo  $empresa['id']; ?>" class="action-item text-danger mr-2" data-toggle="tooltip" title="Move to trash">
                                <i class="far fa-trash"></i>
                              </a>
                            </div>
                          </td>
                        </tr>
                      <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                    <th scope="col">Preview</th>
                    <th scope="col">Nombre</th>
                    <th scope="col"></th>
                  </tr>
                </tfoot>
                </table>
            </div>
            <?php
              if(isset($_GET['id'])):
                $string="DELETE FROM certificados_lista WHERE id=$_GET[id]";
                $empresas=new Empresas();
                $empresas=$empresas->sqlquery($string);
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

</html>