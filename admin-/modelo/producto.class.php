<?php
 

    class Productos extends DB {

        private $tabla="producto";

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
                // return $query;
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
                $query= "INSERT INTO {$this->tabla} (`slug`, `producto`,`orden`,  `resumen_largo`, `resumen_corto`, `foto`, `meta_title`, `meta_description`, `meta_keyword`, `id_categoria`, `puntuacion`, `es_curso`, `horas`) VALUES ('{$newSlug}','{$registro['producto']}',0,'{$registro['resumen_largo']}','{$registro['resumen_corto']}','{$registro['img_producto_name']}','{$registro['meta_title']}','{$registro['meta_description']}','{$registro['meta_keyword']}',{$registro['id_categoria']},'0',{$registro['es_curso']},'{$registro['horas']}')";
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
            if (isset($registro['img_producto_name'])) {
                try {
                    $query="
                        UPDATE {$this->tabla} SET   slug='{$newSlug}',
                        producto='{$registro['producto']}',
                        resumen_largo='{$registro['resumen_largo']}',
                        resumen_corto='{$registro['resumen_corto']}',
                        es_curso={$registro['es_curso']},
                        horas='{$registro['horas']}',
                        foto='{$registro['img_producto_name']}',
                        meta_title='{$registro['meta_title']}',
                        meta_description='{$registro['meta_description']}',
                        meta_keyword='{$registro['meta_keyword']}',
                        id_categoria={$registro['id_categoria']}
                        WHERE id={$registro['id']};
                            ";
                     $actualizar=$conexion->prepare($query)->execute($registro);
                    // return $query;
                    if ($actualizar) {
                        return 1;
                    }else{
                        return $query;
                    }
                } catch (Exception $e) {
                    exit("Error:".$e->getMessage());
                }
            }else {
                try {
                    $query="
                        UPDATE {$this->tabla} SET   slug='{$newSlug}',
                        producto='{$registro['producto']}',
                        resumen_largo='{$registro['resumen_largo']}',
                        resumen_corto='{$registro['resumen_corto']}',
                        es_curso={$registro['es_curso']},
                        horas='{$registro['horas']}',
                        meta_title='{$registro['meta_title']}',
                        meta_description='{$registro['meta_description']}',
                        meta_keyword='{$registro['meta_keyword']}',
                        id_categoria={$registro['id_categoria']}
                        WHERE id={$registro['id']};
                            ";
                     $actualizar=$conexion->prepare($query)->execute($registro);
                     if ($actualizar) {
                        return 1;
                    }else{
                        return $query;
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