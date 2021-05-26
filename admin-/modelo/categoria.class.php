<?php
    
    
    class Categoria extends DB { 

        private $tabla="categoria";

        public function sqlquery($registro){
            $conexion=parent::conectar();
            try {
            $query=$registro;
            return $consulta=$conexion->query($query)->fetchAll();
            } catch (Exception $e) {
                exit("Error:".$e->getMessage());
            }
        }
        
        public function consultar($registro){
            $conexion=parent::conectar();
            try {
                if (isset($registro['condicion'])) {
                    $query="SELECT $registro[campo] FROM {$this->tabla} WHERE $registro[condicion] = '$registro[condicionValor]' ";
                }else{
                    $query="SELECT $registro[campo] FROM {$this->tabla} ";
                }
                return $consulta=$conexion->query($query)->fetchAll();
            } catch (Exception $e) {
                exit("Error:".$e->getMessage());
            }
        }

        public function insertar($registro){
            $conexion=parent::conectar();
            $newSlug=parent::crearSlug($registro['slug']);

            //return $this->consultar(); 
            try { 
                //INSERT INTO tabla SET nombre=:nombre, apellido=:apellido
                $query= "INSERT INTO {$this->tabla} (`slug`, `categoria` , `servicio`, `resumen`, `foto`, `meta_title`, `meta_description`, `meta_keyword`, `comentario`) VALUES ('{$newSlug}','{$registro['nombre_categoria']}','{$registro['servicio']}','{$registro['descripcion_categoria']}','{$registro['img_categoria_name']}','{$registro['meta_title']}','{$registro['meta_description']}','{$registro['meta_keyword']}','{$registro['comentario_categoria']}')";
                $insertar=$conexion->prepare($query)->execute($registro);
                if ($insertar) {
                    return 1;
                }else{
                    return $query;
                }
            } catch (Exception $e) {
                exit("Error:".$e->getMessage()) ;
            }
        }

        public function actualizar($registro){
            $conexion=parent::conectar();
            $newSlug=parent::crearSlug($registro['slug']);
            if (isset($registro['img_categoria_name'])) {
                try {
                    $query="
                        UPDATE {$this->tabla} SET   slug='{$newSlug}',
                                                    categoria='{$registro['nombre_categoria']}',
                                                    servicio='{$registro['servicio']}',
                                                    resumen='{$registro['descripcion_categoria']}',
                                                    comentario='{$registro['comentario_categoria']}',
                                                    meta_description='{$registro['meta_description']}',
                                                    meta_keyword='{$registro['meta_keyword']}',
                                                    foto='{$registro['img_categoria_name']}',
                                                    meta_title='{$registro['meta_title']}'
                                                    WHERE id={$registro['id']};
                            ";
                     $actualizar=$conexion->prepare($query)->execute($registro);
                     if ($actualizar) {
                        return 1;
                    }else{
                        return  $query;
                    }
                    // return $query;
                } catch (Exception $e) {
                    exit("Error:".$e->getMessage());
                }
            }else {
                try {
                    $query="
                        UPDATE {$this->tabla} SET   slug='{$newSlug}',
                                                    categoria='{$registro['nombre_categoria']}',
                                                    servicio='{$registro['servicio']}',
                                                    resumen='{$registro['descripcion_categoria']}',
                                                    comentario='{$registro['comentario_categoria']}',
                                                    meta_description='{$registro['meta_description']}',
                                                    meta_keyword='{$registro['meta_keyword']}',
                                                    meta_title='{$registro['meta_title']}'
                                                    WHERE id={$registro['id']};
                            ";
                     $actualizar=$conexion->prepare($query)->execute($registro);
                     if ($actualizar) {
                        return 1;
                    }else{
                        return  $query;
                    }
                    // return $query;
                } catch (Exception $e) {
                    exit("Error:".$e->getMessage());
                }
            }
        }


        public function eliminar($registro){
            $conexion=parent::conectar();
            try {
                $query="DELETE FROM {$this->tabla} WHERE " . $registro['where']. " = ". $registro['id'];
                $conexion->prepare($query)->execute($registro);
            } catch (Exception $e) {
                exit("Error:".$e->getMessage());
            }
        }

    }
?>