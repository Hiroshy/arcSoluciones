<nav class="tool_access">
    <ul class="">
        <li class="cuadrado__tool">
            <a href="#contacta" class="fa-1_5 color_link helper__menu"><i class="far fa-comment-alt"></i></a>
        </li>
        <li class="cuadrado__tool">
            <a href="//www.facebook.com/ArcSolucionesMx" target="_blank" class="fa-1_5 color_link helper__menu"><i class="far fa-thumbs-up"></i></a>
        </li>
        <li class="cuadrado__tool">
            <a href="//www.instagram.com/arc_soluciones/?r=nametag" target="_blank" class="fa-1_5 color_link helper__menu"> <i class="fab fa-instagram"></i></a>
        </li>
        
        <li class="cuadrado__tool">
          <button id="go_back" class="fa-1_5 color_link helper__menu">
            <i class="fas fa-chevron-left"></i>
          </button>
        </li>
    </ul>
</nav>

<!-- Modal Login -->
<div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title text-titulo fa-2x" id="exampleModalLabel">ARC | <small>"Tu seguridad, nuestro bienestar"</small> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
            <div class="form__group field w-100">
                <input type="email" class="form__field text-dark" placeholder="email" name="email" id='email' required />
                <label for="email" class="form__label">email</label>
            </div>

            <div class="form__group field w-100">
                <input type="password" class="form__field text-dark" placeholder="password" name="password" id='password' required />
                <label for="password" class="form__label">password</label>
            </div>
      </div>
      <div class="modal-footer">
          <!--<button type="submit" class="btn btn-dark btn-lg btn-block <?php echo $backend_admin ?>">Entrar</button>-->
          <button type="submit" name="login" class="btn btn-dark btn-lg btn-block">Comencemos</button>
      </div>
      </form>

      <div class="modal-footer text-dark">
        <div class="col-6 text-center">
            <a href="/recupera-clave" class="text-dark "> Olvidé mi contraseña</a>
        </div>
        <div class="col-6 text-center">
            <a href="/registrate" class="text-dark "> ¿Nuevo aqui? Regístrate </a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  if(isset($_POST['login'])):
    $email=openssl_encrypt($_POST['email'],$metodo,$pass);
    $pass=openssl_encrypt($_POST['password'],$metodo,$pass);
    $login_=new usuarios();
    $login_=$login_->sqlquery("SELECT * FROM usuario WHERE email='$email' AND clave='$pass' ");
    if ($login_) {
      foreach($login_ as $userloged):
        $datos_usuario=[
          "id"=>$userloged['id'],
          "nombre"=>$userloged['nombre'],
          "apellido"=>$userloged['apellido'],
          "biografia"=>$userloged['biografia'],
          "curp"=>$userloged['curp'],
          "rfc"=>$userloged['rfc'],
          "empresa"=>$userloged['empresa'],
          "fecha_nacimiento"=>$userloged['fecha_nacimiento'],
          "email"=>$userloged['email'],
          "telefono"=>$userloged['telefono'],
          "nivel"=>$userloged['nivel']
        ];
        $_SESSION['id']=$datos_usuario['id'];
        $_SESSION['email']=$datos_usuario['email'];
        $_SESSION['nivel']=$datos_usuario['nivel'];
        echo '<script> location.href="/"</script>';
      endforeach;
    }else{ 
      echo '<script> location.href="/iniciar-sesion?INVIRIX&token='.md5(rand(0,10)).'&ENCRYPTED=256&trace=error&email='.$email.'"</script>';
    }
  endif
?>



<!-- modal Policy -->
<!-- Modal -->
<div class="modal fade" id="policy" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Politicas de Privacidad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Acepto</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="termsCondition" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Términos y Condiciones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Acepto</button>
      </div>
    </div>
  </div>
</div>