
<?php

    require_once('Librerias/FPDF/fpdf.php');
    require_once('Librerias/FPDI/src/autoload.php');

    //echo $_SERVER['DOCUMENT_ROOT'];
    class Archivo{

        public function __construct(){

        }
        
        public function generar_pdf(){
            $pdf = new \setasign\Fpdi\Fpdi();
            $pdf->AddPage();
            $paginas = $pdf->setSourceFile("archivos/Sam.pdf");
         
            $pagina = $pdf->importPage(2);
            $pdf->useTemplate($pagina);

            $pdf->SetFont('Courier','B',18);
            $pdf->SetXY(10, 10);
            $pdf->Write(0, 'A complete document imported with FPDI');

            $pdf->SetFont('Courier','',12);
            $pdf->SetXY(10, 10);
            $pdf->Write(10, 'SAMUEL JOEL LUJAN SARASI');

            $pdf->Output();
        }
    }

?>