<?php
    session_start();
    date_default_timezone_set("America/Mexico_City");
    setlocale(LC_ALL,"es_MX.utf8");

    const DB_TYPE="mysql";
    const DB_SERVIDOR="localhost";
    const DB_CHARSET="utf8";

    abstract class DB {
        // Usuario de la base de datos
        private static $db_usuario="arcsoluc_root";
        // Clave de la base de datos
        private static $db_pass="@arcsoluc_root@";
        // Nombre del servidor
        private static $db_servidor=DB_SERVIDOR;
        // Nombre de la base de datos
        private static $db_nombre="arcsoluc_app_2021_";
        // Codificación de la base de datos
        private static $db_charset=DB_CHARSET;
        // Conexión con la base de datos
        private $conexion;
        
        public function conectar(){
            try{
                $str=DB_TYPE.":host=".self::$db_servidor.";dbname=".self::$db_nombre;
                $pdo= new PDO($str,self::$db_usuario,self::$db_pass);
                $pdo->exec("SET CHARSET SET".self::$db_charset);
                $pdo->query("SET NAMES 'utf8'");
                return $pdo;
            }catch(PDOException $e){
                exit("Error: ".$e->getMessage());
            }
        }

        public static function crearSlug($text){
            // replace non letter or digits by -
            $text = preg_replace('~[^\pL\d]+~u', '-', $text);

            // transliterate
            $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

            // remove unwanted characters
            $text = preg_replace('~[^-\w]+~', '', $text);

            // trim
            $text = trim($text, '-');

            // remove duplicate -
            $text = preg_replace('~-+~', '-', $text);

            // lowercase
            $text = strtolower($text);

            if (empty($text)) {
                return 'n-a';
            }

            return $text;
        }

        private function desconectar(){
            $this->conexion=null;
        }

        #Métodos CRUD 
        #Clase abstracta permite crear clases y no necesario desarrollar lógica
        abstract protected function consultar($registro);
        abstract protected function insertar($registro);
        abstract protected function actualizar($registro);
        abstract protected function eliminar($registro);

        public function __destruct(){}

    }
?>