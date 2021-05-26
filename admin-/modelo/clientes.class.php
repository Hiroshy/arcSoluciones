<?php
 

    class Cliente extends DB {

        private $tabla="clientes";

        public function hello(){
            return "hello";
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
                $query= "INSERT INTO {$this->tabla} (`slug`, `nombre`, `apellido`, `telefono`, `direccion`, `company`, `website`, `email`, `cargo` ,`foto`) VALUES ( '{$newSlug}','{$registro['nombre']}','{$registro['apellido']}','{$registro['telefono']}','{$registro['direccion']}','{$registro['company']}','{$registro['website']}','{$registro['email']}','{$registro['cargo']}','{$registro['foto']}')";
                $insertar=$conexion->prepare($query)->execute($registro);
                return $insertar;
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
                                                    nombre='{$registro['nombre']}',
                                                    apellido='{$registro['apellido']}',
                                                    telefono='{$registro['telefono']}',
                                                    direccion='{$registro['direccion']}',
                                                    company='{$registro['company']}',
                                                    website='{$registro['website']}',
                                                    email='{$registro['email']}',
                                                    cargo='{$registro['cargo']}',
                                                    foto='{$registro['foto']}'
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
                                                    nombre='{$registro['nombre']}',
                                                    apellido='{$registro['apellido']}',
                                                    telefono='{$registro['telefono']}',
                                                    direccion='{$registro['direccion']}',
                                                    company='{$registro['company']}',
                                                    website='{$registro['website']}',
                                                    email='{$registro['email']}',
                                                    cargo='{$registro['cargo']}'
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


        public function eliminar($registro,$accion){
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