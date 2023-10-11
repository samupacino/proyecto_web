<?php

Class Consulta{

    public function __construct(){

    }

    public function consulta_producto(){

        $sql = "SELECT * FROM producto";
        $resultado = [];
        $conexion = Conexion::conexion();
        $statement = $conexion->prepare($sql);
        $statement->execute();
        
        $resultado = $statement->fetchAll();

        return $resultado;
    }
    public function consulta_cliente(){

        $sql = "SELECT * FROM cliente";
        $resultado = [];
        $conexion = Conexion::conexion();
        $statement = $conexion->prepare($sql);
        $statement->execute();
        
        $resultado = $statement->fetchAll();

        return $resultado;
    }

    public function consulta_proveedor(){

        $sql = "SELECT * FROM proveedor";
        $resultado = [];
        $conexion = Conexion::conexion();
        $statement = $conexion->prepare($sql);
        $statement->execute();
        
        $resultado = $statement->fetchAll();

        return $resultado;
    }

    public function registro_producto($datos = []){

        $sql = "INSERT INTO producto(idPRODUCTO,NOMBRE,MARCA,UNIDAD_MEDIDA,ALMACEN)VALUES(?,?,?,?,?)"; 
        
        $conexion = Conexion::conexion();

        $statement = $conexion->prepare($sql);

        $statement->execute(array(
            $datos['idPRODUCTO'],
            $datos['NOMBRE'],
            $datos['MARCA'],
            $datos['UNIDAD_MEDIDA'],
            $datos['ALMACEN']
        ));
    }

    public function registro_cliente($datos = []){

        $sql = "INSERT INTO cliente(NOMBRES,APELLIDO_PATERNO,APELLIDO_MATERNO,DIRECCION,TELEFONO,EMAIL,TIPO_DOCUMENTO)VALUES(?,?,?,?,?,?,?)";
        $conexion = Conexion::conexion();
        $statement = $conexion->prepare($sql);
        $statement->execute(array(
            $datos['NOMBRES'],
            $datos['APELLIDO_PATERNO'],
            $datos['APELLIDO_MATERNO'],
            $datos['DIRECCION'],
            $datos['TELEFONO'],
            $datos['EMAIL'],
            $datos['TIPO_DOCUMENTO']
        ));

    }

    public function registro_proveedor($datos = []){

        $sql = "INSERT INTO proveedor(NOMBRES,APELLIDO_PATERNO,APELLIDO_MATERNO,DIRECCION,TELEFONO,EMAIL,TIPO_DOCUMENTO)VALUES(?,?,?,?,?,?,?)";
        $conexion = Conexion::conexion();
        $statement = $conexion->prepare($sql);
        $statement->execute(array(
            $datos['NOMBRES'],
            $datos['APELLIDO_PATERNO'],
            $datos['APELLIDO_MATERNO'],
            $datos['DIRECCION'],
            $datos['TELEFONO'],
            $datos['EMAIL'],
            $datos['TIPO_DOCUMENTO']
        ));

    }

    public function movimiento_stock($datos = []){

        $resultado = [];
        $sql = "INSERT INTO movimiento_stock(ID_PRODUCTO,NOMBRE_PRODUCTO,CANTIDAD,CLIENTE_PROVEEDOR,TIPO_MOVIMIENTO)VALUES(?,?,?,?,?)";
        
        $conexion = Conexion::conexion();
        $statement = $conexion->prepare($sql);

        $statement->execute(array(
            $datos['ID_PRODUCTO'],
            $datos['NOMBRE_PRODUCTO'],
            $datos['CANTIDAD'],
            $datos['CLIENTE_PROVEEDOR'],
            $datos['TIPO_MOVIMIENTO']
        ));
    }

    public function consulta_movimiento_stock(){

        $resultado = [];
        $sql = "SELECT * FROM movimiento_stock";
        
        $conexion = Conexion::conexion();
        $statement = $conexion->prepare($sql);
        $statement->execute();

        $resultado =  $statement->fetchAll();
        return $resultado;
    }
    
}
?>