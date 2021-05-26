<?php
    class Usuarios extends DB {

        private $tabla="usuario";

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
                $query= "INSERT INTO {$this->tabla} (`nombre`, `apellido`, `biografia`, `curp`, `rfc`, `empresa`, `fecha_nacimiento`, `email`, `telefono`, `clave`, `foto`,`nivel`) VALUES ('{$registro['nombre']}','{$registro['apellido']}','{$registro['biografia']}','{$registro['curp']}','{$registro['rfc']}','{$registro['empresa']}','{$registro['fecha_nacimiento']}','{$registro['email']}','{$registro['telefono']}','{$registro['mipassword']}','{$registro['img_usuario_name']}','{$registro['nivel']}')";
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
            if (isset($registro['img_usuario_name'])) {
                try {
                    $query="
                        UPDATE {$this->tabla} SET   nombre='{$registro['nombre']}',
                                                    apellido='{$registro['apellido']}',
                                                    biografia='{$registro['biografia']}',
                                                    curp='{$registro['curp']}',
                                                    rfc='{$registro['rfc']}',
                                                    empresa='{$registro['empresa']}',
                                                    fecha_nacimiento='{$registro['fecha_nacimiento']}',
                                                    email='{$registro['email']}',
                                                    telefono='{$registro['telefono']}',
                                                    clave='{$registro['mipassword']}',
                                                    foto='{$registro['img_usuario_name']}',
                                                    nivel='{$registro['nivel']}'
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
                                                    UPDATE {$this->tabla} SET   nombre='{$registro['nombre']}',
                                                    apellido='{$registro['apellido']}',
                                                    biografia='{$registro['biografia']}',
                                                    curp='{$registro['curp']}',
                                                    rfc='{$registro['rfc']}',
                                                    empresa='{$registro['empresa']}',
                                                    fecha_nacimiento='{$registro['fecha_nacimiento']}',
                                                    email='{$registro['email']}',
                                                    telefono='{$registro['telefono']}',
                                                    clave='{$registro['mipassword']}',
                                                    nivel='{$registro['nivel']}'
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