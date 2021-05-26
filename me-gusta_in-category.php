<?php
    //echo " ";
    session_start();
    include_once("admin-/modelo/bd.php");
    $id_producto=$_POST['idProduct'];
    include_once("admin-/modelo/usuarios.class.php");
    $contador=new usuarios();
    $query="SELECT COUNT(*) as 'cuenta' FROM `producto_favorito_usuario` WHERE id_producto=$id_producto AND id_usuario=$_SESSION[id]";
    $contador=$contador->sqlquery($query);

        if($contador[0]['cuenta'] == 1){
            $eliminando=new usuarios();
            $query="DELETE FROM `producto_favorito_usuario` WHERE id_usuario=$_SESSION[id] AND id_producto=$_POST[idProduct]";
            $eliminando=$eliminando->sqlquery($query);
        }else{
            $insertLike=new usuarios();
            $query="INSERT INTO `producto_favorito_usuario`(`id_usuario`, `id_producto`) VALUES ($_SESSION[id],$id_producto);";
            $insertLike=$insertLike->sqlquery($query);
            echo $insertLike;
        }
        ?>