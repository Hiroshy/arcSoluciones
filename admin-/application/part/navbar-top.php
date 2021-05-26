<nav class="navbar navbar-main navbar-expand-lg navbar-dark navbar-border" id="navbar-main">
  <?php if($datos_usuario['nivel']=='administrador' || $datos_usuario['nivel']=='colaborador'):?>
        <div class="container-fluid">
          <!-- Brand + Toggler (for mobile devices) -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-main-collapse" aria-controls="navbar-main-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <!-- User's navbar  -->
          <div class="navbar-user d-lg-none ml-auto">
            <ul class="navbar-nav flex-row align-items-center">
              <li class="nav-item">
                <a href="#" class="nav-link nav-link-icon sidenav-toggler" data-action="sidenav-pin" data-target="#sidenav-main"><i class="far fa-bars"></i></a>
              </li>
              <li id="drpdown" class="nav-item dropdown dropdown-animate">
                <a class="nav-link pr-lg-0" href="/admin-/" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="<?php echo $datos_usuario['nombre'];?> " src="<?php echo(strlen($datos_usuario['foto'])>=2)?'/assets/media/usuarios/'.$datos_usuario['foto']:'/assets/media/empresa/'.$datos_WebSite['logo_pestana'];?>">
                  </span>
                </a>
                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right dropdown-menu-arrow">
                  <h6 class="dropdown-header px-0">Hi, <?php echo $datos_usuario['nombre'];?>!</h6>
                  <a href="/admin-/application/user/profile" class="dropdown-item">
                    <i class="far fa-user"></i>
                    <span>Mi Perfil</span>
                  </a>
                  <a href="/admin-/application/account/settings" class="dropdown-item">
                    <i class="far fa-cog"></i>
                    <span>Configurar</span>
                  </a>  
                  <div class="dropdown-divider"></div>
                  <a href="/part/session/logout" class="dropdown-item">
                    <i class="far fa-sign-out-alt"></i>
                    <span>Salir</span>
                  </a>
                </div>
              </li>
            </ul>
          </div>
          <!-- Navbar nav -->
          <div class="collapse navbar-collapse navbar-collapse-fade" id="navbar-main-collapse">
            <ul class="navbar-nav align-items-lg-center">
              <li class="border-top opacity-2 my-2"></li>
              <!-- Home  -->
              <li class="nav-item ">
                <a class="nav-link pl-lg-0" href="/admin-/">
                  Home
                </a>
              </li>
              <!-- Application menu -->
              <li class="nav-item dropdown dropdown-animate" data-toggle="hover">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Cuenta
                </a>
                <div class="dropdown-menu dropdown-menu-arrow p-lg-0">
                  <!-- Top dropdown menu -->
                  <div class="p-lg-4">
                    <div class="dropdown dropdown-animate dropdown-submenu" data-toggle="hover">
                      <a href="#" class="dropdown-item dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Perfil
                      </a>
                      <div class="dropdown-menu"><a class="dropdown-item" href="/admin-/application/account/settings">
                          Configurar
                        </a>
                        <a class="dropdown-item" href="/admin-/application/account/addresses">
                          Dirección
                        </a>
                        <a class="dropdown-item" href="/admin-/application/account/my-certificate">
                          Mis Certificados
                        </a>  
                      </div>
                    </div>
                    <div class="dropdown dropdown-animate dropdown-submenu" data-toggle="hover">
                      <a href="#" class="dropdown-item dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Usuarios
                      </a>
                      <div class="dropdown-menu"><a class="dropdown-item" href="/admin-/application/user/new-user">
                          Crear usuario
                        </a>
                      </div>
                    </div>
                    <div class="dropdown dropdown-animate dropdown-submenu" data-toggle="hover">
                      <a href="#" class="dropdown-item dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Servicios
                      </a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="/admin-/application/product/new-product">
                          Crear producto
                        </a>
                        <a class="dropdown-item" href="/admin-/application/category/new-category">
                          Crear categoria
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/">
                  Tienda
                </a>
              </li>
              <li class="nav-item dropdown dropdown-animate" data-toggle="hover">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Certificados</a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg dropdown-menu-arrow p-0">
                  <ul class="list-group list-group-flush">
                    <li>
                      <!--/admin-/application/user/new-certificate-->
                      <a href="/admin-/application/certificate/new-certificate" class="list-group-item list-group-item-action" role="button">
                        <div class="media d-flex align-items-center">
                          <!-- SVG icon -->
                          <figure style="width: 50px;">
                            <img alt="Image placeholder" src="/admin-/assets/img/icons/essential/detailed/DOC_File.svg" class="svg-inject img-fluid" style="height: 50px;">
                          </figure>
                          <!-- Media body -->
                          <div class="media-body ml-3">
                            <h6 class="mb-1">Generar certificado</h6>
                            <p class="mb-0">Generar certificados por usuario</p>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="/admin-/application/certificate/new-certificate-wholesale" class="list-group-item list-group-item-action" role="button">
                        <div class="media d-flex align-items-center">
                          <!-- SVG icon -->
                          <figure style="width: 50px;">
                            <img alt="Image placeholder" src="/admin-/assets/img/icons/essential/detailed/Mobile_UI.svg" class="svg-inject img-fluid" style="height: 50px;">
                          </figure>
                          <!-- Media body -->
                          <div class="media-body ml-3">
                            <h6 class="mb-1">Generar certificados por volumen</h6>
                            <p class="mb-0">Carga un archivo csv para generarlos</p>
                          </div>
                        </div>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
            <!-- Right menu -->
            <ul class="navbar-nav ml-lg-auto align-items-center d-none d-lg-flex">
              <li class="nav-item">
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input session_storage" id="switch">
                  <label class="custom-control-label" for="switch"></label>
                </div>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link nav-link-icon sidenav-toggler" data-action="sidenav-pin" data-target="#sidenav-main"><i class="far fa-bars"></i></a>
              </li>
              <li class="nav-item dropdown dropdown-animate">
                <a class="nav-link pr-lg-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="media media-pill align-items-center">
                    <span class="avatar rounded-circle">
                      <img alt="<?php echo $datos_usuario['nombre'];?> " src="<?php echo(strlen($datos_usuario['foto'])>=2)?'/assets/media/usuarios/'.$datos_usuario['foto']:'/assets/media/empresa/'.$datos_WebSite['logo_pestana'];?>">
                    </span>
                    <div class="ml-2 d-none d-lg-block">
                      <span class="mb-0 text-sm  font-weight-bold"><?php echo $datos_usuario['nombre'];?></span>
                    </div>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right dropdown-menu-arrow">
                  <h6 class="dropdown-header px-0">Hello, <?php echo $datos_usuario['nombre'];?> !</h6>
                  <a href="/admin-/application/user/profile" class="dropdown-item">
                    <i class="far fa-user"></i>
                    <span>Mi Perfil</span>
                  </a>
                  <a href="/admin-/application/account/settings" class="dropdown-item">
                    <i class="far fa-cog"></i>
                    <span>Configurar</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="/part/session/logout" class="dropdown-item">
                    <i class="far fa-sign-out-alt"></i>
                    <span>Salir</span>
                  </a>
                </div>
              </li>
            </ul>
          </div>
        </div>
  <?php endif; ?>


  <?php if($datos_usuario['nivel']=='usuario'): ?>
        <div class="container-fluid">
          <!-- Brand + Toggler (for mobile devices) -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-main-collapse" aria-controls="navbar-main-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <!-- User's navbar  -->
          <div class="navbar-user d-lg-none ml-auto">
            <ul class="navbar-nav flex-row align-items-center">
              <li class="nav-item">
                <a href="#" class="nav-link nav-link-icon sidenav-toggler" data-action="sidenav-pin" data-target="#sidenav-main"><i class="far fa-bars"></i></a>
              </li>
              <li class="nav-item dropdown dropdown-animate">
                <a class="nav-link pr-lg-0" href="/admin-/" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="<?php echo $datos_usuario['nombre'];?> " src="<?php echo(strlen($datos_usuario['foto'])>=2)?'/assets/media/usuarios/'.$datos_usuario['foto']:'/assets/media/empresa/'.$datos_WebSite['logo_pestana'];?>">
                  </span>
                </a>
                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right dropdown-menu-arrow">
                  <h6 class="dropdown-header px-0">Hi, <?php echo $datos_usuario['nombre'];?>!</h6>
                  <a href="/admin-/application/user/profile" class="dropdown-item">
                    <i class="far fa-user"></i>
                    <span>Mi Perfil</span>
                  </a>
                  <a href="/admin-/application/account/settings" class="dropdown-item">
                    <i class="far fa-cog"></i>
                    <span>Configurar</span>
                  </a>  
                  <div class="dropdown-divider"></div>
                  <a href="authentication/login" class="dropdown-item">
                    <i class="far fa-sign-out-alt"></i>
                    <span>Salir</span>
                  </a>
                </div>
              </li>
            </ul>
          </div>
          <!-- Navbar nav -->
          <div class="collapse navbar-collapse navbar-collapse-fade" id="navbar-main-collapse">
            <ul class="navbar-nav align-items-lg-center">
              <li class="border-top opacity-2 my-2"></li>
              <!-- Home  -->
              <li class="nav-item ">
                <a class="nav-link pl-lg-0" href="/admin-/">
                  Home
                </a>
              </li>
              <!-- Application menu -->
              <li class="nav-item dropdown dropdown-animate" data-toggle="hover">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Cuenta
                </a>
                <div class="dropdown-menu dropdown-menu-arrow p-lg-0">
                  <!-- Top dropdown menu -->
                  <div class="p-lg-4">
                    <div class="dropdown dropdown-animate dropdown-submenu" data-toggle="hover">
                      <a href="#" class="dropdown-item dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Perfil
                      </a>
                      <div class="dropdown-menu"><a class="dropdown-item" href="/admin-/application/account/settings">
                          Configurar
                        </a>
                        <a class="dropdown-item" href="/admin-/application/account/addresses">
                          Dirección
                        </a>
                        <a class="dropdown-item" href="/admin-/application/account/my-certificate">
                          Mis Certificados
                        </a>  
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/">
                  Tienda
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/#servicios">
                  Servicios
                </a>
              </li>
            </ul><!-- Right menu -->
            <ul class="navbar-nav ml-lg-auto align-items-center d-none d-lg-flex">
              <li class="nav-item">
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" id="switch">
                  <label class="custom-control-label" for="switch"></label>
                </div>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link nav-link-icon sidenav-toggler" data-action="sidenav-pin" data-target="#sidenav-main"><i class="far fa-bars"></i></a>
              </li>
              <li class="nav-item dropdown dropdown-animate">
                <a class="nav-link pr-lg-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="media media-pill align-items-center">
                    <span class="avatar rounded-circle">
                      <img alt="<?php echo $datos_usuario['nombre'];?> " src="<?php echo(strlen($datos_usuario['foto'])>=2)?'/assets/media/usuarios/'.$datos_usuario['foto']:'/assets/media/empresa/'.$datos_WebSite['logo_pestana'];?>">
                    </span>
                    <div class="ml-2 d-none d-lg-block">
                      <span class="mb-0 text-sm  font-weight-bold"><?php echo $datos_usuario['nombre'];?></span>
                    </div>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right dropdown-menu-arrow">
                  <h6 class="dropdown-header px-0">Hello, <?php echo $datos_usuario['nombre'];?> !</h6>
                  <a href="/admin-/application/user/profile" class="dropdown-item">
                    <i class="far fa-user"></i>
                    <span>Mi Perfil</span>
                  </a>
                  <a href="/admin-/application/account/settings" class="dropdown-item">
                    <i class="far fa-cog"></i>
                    <span>Settings</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="/part/session/logout" class="dropdown-item">
                    <i class="far fa-sign-out-alt"></i>
                    <span>Salir</span>
                  </a>
                </div>
              </li>
            </ul>
          </div>
        </div>
  <?php endif; ?>

</nav>