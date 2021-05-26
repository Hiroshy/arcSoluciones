<?php
    include("../../modelo/bd.php");
    include("../../modelo/info.class.php");
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
  <title><?php  echo "$datos_WebSite[titulo_web_site]".PHP_EOL; ?> - Bandeja de Mensajes</title>
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
         <!-- Listing -->
        <div class="card">
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
                <h6 class="d-inline-block mb-0">Mis Interesados</h6>
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
                  <th scope="col">Nombre</th>
                  <th scope="col">Servicio</th>
                  <th scope="col">Teléfono</th>
                  <th scope="col">Mensaje</th>
                  <th scope="col">Detalle Carro</th>
                  <th scope="col">Marca</th>
                  <th scope="col">Modelo</th>
                  <th scope="col">Serie</th>
                  <th scope="col">Placa</th>
                  <th scope="col">Fecha Nacimiento</th>
                  <th scope="col">Código Postal</th>
                  <th scope="col"></th>
                </tr>
              </thead> 
              <tbody>
                <?php
                  $interesados=$new_site->sqlquery("SELECT * FROM interesados ORDER BY id DESC");
                  foreach($interesados as $interesado):
                ?>
                <tr>
                  <th scope="row" class="pd-auto">
                    <strong><?php echo $interesado['nombre'].' '.$interesado['apellido']; ?></strong>
                  </th>
                  <td>
                    <?php echo $interesado['servicio'];?>
                  </td>
                  <td>
                    <?php echo $interesado['telefono'];?>
                  </td>
                  <td>
                    <?php echo $interesado['mensaje'];?>
                  </td>
                  <td>
                    <?php echo $interesado['detalle_carro'];?>
                  </td>
                  <td>
                    <?php echo $interesado['marca_vehiculo'];?>
                  </td>
                  <td>
                    <?php echo $interesado['modelo'];?>
                  </td>
                  <td>
                    <?php echo $interesado['serie'];?>
                  </td>
                  <td>
                    <?php echo $interesado['placa'];?>
                  </td>
                  <td>
                    <?php echo ($interesado['fecha_nacimiento']=='0000-00-00')?'':$interesado['fecha_nacimiento'];?>
                  </td>
                  <td>
                    <?php echo $interesado['cp'];?>
                  </td>
                  <td class="text-right">
                    <!-- Actions -->
                    <div class="actions ml-3">
                      <a href="/admin-/application/user/all-lead?id=<?php echo $interesado['id'];?>" class="action-item text-danger mr-2" data-toggle="tooltip" title="Move to trash">
                        <i class="far fa-trash"></i>
                      </a>
                    </div>
                  </td>
                </tr>
                <?php
                endforeach;
                ?>
                <tr>
                    <td colspan="7" class="text-center">

                    </td>
                </tr>
              </tbody>
            </table>

            <?php
                if(isset($_GET['id'])){
                    $productos=$new_site->sqlquery("DELETE FROM `interesados` WHERE id=$_GET[id]");
                    echo '<script>location.href="/admin-/application/user/all-lead"</script>';
                }
            ?>
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