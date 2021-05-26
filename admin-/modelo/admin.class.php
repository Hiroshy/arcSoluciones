<?php


    class Admin extends DB {

        private $tabla="user";

        public function hello(){
            return "hello";
        }

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
                $query= "INSERT INTO {$this->tabla} (`slug`, `nombre`, `apellido`, `direccion`, `telefono`, `email`, `cargo`, `foto`, `sueldo`) VALUES ( '{$newSlug}','{$registro['nombre']}','{$registro['apellido']}','{$registro['direccion']}','{$registro['telefono']}','{$registro['email']}','{$registro['cargo']}','{$registro['foto']}',{$registro['sueldo']})";
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
                                                    direccion='{$registro['direccion']}',
                                                    telefono='{$registro['telefono']}',
                                                    email='{$registro['email']}',
                                                    cargo='{$registro['cargo']}',
                                                    sueldo='{$registro['sueldo']}',
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
                                                    slug='{$newSlug}',
                                                    nombre='{$registro['nombre']}',
                                                    apellido='{$registro['apellido']}',
                                                    direccion='{$registro['direccion']}',
                                                    telefono='{$registro['telefono']}',
                                                    email='{$registro['email']}',
                                                    cargo='{$registro['cargo']}',
                                                    sueldo='{$registro['sueldo']}'
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