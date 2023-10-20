<?php

/*
    require('Librerias/FPDF/fpdf.php');
    require_once('Librerias/FPDI/src/autoload.php'); 
     

    use \setasign\Fpdi\Fpdi;

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->SetY(100);
    $pdf->SetX(120);
    $pdf->Cell(0,0,'Hola, Mundo');
    $pdf->Output();
*/
echo "ESTOY BIEN EN MAIN";  
?>


<form action="index.php" method="post">
    <input type="text" name="campo" value="CTV">
    <input type="file" name="archivo" id="">
    <input type="submit" name="PDF">

</form>

<?php
    echo phpinfo();
    if(isset($_POST['archivo'])){
        echo "SOLO";
    }
   
?>