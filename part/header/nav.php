<nav id="navbar" class="navbar navbar-expand-lg navbar-light sticky-top w-100">
  <a class="navbar-brand" href="/"> <img loading="lazy" src="\assets\media\empresa\<?php echo  $info_empresa['logo']; ?>" class="img-fluid" width="50" alt=""></a>
  <button id="boton" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarNavDropdown">
    <ul class="navbar-nav ">
      <li class="nav-item active">
        <a class="nav-link" href="/">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/nosotros">Nosotros</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#servicios">Servicio</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="#contacta">Contácto</a>
      </li>
      <li class="nav-item ">
        <?php if(!isset($_SESSION['id'])){?>
          <a class="nav-link" href="#" data-toggle="modal" data-target="#modalLogin"><i class="fas fa-user-circle"></i> &nbsp;Entrar</a>
        <?php }else{?>
          
          <a class="nav-link" href="<?php echo $backend_admin ?>">
            <img loading="lazy" src="<?php echo(strlen($datos_usuario['foto'])>=2)?'/assets/media/usuarios/'.$datos_usuario['foto']:'/assets/media/empresa/'.$info_empresa['logo'];?>" width="50" height="50" class="img-fluid figure-img img-fluid rounded">

            &nbsp;<?php echo $datos_usuario['nombre'];?>
          </a>
         
        <?php }?>
      </li>
    </ul>
  </div>
</nav>


