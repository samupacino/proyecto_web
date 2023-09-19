<?php

include'Modelo/Login.php';

class Controlador{


    public function __construct(){

    }

    public function login_vista(){

        include'Vista/login_vista.php';

    }
    public function producto_vista(){

        include'Vista/producto_vista.php';
  
    }
    public function ingreso_stock_vista(){

        include'Vista/ingreso_stock_vista.php';

    }
    public function salida_stock_vista(){

        include'vista/salida_stock_vista.php';

    }
    public function registro_clientes_vista(){

        include'vista/registro_cliente_vista.php';

    }
    public function registro_proveedor_vista(){
        
        include'vista/registro_proveedor_vista.php';

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

            include'Vista/portal_vista.php';

        }catch(PDOException $e){

        }
    }


}
?>