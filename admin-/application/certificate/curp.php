<?php
    include_once("../../modelo/bd.php");
    echo " ";
    error_reporting(null);
    include_once("../../modelo/info.class.php");
    include_once("../../modelo/usuarios.class.php");
    $contador=new usuarios();
    $curp=openssl_encrypt($_POST['curp'],$metodo,$pass);
    //echo (openssl_decrypt('e1UkI2QgqhbnpohFLAZQRA==',$metodo,$pass));
    $query="SELECT nombre,apellido,email FROM `usuario` WHERE curp='$curp'";
    $contador=$contador->sqlquery($query);
    if($contador){
        $datos=[
            "nombre"=>openssl_decrypt($contador[0]['nombre'],$metodo,$pass),
            "apellido"=>openssl_decrypt($contador[0]['apellido'],$metodo,$pass),
            "email"=>openssl_decrypt($contador[0]['email'],$metodo,$pass),
        ];
        echo json_encode($datos);
    }else{
        $datos=["nombre"=>" ","apellido"=>" ","email"=>" "];
        echo json_encode($datos);
    }
    
?>