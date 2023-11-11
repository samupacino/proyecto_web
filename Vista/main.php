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



    //$ruta = dirname(dirname(__FILE__)) . '/archivos/' . $archivos[2];
    //$ruta = 'archivos/' . $archivos[2];

    for($i = 2 ; $i < count($archivos) ; $i++){
    ?>
        <a href="<?php echo 'archivos/'.$archivos[$i] ?>"  target="_blank">DESCARGAR</a>
        <a href="index.php?eliminar=<?php echo 'archivos/'.$archivos[$i] ?>">ELIMINAR</a>
        
        <br>
    <?php
    }
    ?>
    <a href="index.php?plantilla">ABRIR PLANTILLA</a>
<?php
    include'inc/footer.php';
?>

