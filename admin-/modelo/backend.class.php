<?php
      /***Usuarios-- */
  $usuarios=new usuarios();

  $datos=[
    "campo"=>"*"
  ];

  $usuarios=$usuarios->consultar($datos);

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
      "nivel"=>"",
      "ocupacion"=>$userloged['ocupacion'],
      "puesto"=>$userloged['puesto']
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
        "nivel"=>$userloged['nivel'],
        "ocupacion"=>$userloged['ocupacion'],
        "puesto"=>$userloged['puesto']
      ];

      $redes_sociales=[
        "facebook"=>$userloged['facebook'],
        "twitter"=>$userloged['twitter'],
        "instagram"=>$userloged['instagram']
      ];

    endforeach;
    $direccion_usuario=[
      "direccion"=>"",
      "ciudad"=>"",
      "pais"=>"",
      "comentarios"=>"",
      "cp"=>""
    ];
    $recuperaInfo=new usuarios();
    $recuperaInfo=$recuperaInfo->sqlquery("SELECT * FROM `usuario_direccion` WHERE id_usuario=$_SESSION[id]");
    foreach($recuperaInfo as $userloged):
      $direccion_usuario=[
        "direccion"=>$userloged['direccion'],
        "ciudad"=>$userloged['ciudad'],
        "pais"=>$userloged['pais'],
        "comentarios"=>$userloged['comentarios'],
        "cp"=>$userloged['cp']
      ];
    endforeach;
  }

  if ($datos_usuario['nivel']=='' || $datos_usuario['nivel']==null) {
    echo '<script>location.href="/"</script>';
  }
?>