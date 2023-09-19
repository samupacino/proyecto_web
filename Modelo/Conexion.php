<?php
    class Conexion{

        public function __construct(){
        
        }

        public static function conexion(){

            $dsn = 'mysql:dbname=ALMACEN;host=localhost';
            $username = 'root';
            $password = 'root';

            return $pdo = new PDO($dsn, $username, $password);

        }
    }
?>