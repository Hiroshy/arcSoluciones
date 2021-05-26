<?php

 
    class Interesado extends DB {

        private $tabla="interesados";
        
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

            //return $this->consultar();
            try { 
                //INSERT INTO tabla SET nombre=:nombre, apellido=:apellido
                if($registro['fecha_nacimiento']!=null){
                    $query= "INSERT INTO {$this->tabla} (`url`, `nombre`, `apellido`, `servicio`, `telefono`, `mensaje`,`modelo`,`serie`, `placa`, `detalle_carro`,`fecha_nacimiento`,`cp`,`marca_vehiculo`) VALUES ( '{$registro['url']}','{$registro['nombre']}','{$registro['apellido']}','{$registro['servicio']}','{$registro['telefono']}','{$registro['mensaje']}','{$registro['modelo']}','{$registro['serie']}','{$registro['placa']}','{$registro['detalle_carro']}','{$registro['fecha_nacimiento']}','{$registro['cp']}','{$registro['marca_vehiculo']}')";
                }else{
                    $query= "INSERT INTO {$this->tabla} (`url`, `nombre`, `apellido`, `servicio`, `telefono`, `mensaje`,`modelo`,`serie`, `placa`, `detalle_carro`,`fecha_nacimiento`,`cp`,`marca_vehiculo`) VALUES ( '{$registro['url']}','{$registro['nombre']}','{$registro['apellido']}','{$registro['servicio']}','{$registro['telefono']}','{$registro['mensaje']}','{$registro['modelo']}','{$registro['serie']}','{$registro['placa']}','{$registro['detalle_carro']}',null,'{$registro['cp']}','{$registro['marca_vehiculo']}')"; 
                }

                $insertar=$conexion->prepare($query)->execute($registro);
               if ($insertar) {
                   return $insertar;
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
            if (isset($registro['foto'])) {
                try {
                    $query="
                        UPDATE {$this->tabla} SET   slug='{$newSlug}',
                                                    titulo='{$registro['titulo']}',
                                                    link='{$registro['link']}',
                                                    resumen='{$registro['resumen']}',
                                                    imagen='{$registro['imagen']}'
                                                    WHERE id='{$registro['id']}';
                            ";
                     $actualizar=$conexion->prepare($query)->execute($registro);
                    // return $query;
                    return ($actualizar==True) ? "Cambio Realizado con éxito" : "Error" ;
                } catch (Exception $e) {
                    exit("Error:".$e->getMessage());
                }
            }else {
                try {
                    $query="
                                                    UPDATE {$this->tabla} SET   slug='{$newSlug}',
                                                    titulo='{$registro['titulo']}',
                                                    link='{$registro['link']}',
                                                    resumen='{$registro['resumen']}'
                                                    WHERE id='{$registro['id']}';
                            ";
                     $actualizar=$conexion->prepare($query)->execute($registro);
                    // return $query;
                    return ($actualizar==True) ? "Cambio Realizado con éxito" : "Error" ;
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