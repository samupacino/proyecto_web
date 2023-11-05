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

?>
 <?php
    include'inc/head.php';
   
?>                                          
<form action="" method="post" enctype="multipart/form-data">

    <input type="file" name="archivo">
    <input type="submit" name="PDF">

</form> 



<?php
    $archivos = scandir("archivos");



    $ruta = dirname(dirname(__FILE__)) . '/archivos/' . $archivos[2];
    echo $ruta;
?>

<a href="archivos/manualPic.pdf" target="_blank">DESCARGAR</a>
<?php
    include'inc/footer.php';
?>

