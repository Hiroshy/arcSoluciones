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
  <title><?php  echo "$datos_WebSite[titulo_web_site]".PHP_EOL; ?> - Certificados</title>
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
        <!-- Page title -->
        <div class="page-title">
          
        
        <!-- Stats -->
        <div class="row">
          <!-- Page title -->
<div class="page-title">
          <div class="row justify-content-between align-items-center mb-5">
            <div class="col-12 mb-3 mb-md-0">
              <h5 class="h3 font-weight-400 mb-0 text-white">ARC , CERTIFICADOS !</h5>
            </div>
          </div>
        
        
        </div>
         <!-- Listing -->
        <div class="card container-fluid">
          <!-- Card header -->
          <div class="card-header actions-toolbar border-0">
            <div class="actions-search" id="actions-search">
              <div class="input-group input-group-merge input-group-flush">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-transparent"><i class="far fa-search"></i></span>
                </div>
                <input type="text" class="form-control form-control-flush" id="searchTerm" type="text" onkeyup="doSearch()" placeholder="Type and hit enter ...">
                <div class="input-group-append">
                  <a href="#" class="input-group-text bg-transparent" data-action="search-close" data-target="#actions-search"><i class="far fa-times"></i></a>
                </div>
              </div>
            </div>
            <div class="row justify-content-between align-items-center">
              <div class="col">
                <h6 class="d-inline-block mb-0">Mis Certificados</h6>
              </div>
              <div class="col text-right">
                <div class="actions" >
                    <a href="#" class="action-item mr-3" data-action="search-open" data-target="#actions-search">
                        <i class="far fa-search"></i>
                    </a>
                </div>
              </div>
            </div>
          </div>
          <!-- Table -->
          <div class="table-responsive">
            <table id="datos" class="table align-items-center sortable">
              <thead>
                <tr>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col">Certificado</th>
                  <th scope="col">Profesor</th>
                  <th scope="col">Finalizó el</th>
                  <th scope="col">horas </th>
                </tr>
              </thead>
              <tbody>
              <?php
              $datos='SELECT * FROM certificados_generados WHERE email="'.openssl_decrypt($_SESSION['email'],$metodo,$pass).'"';
              $usuarios=new Usuarios();
              $usuarios=$usuarios->sqlquery($datos);
              foreach ($usuarios as $usuario) {
              ?>
                <tr>
                  <th scope="row" class="text-center">
                        <a target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Certificado" href="/assets/media/certificados/files_generator/generator.php?id=<?php echo $usuario['id_certificados']; ?>" class="fa-2x text-dark">
                          <i class="fas fa-file-certificate"></i>
                        </a>
                  </th>
                  <!--<th scope="row" class="text-center">
                        <a target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="DS3" href="/assets/media/certificados/files_generator/generator_ds3.php?id=<?php echo $usuario['id_certificados']; ?>" class="fa-2x text-dark">
                          <strong>DC3</strong>
                        </a>
                  </th>-->
                  <th scope="row" class="text-center">
                        
                        <?php 
                          if($usuario['diploma']<>1){
                        ?>
                          sin diploma
                        <?php 
                          }else{
                        ?>
                          <a target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Diploma" href="/assets/media/certificados/files_generator/generator_diploma.php?id=<?php echo $usuario['id_certificados']; ?>" class="fa-2x text-dark">
                            <i class="far fa-file-certificate"></i>
                          </a>
                        <?php 
                          }
                        ?>
                  </th>
                  <td>
                      <a href="/assets/media/certificados/files_generator/generator.php?id=<?php echo $usuario['id_certificados']; ?>" class="name h6 mb-0 text-sm text-uppercase"><?= $usuario['curso']; ?></a>
                      <small class="d-block font-weight-bold">#<?= $usuario['id_certificados']; ?></small>
                  </td>
                  <td>
                    <?= $usuario['profesor']; ?>
                  </td>
                  <td>
                    <?= $usuario['dia_finalizado']; ?>
                  </td>
                  <td>
                    <?= $usuario['horas']; ?>
                  </td>
                </tr>
                <?php
                }
                ?>
                <tr>
                    <td colspan="7" class="text-center">

                    </td>
                </tr>
              </tbody>
            </table>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <script src="../../assets/js/purpose.core.js"></script>
  <!-- Page JS -->
  <script src="../../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <!-- Purpose JS -->
  <script src="../../assets/js/purpose.js"></script>
  <!-- Demo JS - remove it when starting your project -->
  <script src="../../assets/js/demo.js"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
    <script>
         function doSearch()
        {
            const tableReg = document.getElementById('datos');
            const searchText = document.getElementById('searchTerm').value.toLowerCase();
            let total = 0;
 
            // Recorremos todas las filas con contenido de la tabla
            for (let i = 1; i < tableReg.rows.length; i++) {
                // Si el td tiene la clase "noSearch" no se busca en su cntenido
                if (tableReg.rows[i].classList.contains("noSearch")) {
                    continue;
                }
 
                let found = false;
                const cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
                // Recorremos todas las celdas
                for (let j = 0; j < cellsOfRow.length && !found; j++) {
                    const compareWith = cellsOfRow[j].innerHTML.toLowerCase();
                    // Buscamos el texto en el contenido de la celda
                    if (searchText.length == 0 || compareWith.indexOf(searchText) > -1) {
                        found = true;
                        total++;
                    }
                }
                if (found) {
                    tableReg.rows[i].style.display = '';
                } else {
                    // si no ha encontrado ninguna coincidencia, esconde la
                    // fila de la tabla
                    tableReg.rows[i].style.display = 'none';
                }
            }
 
            // mostramos las coincidencias
            const lastTR=tableReg.rows[tableReg.rows.length-1];
            const td=lastTR.querySelector("td");
            lastTR.classList.remove("hide", "red");
            if (searchText == "") {
                lastTR.classList.add("hide");
            } else if (total) {
                td.innerHTML="Se ha encontrado "+total+" coincidencia"+((total>1)?"s":"");
            } else {
                lastTR.classList.add("red");
                td.innerHTML="No se han encontrado coincidencias";
            }
        }
    </script>
    <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
  </body>

</html>