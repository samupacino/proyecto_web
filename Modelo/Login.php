<?php
    class Login{
        public function __construct(){}
        
        public function registro($datos = []){
            $sql = 'INSERT INTO usuario (id, paterno, nombres, correo, clave) VALUES (?,?,?,?,?);';
            
            $conexion = Conexion::conexion();
            $statement = $conexion->prepare($sql);
            $statement->execute(array(
                $datos['id'],
                $datos['paterno'],
                $datos['nombres'],
                $datos['correo'],
                $datos['clave'],  
            ));
            $resultado = $statement->rowCount(); 
            return $resultado;
        }
        public function buscar($datos = []){

            $sql = 'select nombres, paterno from usuario where id = ? and clave = ?';   
            $conexion = Conexion::conexion();
            $statement = $conexion->prepare($sql);
            $statement->execute(array(
                $datos['id'],
                $datos['clave'],  
            ));
            $resultado = $statement->fetchAll();
            
            return $resultado;
        }
    }
?>
