
<?php

    include'Controlador/Controlador.php';

    $controlador = new Controlador();

    if(isset($_GET['registro_usuario'])){

        $controlador->registro();

    }else if(isset($_POST['login_usuario'])){

        $controlador->buscar();

    }else if(isset($_GET['producto'])){

        $controlador->producto_vista();

    }else if(isset($_GET['ingreso'])){

        $controlador->ingreso_stock_vista();

    }else if(isset($_GET['salida'])){

        $controlador->salida_stock_vista();

    }else if(isset($_GET['clientes'])){

        $controlador->registro_clientes_vista();

    }else if(isset($_GET['proveedor'])){

        $controlador->registro_proveedor_vista();
        
    }else{
        $controlador->login_vista();

    }

    
?>