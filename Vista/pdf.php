<?php

/*

        función PDF:
        is_uploaded_file();
*/


        $ruta = dirname(dirname(__FILE__)) . '/archivos/';
        //$pdf = $ruta . basename($_FILES['archivo']['name']);
        $pdf = "archivos/" . basename($_FILES['archivo']['name']);
        
        if(move_uploaded_file($_FILES['archivo']['tmp_name'],$pdf)){
            echo "SUBIO";
        }else{
            echo "NADA NO SUBIO";
        }
    
        echo $pdf;
        header("location:index.php"); 
?>
<script>
    //window.location.replace("http://192.168.0.153/index.php");
</script>