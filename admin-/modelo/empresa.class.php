<?php
    class Empresas extends DB {

        private $tabla="empresas";

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
                $query= "INSERT INTO {$this->tabla} (`logo`, `empresas`, `slug`, `rubro`,`comentario`) 
                VALUES ( '{$registro['img_empresa_name']}','{$registro['empresa']}','{$newSlug}','{$registro['rubro']}','{$registro['comentario']}')";
                $insertar=$conexion->prepare($query)->execute($registro);
                if ($insertar) {
                    return 1;
                }else{
                    return "error";
                }
            } catch (Exception $e) {
                exit("Error:".$e->getMessage()) ;
            }
        }

        public function actualizar($registro){
            $conexion=parent::conectar();
            $newSlug=parent::crearSlug($registro['slug']);
            if (isset($registro['img_empresa_name'])) {
                try {
                    $query="
                        UPDATE {$this->tabla} SET   slug='{$newSlug}',
                        empresas='{$registro['empresa']}',
                        logo='{$registro['img_empresa_name']}',
                        rubro='{$registro['rubro']}',
                        comentario='{$registro['comentario']}'
                        WHERE id='{$registro['id']}';
                            ";
                    $actualizar=$conexion->prepare($query)->execute($registro);
                    // return $query;
                    if ($actualizar) {
                        return 1;
                    }else{
                        return "error";
                    }                
                } catch (Exception $e) {
                    exit("Error:".$e->getMessage());
                }
            }else {
                try {
                    $query="
                    UPDATE {$this->tabla} SET   slug='{$newSlug}',
                    empresas='{$registro['empresa']}',
                    rubro='{$registro['rubro']}',
                    comentario='{$registro['comentario']}'
                    WHERE id='{$registro['id']}';
                            ";
                    $actualizar=$conexion->prepare($query)->execute($registro);
                    // return $query;
                    if ($actualizar) {
                        return 1;
                    }else{
                        return "error";
                    }  
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