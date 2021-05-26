<?php
  include_once("admin-/modelo/bd.php");
  include_once("admin-/modelo/info.class.php");
  include_once("admin-/modelo/interesado.class.php");
  include_once("admin-/modelo/categoria.class.php");
  include_once("admin-/modelo/producto.class.php");
  include_once("admin-/modelo/usuarios.class.php");
  include_once("./part/info_page.php");
?> 
<!doctype html>
<html lang="<?=$info_empresa['idioma']?>">
  <head>
    <?php include_once("./part/meta.php"); ?>
    <?php include_once("./part/css.php"); ?>
    <?php include_once("./part/opengraph.php"); ?>
    <?php include_once("./part/head-seguimiento.php"); ?>
    <title><?=(strlen($info_empresa_meta['lema'])>0)? strtoupper($info_empresa_meta['lema']) .' | '.strtoupper($info_empresa['empresa']):strtoupper($info_empresa['empresa'])?></title>
  </head>
  <body>
    <?php include_once("./part/body-seguimiento.php"); ?>
    <?php include_once("./part/header/nav.php"); ?>
    <div class="container-fluid py-5 bg-light">
      <div class="container py-5">
        <div class="dflex justify-content-center align-items-center text-center">
            <p class="w-200px text-dark mb-0 text-titulo">
                <span class="h1 display-1">ARC</span> 
                <span class="text-parrafo h2">SOLUCIONES</span>
            </p>
        </div>
      </div>
    </div>
    <div class="container pt-5">
      <div class="row pt-5">
        <div class="col-md-6 ">
          <p class="text-parrafo text-justify">
            Siempre caracterizado por la lealtad, esfuerzo y dedicación, con el compromiso de mantener su confianza en nosotros, brindándoles las mejores herramientas de información y causar un impacto de concientización. ARC Soluciones nace a raíz de un empujón para tomar el camino independiente, gracias a esto fue posible dar dirección y enfoque a nuestros clientes y a sus objetivos para seguir brindando el servicio adecuado a sus necesidades.      
          </p>
        </div>
        <div class="col-md-6">
          <p class="text-parrafo text-justify">
            El 7 de julio del 2017 ARC soluciones se consolida como empresa dedicada al asesoramiento y venta de seguros, preocupada por la tranquilidad, prevención y reducción de accidentes viales. Comprometido con la sociedad y con los clientes brindándoles herramientas que contribuyan al desarrollo de las empresas y usuarios. En conjunto nuestra experiencia, alianzas y colaboradores nos permiten generar sinergia enfocada a su tranquilidad y a dar soluciones ante probables eventualidades.
          </p>
        </div>
      </div>
    </div>
    <?php include_once("./part/palabra-.php"); ?>
    <div class="container-fluid h-500 fondo_about">

    </div>
    <?php include_once("./part/servicios.php"); ?>
    <?php include_once("./part/contacto.php"); ?>
    <?php include_once("./part/plugin.php"); ?>
    <?php include_once("./part/clientes.php"); ?>
    <?php include_once("./part/footer.php"); ?>
    <?php include_once("./part/js.php"); ?>
  </body>
</html>
    
</body>
</html>
<?php
    // echo bin2hex("ARC SOLUCIONES");

    // echo "==================================";

    // $palabra="ARC SOLUCIONES";
    // $pass="123";
    // $metodo="aes256";

    // $encriptado=openssl_encrypt($palabra,$metodo,$pass);

    // echo "Texto encriptado en AES 256 : ".$encriptado."<br/>";

    // echo "Texto desencriptado en AES 256 : ".openssl_decrypt($encriptado,$metodo,$pass)."<br/>";

    // echo "INVRX-".rand(0,9999);