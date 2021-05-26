<?php
    include("../../modelo/bd.php");
    include("../../modelo/info.class.php");
    include("../../modelo/categoria.class.php");
    include("../../modelo/producto.class.php");
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

    /***Categorias-- */
    $categorias=new Categoria();
    
    /***Productos-- */
    $productos=new Productos();
  
    /***Interesado-- */
    $interesados=new Interesado();
?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?php echo "$datos_WebSite[meta_description]".PHP_EOL;?>">
  <meta name="author" content="<?php  echo "$datos_WebSite[autor]".PHP_EOL; ?>">
  <title><?php  echo "$datos_WebSite[titulo_web_site]".PHP_EOL; ?> - Productos</title>
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
          <div class="col-lg-4">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h6 class="text-muted mb-1">Productos</h6>
                    <span class="h5 font-weight-bold mb-0">
                      <?php
                        $productos_result=$new_site->sqlquery("SELECT count(*) as producto FROM `producto`");
                        echo $productos_result[0]['producto']
                      ?>
                    </span>
                  </div>
                  <div class="col-auto">
                    <div class="icon bg-gradient-warning text-white rounded-circle icon-shape">
                      <i class="far fa-users"></i>
                    </div>
                  </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                  <span class="badge badge-soft-success mr-2"><i class="far fa-users"></i></span>
                  <span class="text-nowrap">en total</span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h6 class="text-muted mb-1">Categorias</h6>
                    <span class="h5 font-weight-bold mb-0">
                      <?php
                        $usuarios_count=$new_site->sqlquery("SELECT count(*) as categoria FROM `categoria`");
                        echo $usuarios_count[0]['categoria']
                      ?>
                    </span>
                  </div>
                  <div class="col-auto">
                    <div class="icon bg-gradient-primary text-white rounded-circle icon-shape">
                      <i class="fal fa-grin-stars fa-2x"></i>
                    </div>
                  </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                  <span class="badge badge-soft-warning mr-2">
                    <i class="fal fa-grin-stars"></i>
                  </span>
                  <span class="text-nowrap">Mis categorias</span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h6 class="text-muted mb-1">Interesados</h6>
                    <span class="h5 font-weight-bold mb-0">
                      <?php
                        $interesados=$interesados->sqlquery("SELECT count(*) as interesados FROM `interesados`");
                        echo $interesados[0]['interesados']
                      ?>
                    </span>
                  </div>
                  <div class="col-auto">
                    <div class="icon bg-gradient-danger text-white rounded-circle icon-shape">
                      <i class="fas fa-user-headset"></i>
                    </div>
                  </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                  <span class="badge badge-soft-danger mr-2"><i class="fas fa-user-headset"></i></span>
                  <span class="text-nowrap">Tu próximo cliente, puede estar aquí</span>
                </p>
              </div>
            </div>
          </div>
        </div>
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
                <h6 class="d-inline-block mb-0">Mis Productos</h6>
              </div>
              <div class="col text-right">
                <div class="actions" >
                    <a href="#" class="action-item mr-3" data-action="search-open" data-target="#actions-search">
                        <i class="far fa-search"></i>
                    </a>
                    <div class="dropdown mr-3">
                      <a href="#" class="action-item" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <a href="/admin-/application/product/new-product" class="action-item mr-3"><i class="fas fa-plus-square"></i></a>
                      </a>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Table -->
          <div class="table-responsive">
            <table id="datos" class="table align-items-center sortable">
              <thead>
                <tr>
                  <th scope="col">Foto</th>
                  <th scope="col">Producto</th>
                  <th scope="col">Meta Keyword</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $productos=$productos->consultar($registro);
                  
                foreach ($productos as $producto) {
                ?>
                <tr>
                  <th scope="row" class="pd-auto">
                        <div class="avatar-parent-child">
                        <img alt="<?php echo $producto['producto']?>" src="<?php echo (strlen($producto['foto'])>1)?"../../../assets/media/producto/".json_decode(base64_decode($producto['foto']))[0]:'../../../assets/media/logo_arc.png' ?>" class="avatar img-fluid rounded-circle">
                          <span class="avatar-child avatar-badge bg-success"></span>
                        </div>
                  </th>
                  <td>
                    <a href="./new-product?id=<?php echo $producto['id'];?>" class="name h6 mb-0 text-sm" style="display:block; width:100%;"><?php echo $producto['producto']?></a>
                    <small class="d-block font-weight-bold" style="display:block; width:100%;"></small>
                  </td>
                  <td>
                    <div style="max-width: 100px;">
                      <?php echo $producto['meta_keyword']?>                    
                    </div>
                  </td>
                  <td class="text-right">
                    <!-- Actions -->
                    <div class="actions ml-3">
                      <a href="./new-product?id=<?php echo $producto['id'];?>" class="action-item mr-2" data-toggle="tooltip" title="Edit">
                        <i class="far fa-pencil-alt"></i>
                      </a>
                      <a href="/admin-/application/product/all-product?id=<?php echo $producto['id'] ;?>" class="action-item text-danger mr-2" data-toggle="tooltip" title="Move to trash">
                        <i class="far fa-trash"></i>
                      </a>
                    </div>
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
      <?php
                if(isset($_GET['id'])){
                    $registro=[
                        'where'=>'id',
                        'id'=>$_GET['id']
                    ];
                    $productos=new Productos();
                    $productos->eliminar($registro);
                    echo '<script>location.href="/admin-/application/product/all-product"</script>';
                }
            ?>
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