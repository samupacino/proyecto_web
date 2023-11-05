<?php

include'Librerias/Conexione/Conexion.php';
include'Modelo/Login.php';
include'Modelo/Consulta.php';
include'Modelo/Archivo.php';

class Controlador{


    public function __construct(){

    }

    public function login_vista(){

        include'Vista/login_vista.php';

    }
    public function pdf_vista(){

        include'Vista/main.php';

    }
    public function pdf(){

        $archivo = new Archivo();
        //$archivo->subir_archivo();

        include'Vista/pdf.php';

    }

    public function producto_vista(){

        include'Vista/producto_vista.php';
  
    }
    public function get_movimiento_datos(){

        $listar_movimiento = [];
        $consultar_movimientos = new Consulta();
        $listar_movimiento = $consultar_movimientos->consulta_movimiento_stock();

        return $listar_movimiento;
    }
    public function resumen_movimiento_vista(){

        try{

            $listar_movimiento = [];
            $listar_movimiento = $this->get_movimiento_datos();

            include'Vista/listar_mov_vista.php';

        }catch(PDOException $e){

            echo $e->getMessage();

        }finally{
            
        }
    }
    public function ingreso_stock_vista(){
        $listar_producto = [];
        $lista_cliente = [];

        $consultas = new Consulta();
       
        $lista_proveedor = $consultas->consulta_proveedor();
        $listar_producto = $consultas->consulta_producto();

        include'Vista/ingreso_stock_vista.php';

    }
    public function salida_stock_vista(){

        $listar_producto = [];
        $lista_cliente = [];

        $consultas = new Consulta();
       
        $lista_cliente = $consultas->consulta_cliente();
        $listar_producto = $consultas->consulta_producto();

  
        include'vista/salida_stock_vista.php';

    }
    public function registro_clientes_vista(){

        include'vista/registro_cliente_vista.php';

    }
    public function registro_proveedor_vista(){

        include'vista/registro_proveedor_vista.php';

    }
    public function registro_proveedor(){
        $mensaje = [];
        try{
            $registro_proveedor = [
                "NOMBRES"=>$_POST['NOMBRES'],
                "APELLIDO_PATERNO"=>$_POST['APELLIDO_PATERNO'],
                "APELLIDO_MATERNO"=>$_POST['APELLIDO_MATERNO'],
                "DIRECCION"=>$_POST['DIRECCION'],
                "TELEFONO"=>$_POST['TELEFONO'],
                "EMAIL"=>$_POST['EMAIL'],
                "TIPO_DOCUMENTO"=>$_POST['TIPO_DOCUMENTO'],
            ];

            $execute_registro = new Consulta();
            $execute_registro->registro_proveedor($registro_proveedor);

            $mensaje[0] = "REGISTRO CON EXITO PROVEEDOR " . $registro_proveedor['NOMBRES'];
        
        }catch(PDOException $e){

            $mensaje[0] = $e->getMessage();
        }
        return  $mensaje[0];
    }
    public function registro_cliente(){
        $mensaje = [];
        try{
            $registro_cliente = [
                "NOMBRES"=>$_POST['NOMBRES'],
                "APELLIDO_PATERNO"=>$_POST['APELLIDO_PATERNO'],
                "APELLIDO_MATERNO"=>$_POST['APELLIDO_MATERNO'],
                "DIRECCION"=>$_POST['DIRECCION'],
                "TELEFONO"=>$_POST['TELEFONO'],
                "EMAIL"=>$_POST['EMAIL'],
                "TIPO_DOCUMENTO"=>$_POST['TIPO_DOCUMENTO'],
            ];

            $execute_registro = new Consulta();
            $execute_registro->registro_cliente($registro_cliente);

            $mensaje[0] = "REGISTRO CON EXITO CLIENTE " . $registro_cliente['NOMBRES'];

        }catch(PDOException $e){

            $mensaje[0] = $e->getMessage();
        }
        return $mensaje[0];
    }
    public function registro_producto(){
        $mensaje = [];
        try{

            $registro_producto = [
                "idPRODUCTO"=>$_POST['id_producto'],
                "NOMBRE"=>$_POST['nombre_producto'],
                "MARCA"=>$_POST['marca_producto'],
                "UNIDAD_MEDIDA"=>$_POST['unidad_medida'],
                "ALMACEN"=>$_POST['almacen_producto']
            ];

            $execute_registro = new Consulta();
            $execute_registro->registro_producto($registro_producto);
            $mensaje[0] = "REGISTRO CON EXITO " . $registro_producto['NOMBRE'];

        }catch(PDOException $e){

            $mensaje[0] = $e->getMessage();

        }
        return  $mensaje[0];
    }
    public function registro_mov_ingreso(){

        $datos_mov_ingreso = [
            "ID_PRODUCTO"=>$_POST['ID_PRODUCTO'],
            "NOMBRE_PRODUCTO"=>$_POST['NOMBRE_PRODUCTO'],
            "CANTIDAD"=>$_POST['CANTIDAD'],
            "CLIENTE_PROVEEDOR"=>$_POST['CLIENTE_PROVEEDOR'],
            "TIPO_MOVIMIENTO"=>$_POST['TIPO_MOVIMIENTO']
        ];

        return $datos_mov_ingreso;
    }

    public function registro_movimiento_stock(){

        $mensaje = [];
        try{
            
            $datos_mov_salida = [
                "ID_PRODUCTO"=>$_POST['ID_PRODUCTO'],
                "NOMBRE_PRODUCTO"=>$_POST['NOMBRE_PRODUCTO'],
                "CANTIDAD"=>$_POST['CANTIDAD'],
                "CLIENTE_PROVEEDOR"=>$_POST['CLIENTE_PROVEEDOR'],
                "TIPO_MOVIMIENTO"=>$_POST['TIPO_MOVIMIENTO']
            ];

            $consultas = new Consulta();
            $consultas->movimiento_stock($datos_mov_salida);

            $mensaje[0] = "SE HIZO ".$_POST['TIPO_MOVIMIENTO']." CON EXITO DE PRODUCTO " . $datos_mov_salida['NOMBRE_PRODUCTO'];
        
        }catch(PDOException $e){
            $mensaje[0] = $e->getMessage(); 
        }
        return $mensaje[0];
    }
    public function registro(){
        
        $registro = [
            "id"=>$_POST['id'],
            "paterno"=>$_POST['paterno'],
            "nombres"=>$_POST['nombres'],
            "correo"=>$_POST['correo'],
            "clave"=>$_POST['clave']
        ];

        try{

            $registro_usuario = new Login();
            if($registro_usuario->registro($registro)==1){
                echo "Bienvenido ". $_POST['nombres'];
            }     

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function buscar(){

        $datos_usuario = [
            "id"=>$_POST['id'],
            "clave"=>$_POST['clave']
        ];

        try{

            $usuario = [];
            $login_usuario = new Login();
            $usuario = $login_usuario->buscar($datos_usuario);
       
            if(count($usuario)>0){
                $this->resumen_movimiento_vista();
            }else{
                header("location:index.php");
            }
        }catch(PDOException $e){

        }
    }
}
?>