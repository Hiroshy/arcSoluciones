<?php
  include_once("admin-/modelo/bd.php");
  include_once("admin-/modelo/info.class.php");
  include_once("admin-/modelo/interesado.class.php");
  include_once("admin-/modelo/categoria.class.php");
  include_once("admin-/modelo/producto.class.php");
  include_once("admin-/modelo/usuarios.class.php");
  include_once("part/info_page.php");
?>  
<!doctype html>
<html lang="<?=$info_empresa['idioma']?>">
  <head>
    <?php include_once("part/meta.php"); ?>
    <?php include_once("part/css.php"); ?>
    <?php include_once("part/opengraph.php"); ?>
    <?php include_once("part/head-seguimiento.php"); ?>
    <title><?=(strlen($info_empresa_meta['lema'])>0)? strtoupper($info_empresa_meta['lema']) .' | '.strtoupper($info_empresa['empresa']):strtoupper($info_empresa['empresa'])?></title>
  </head>
  <body>
    <?php include_once("part/body-seguimiento.php"); ?>
    <?php include_once("part/header/nav.php"); ?>
    <?php include_once("part/header/carrusel.php"); ?>
    <?php include_once("part/notification.php"); ?>
    <?php include_once("part/categorias.php"); ?>
    <?php include_once("part/servicios.php"); ?>
    <?php include_once("part/productos-principales.php"); ?>
    <?php include_once("part/ubicanos.php"); ?>
    <?php include_once("part/contacto.php"); ?>
    <?php include_once("part/plugin.php"); ?>
    <?php include_once("part/clientes.php"); ?>
    <?php include_once("part/footer.php"); ?>
    <?php include_once("part/js.php"); ?>
    <script>
        var btnLike=Array.from(document.querySelectorAll('.i_liked'));

        for (let index = 0; index < btnLike.length; index++) {
            btnLike[index].addEventListener("click",(e)=>{
                e.preventDefault();
                var id=btnLike[index].id;
                const XHR=new XMLHttpRequest();
                console.log(id)
                XHR.open('POST','/me-gusta.php',true);
                XHR.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                XHR.send("idProduct="+id);
                
                XHR.onreadystatechange=function(){
                    if (this.readyState == 4 && this.status==200) {
                        <?php if (!isset($_SESSION['id']) || $_SESSION['id']=="" || $_SESSION['id']==null) { ?>
                            location.href="/iniciar-sesion?INVIRIX&token="+"<?php echo md5(rand(0,10)) ?>"+"&ENCRYPTED=256";
                        <?php }else{ ?>
                            console.log(this.responseText);
                            btnLike[index].classList.toggle('text-danger');
                        <?php } ?>
                    }
                }
            })
        }
    </script>
  </body>
</html>
    
</body>
</html>