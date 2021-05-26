<!-- Sidenav -->
<div class="sidenav" id="sidenav-main">
      <!-- Sidenav header -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand mx-0" href="/admin-/">
          <img src="/assets/media/invirix.png" class="navbar-brand-img" alt="invirix">
        </a>
        <div class="">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler sidenav-toggler-dark d-md-none" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line bg-white"></i>
              <i class="sidenav-toggler-line bg-white"></i>
              <i class="sidenav-toggler-line bg-white"></i>
            </div>
          </div>
        </div>
      </div>
      <!-- User mini profile -->
      <div class="sidenav-user d-flex flex-column align-items-center justify-content-between text-center">
        <!-- Avatar -->
        <div>
          <a href="/admin-/application/account/profile" class="avatar rounded-circle avatar-xl">
            <img alt="<?php echo $datos_usuario['nombre'];?> " src="<?php echo(strlen($datos_usuario['foto'])>=2)?'/assets/media/usuarios/'.$datos_usuario['foto']:'/assets/media/empresa/'.$datos_WebSite['logo_pestana'];?>" class="">
          </a>
          <div class="mt-4">
            <h5 class="mb-0 text-white"><?php echo $datos_usuario['nombre'] .' '. $datos_usuario['apellido'];?> </h5>
            <span class="d-block text-sm text-white opacity-8 mb-3"><?php echo $datos_usuario['biografia'];?> </span>
            <?php 
              $url=str_replace('.php','',basename($_SERVER['PHP_SELF']));
              $home_nav=""; 
              $product_nav=""; 
              $category_nav=""; 
              $certificate_nav=""; 
              $bussiness_nav=""; 
              $equipo_nav=""; 
              $instructores_nav=""; 
              $templates_nav=""; 
              $lead_nav=""; 
              $liked_lead="";
              $configWebapp="";

              /** USUARIO */
              $profile_nav="";
              $settings_nav="";

              switch($url){
                case 'index':
                  $home_nav="active";
                break;

                case 'all-product':
                case 'new-product':
                  $product_nav="active";
                break;

                case 'all-category':
                case 'new-category':
                    $category_nav="active";
                    echo "entro";
                break;

                case 'choose':
                case 'new-certificate':
                case 'new-certificate-wholesale':
                  $certificate_nav="active";
                break;

                case 'all-business':
                case 'new-business':
                  $bussiness_nav="active";
                break;
      
                case 'my-team':
                case 'new-user':
                  $equipo_nav="active";
                break;

                case 'instructores':
                case 'datos':
                  $instructores_nav="active";
                break;

                case 'mis-templates':
                case 'nuevo-template':
                  $templates_nav="active";
                break;

                case 'all-lead':
                  $lead_nav="active";
                break;

                case 'liked':
                  $liked_lead="active";
                break;

                case 'configWebapp':
                  $configWebapp="active";
                break;

                case 'profile':
                  $profile_nav="active";
                break;

                case 'settings':
                case 'addresses';
                  $settings_nav="active";
                break;

              }
            ?>
          </div>
        </div>
        <!-- User info -->
        <!-- Actions -->
        <div class="w-100 mt-1 actions d-flex justify-content-between">
          <?php if($datos_usuario['nivel']=='usuario' || $datos_usuario['nivel']=='administrador' || $datos_usuario['nivel']=='colaborador'): ?>
          <a href="/admin-/application/user/profile" class="action-item action-item-lg text-white pl-0">
            <i class="far fa-user"></i>
          </a>
          <?php endif; ?>
          <?php if($datos_usuario['nivel']=='administrador' || $datos_usuario['nivel']=='colaborador'): ?>
          <a href="/admin-/application/user/all-lead" class="action-item action-item-lg text-white">
            <i class="fal fa-grin-stars"></i>
          </a>
          <!--/admin-/application/user/new-certificate-->
          <a href="/admin-/application/account/my-certificate" class="action-item action-item-lg text-white pr-0">
            <i class="far fa-receipt"></i>
          </a>
          <?php endif; ?>
          <?php if($datos_usuario['nivel']=='usuario'): ?>
          <a href="/admin-/application/account/settings" class="action-item action-item-lg text-white pl-0">
            <i class="far fa-cog"></i>
          </a>
          <a href="/part/session/logout" class="action-item action-item-lg text-white pl-0">
            <i class="far fa-sign-out-alt"></i>
          </a>
          <?php endif; ?>
          
        </div>
      </div>
      <!-- Application nav -->
      <div class="nav-application clearfix">
      <?php if($datos_usuario['nivel']=='administrador' || $datos_usuario['nivel']=='colaborador'): ?>
        <a href="/admin-/" class="btn btn-square text-sm <?= ($home_nav=='active')?$home_nav:'' ?>">
          <span class="btn-inner--icon d-block"><i class="far fa-home fa-2x"></i></span>
          <span class="btn-inner--icon d-block pt-2">Inicio</span>
        </a>
        <a href="/admin-/application/product/all-product" class="btn btn-square text-sm <?= ($product_nav=='active')?$product_nav:''; ?>">
          <span class="btn-inner--icon d-block"><i class="far fa-tasks fa-2x"></i></span>
          <span class="btn-inner--icon d-block pt-2">Productos y Servicios</span>
        </a>
        <a href="/admin-/application/category/all-category" class="btn btn-square text-sm <?= ($category_nav=='active')?$category_nav:''; ?>">
          <span class="btn-inner--icon d-block"><i class="far fa-project-diagram fa-2x"></i></span>
          <span class="btn-inner--icon d-block pt-2">Categorias</span>
        </a>
        <!--user/new-certificate-->
        <a href="/admin-/application/certificate/choose" class="btn btn-square text-sm <?= ($certificate_nav=='active')?$certificate_nav:'' ?>">
          <span class="btn-inner--icon d-block"><i class="far fa-receipt fa-2x"></i></span>
          <span class="btn-inner--icon d-block pt-2">Certificados</span>
        </a>
        <a href="/admin-/application/user/all-business" class="btn btn-square text-sm <?= ($bussiness_nav=='active')?$bussiness_nav:'' ?>">
          <span class="btn-inner--icon d-block"><i class="fal fa-users fa-2x"></i></span>
          <span class="btn-inner--icon d-block pt-2">Empresas</span>
        </a>
        <a href="/admin-/application/user/my-team" class="btn btn-square text-sm  <?= ($equipo_nav=='active')?$equipo_nav:'' ?>">
          <span class="btn-inner--icon d-block"><i class="fas fa-user-headset fa-2x"></i></span>
          <span class="btn-inner--icon d-block pt-2">Mi Equipo</span>
        </a>
        <a href="/admin-/application/instructores/instructores" class="btn btn-square text-sm <?= ($instructores_nav=='active')?$instructores_nav:'' ?>">
          <span class="btn-inner--icon d-block"><i class="fas fa-chalkboard-teacher fa-2x"></i></span>
          <span class="btn-inner--icon d-block pt-2">Instructores</span>
        </a>
        <a href="/admin-/application/certificados-templates/mis-templates" class="btn btn-square text-sm  <?= ($templates_nav=='active')?$templates_nav:'' ?>">
          <span class="btn-inner--icon d-block"><i class="fas fa-file-certificate fa-2x"></i></span>
          <span class="btn-inner--icon d-block pt-2">Templates</span>
        </a>
        <a href="/admin-/application/user/all-lead" class="btn btn-square text-sm  <?= ($lead_nav=='active')?$lead_nav:'' ?>">
          <span class="btn-inner--icon d-block"><i class="fal fa-grin-stars fa-2x"></i></span>
          <span class="btn-inner--icon d-block pt-2">Interesados</span>
        </a>
        <a href="/admin-/application/shop/liked" class="btn btn-square text-sm  <?= ($liked_lead=='active')?$liked_lead:'' ?>">
          <span class="btn-inner--icon d-block"><i class="fas fa-heart fa-2x"></i></span>
          <span class="btn-inner--icon d-block pt-2">Favoritos</span>
        </a>
        <a href="/admin-/application/app/configWebapp" class="btn btn-square text-sm <?= ($configWebapp=='active')?$configWebapp:'' ?>">
          <span class="btn-inner--icon d-block"><i class="fab fa-android fa-2x"></i></span>
          <span class="btn-inner--icon d-block pt-2">Web App</span>
        </a>
        <?php endif; ?>

        <?php if($datos_usuario['nivel']=='usuario'): ?>
          <a href="/admin-/application/user/profile" class="btn btn-square text-sm <?= ($profile_nav=='active')?$profile_nav:'' ?>">
            <span class="btn-inner--icon d-block"><i class="far fa-user fa-2x"></i></span>
            <span class="btn-inner--icon d-block pt-2">Mi perfil</span>
          </a>

          <a href="/admin-/application/shop/liked" class="btn btn-square text-sm <?= ($liked_lead=='active')?$liked_lead:'' ?>">
            <span class="btn-inner--icon d-block"><i class="fas fa-heart fa-2x"></i></span>
            <span class="btn-inner--icon d-block pt-2">Favoritos</span>
          </a>

          <a href="/admin-/application/account/settings" class="btn btn-square text-sm <?= ($settings_nav=='active')?$settings_nav:'' ?>">
            <span class="btn-inner--icon d-block"><i class="far fa-cog fa-2x"></i></span>
            <span class="btn-inner--icon d-block pt-2">Editar perfil</span>
          </a>

          <a href="/part/session/logout" class="btn btn-square text-sm">
            <span class="btn-inner--icon d-block"><i class="far fa-sign-out-alt fa-2x"></i></span>
            <span class="btn-inner--icon d-block pt-2">Salir</span>
          </a>

        <?php endif; ?>
      </div>
    </div>