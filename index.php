
<?php

    include'Controlador/Controlador.php';

    $controlador = new Controlador();

    if(isset($_GET['registro_usuario'])){

        $controlador->registro();

    }else if(isset($_POST['login_usuario'])){

        $controlador->buscar();

    }else if(isset($_GET['producto'])){

        if(isset($_GET['producto']) && isset($_GET['GUARDAR_PRODUCTO'])){
            echo json_encode($controlador->registro_producto());
        }else{
            $controlador->producto_vista();
        }
    }else if(isset($_GET['ingreso'])){

        if(isset($_GET['ingreso']) && isset($_GET['GUARDAR_INGRESO'])){
            echo json_encode($controlador->registro_movimiento_stock());
        }else{
            $controlador->ingreso_stock_vista();
        }
        

    }else if(isset($_GET['salida'])){
        if(isset($_GET['salida']) && isset($_GET['GUARDAR_SALIDA'])){

            echo json_encode($controlador->registro_movimiento_stock());
            
        }else{
            $controlador->salida_stock_vista();
        }
        

    }else if(isset($_GET['clientes'])){

        if(isset($_GET['clientes']) && isset($_GET['GUARDAR_CLIENTE'])){
            echo json_encode($controlador->registro_cliente());
        }else{
            $controlador->registro_clientes_vista();
        }
    
    }else if(isset($_GET['proveedor'])){

        if(isset($_GET['proveedor']) && isset($_GET['GUARDAR_PROVEEDOR'])){
            echo json_encode($controlador->registro_proveedor());
        }else{
            $controlador->registro_proveedor_vista();
        }

    }else if(isset($_GET['resumen'])){

        if(isset($_GET['resumen']) && isset($_GET['cargarnuevos'])){
            echo json_encode($controlador->get_movimiento_datos());
        }else{
            $controlador->resumen_movimiento_vista();
        }
       
        
    }else{
        
        //$controlador->login_vista();
        $controlador->pdf_vista();

    }

    
?>