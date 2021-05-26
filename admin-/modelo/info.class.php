<?php
    $pass="micontraseña";
    $metodo="aes256";
    //$encriptado=openssl_encrypt($palabra,$metodo,$pass);

    class Site extends DB {

        private $tabla="website";

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
                }elseif(isset($registro['tabla'])){
                    $query="SELECT $registro[campo] FROM $registro[tabla] ";  
                }
                else{
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
                $query= "INSERT INTO {$this->tabla} (`slug`, `keywords`, `nombre`, `descripcion`, `costo`, `duracion`, `sesiones`, `fotos`, `idCategoria`) VALUES ( '{$newSlug}','{$registro['keywords']}','{$registro['nombre']}','{$registro['descripcion']}',{$registro['costo']},{$registro['duracion']},{$registro['sesiones']},'{$registro['fotos']}',{$registro['idCategoria']})";
                $insertar=$conexion->prepare($query)->execute($registro);
                return $insertar;
            } catch (Exception $e) {
                exit("Error:".$e->getMessage()) ;
            }
        }

        public function actualizar($registro){
            $conexion=parent::conectar();
            if (isset($registro['empresa'])) {
                try {
                    $query=" UPDATE {$this->tabla} SET empresa='{$registro['empresa']}' WHERE id=1;";
                     $actualizar=$conexion->prepare($query)->execute($registro);
                    // return $query;
                    return ($actualizar==True) ? "Cambio Realizado con éxito" : "Error" ;;
                } catch (Exception $e) {
                    exit("Error:".$e->getMessage());
                }
            }

            if(isset($registro['logo'])){
                try {
                    $query=" UPDATE {$this->tabla} SET   logo='{$registro['logo']}' WHERE id=1;";
                     $actualizar=$conexion->prepare($query)->execute($registro);
                    // return $query;
                    return ($actualizar==True) ? "Cambio Realizado con éxito" : "Error" ;;
                } catch (Exception $e) {
                    exit("Error:".$e->getMessage());
                }
            }
             
            if(isset($registro['metakeywords'])){
                try {
                    $query="UPDATE {$this->tabla} SET  metakeywords='{$registro['metakeywords']}' WHERE id=1;";
                     $actualizar=$conexion->prepare($query)->execute($registro);
                    // return $query;
                    return ($actualizar==True) ? "Cambio Realizado con éxito" : "Error" ;;
                } catch (Exception $e) {
                    exit("Error:".$e->getMessage());
                }
            }
            
            if(isset($registro['description'])){
                try {
                    $query=" UPDATE {$this->tabla} SET   description='{$registro['description']}' WHERE id=1;";
                     $actualizar=$conexion->prepare($query)->execute($registro);
                    // return $query;
                    return ($actualizar==True) ? "Cambio Realizado con éxito" : "Error" ;;
                } catch (Exception $e) {
                    exit("Error:".$e->getMessage());
                }
            }

            if(isset($registro['favicon'])){
                try {
                    $query="UPDATE {$this->tabla} SET   favicon='{$registro['favicon']}' WHERE id=1;";
                     $actualizar=$conexion->prepare($query)->execute($registro);
                    // return $query;
                    return ($actualizar==True) ? "Cambio Realizado con éxito" : "Error" ;;
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