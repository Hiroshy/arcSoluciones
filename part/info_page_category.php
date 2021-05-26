<?php
    //Tiempo
    $time_zone=date_default_timezone_set('America/Mexico_City'); 
    $fecha_actual=date('Y-m-d'); 

    $new_site=new Site();
    $interesados=new Interesado();
    $productos=new Productos();
    $categorias=new Categoria();
  
    $registro=[
      "campo"=>"*"
    ];
  
    $datos=$new_site->consultar($registro);

    $info_empresa=[
        "empresa"=>"",
        "lema"=>"",
        "meta_palabra_clave"=>"",
        "titulo_open_graph"=>"",
        "imagen_portada_pagina"=>"",
        "url_web_segura"=>"",
        "idioma"=>"es_MX",
        "llave_encriptacion"=>"",
        "logo"=>"",
        "logo_pestana"=>"",
        "email"=>"",
        "telefono"=>"",
        "direccion"=>""
    ];

    foreach($datos as $dato){
      $info_empresa=[
        "autor"=>"https://invirix.com",
        "empresa"=>$dato['titulo_web_site'],
        "idioma"=>"es_MX",
        "logo"=>$dato['logo'],
        "logo_pestana"=>$dato['logo_pestana'],
        "email"=>$dato['email'],
        "telefono"=>$dato['telefono'],
        "url_direccion"=>'//'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],
        "link_direccion"=>$dato['url_direccion'],
        "direccion"=>$dato['direccion']
      ];

      $info_empresa_meta=[
        "lema"=>$dato['titulo_alternativo'],
        "meta_descripcion"=>$dato['meta_description'],
        "meta_palabra_clave"=>$dato['meta_keywords'],
        "titulo_open_graph"=>$dato['meta_title']
      ];
    }

    if ($_GET) {
        $micategoria=new Categoria();
        $micategoria=$micategoria->sqlquery("SELECT * FROM categoria WHERE slug='$_GET[slug]'");
        foreach ($micategoria as $micate) {
            $info_empresa_meta=[
                "lema"=>$micate['categoria'],
                "meta_descripcion"=>$micate['meta_description'],
                "meta_palabra_clave"=>$micate['meta_keyword'],
                "titulo_open_graph"=>$micate['meta_title']
            ];
        }
    }
    if (!isset($_SESSION['id']) || $_SESSION['id']=="" || $_SESSION['id']==null) {
      $datos_usuario=[
        "id"=>"",
        "nombre"=>"",
        "apellido"=>"",
        "biografia"=>"",
        "curp"=>"",
        "rfc"=>"",
        "empresa"=>"",
        "fecha_nacimiento"=>"",
        "email"=>"",
        "telefono"=>"",
        "nivel"=>""
      ];
    }else{
      $recuperaInfo=new usuarios();
      $recuperaInfo=$recuperaInfo->sqlquery("SELECT * FROM usuario WHERE id=$_SESSION[id]");
      foreach($recuperaInfo as $userloged):
        $datos_usuario=[
          "id"=>$userloged['id'],
          "nombre"=>openssl_decrypt($userloged['nombre'],$metodo,$pass),
          "apellido"=>openssl_decrypt($userloged['apellido'],$metodo,$pass),
          "biografia"=>$userloged['biografia'],
          "curp"=>openssl_decrypt($userloged['curp'],$metodo,$pass),
          "rfc"=>openssl_decrypt($userloged['rfc'],$metodo,$pass),
          "empresa"=>$userloged['empresa'],
          "foto"=>$userloged['foto'],
          "fecha_nacimiento"=>$userloged['fecha_nacimiento'],
          "email"=>openssl_decrypt($userloged['email'],$metodo,$pass),
          "telefono"=>openssl_decrypt($userloged['telefono'],$metodo,$pass),
          "nivel"=>$userloged['nivel']
        ];
      endforeach;
    }
    

  $backend_admin='/admin-/';
?>