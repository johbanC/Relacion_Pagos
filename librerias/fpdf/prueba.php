<?php

$nro_contrarto = 'DH-0023';
$arrendatario = 'RAFAEL GONZALO REYES JAIMES';
$identificacion = '1.034.304.158';


require('fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
    function Header()
    {
    // Logo
        $this->Image('DH_Banner_Header.fw.png',0,0);
    // // Arial bold 15
    // $this->SetFont('Arial','B',15);
    // // Movernos a la derecha
    // $this->Cell(80);
    // // Título
    // $this->Cell(30,10,'Title',1,0,'C');
    // // Salto de línea
    // $this->Ln(20);
    }

// Pie de página
    function Footer()
    {
    // Posición: a 1,5 cm del final
        $this->SetY(-10);
    // Arial italic 8
        $this->SetFont('helvetica','I',8);
        //imagen
        $this->Cell(0,0,$this->Image('DH_Banner_Footer.fw.png',0,250,0,0,'PNG','www.endigitalwe.com'),0,0);
    // Número de página
        $this->Cell(0,0,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    }



    

}




// Creación del objeto de la clase heredada
$pdf = new PDF('P','mm','Letter');
$pdf->SetMargins(15,50,15);
$pdf->AddPage();
$pdf->SetFont('helvetica','',12);








//INICIA EL TEXTO DEL CONTRATO

$pdf->Cell(90,7, 'CONTRATO No:  ', 1,0,'L');
$pdf->Cell(90,7, '' .$nro_contrarto, 1,1,'L');

$pdf->Cell(90,7, 'ARRENDATARIO:  ', 1,0,'L');
$pdf->Cell(90,7, '' .$arrendatario, 1,1,'L');

$pdf->Cell(90,7, 'IDENTIFICACION:  ', 1,0,'L');
$pdf->Cell(90,7, '' .$identificacion, 1,0,'L');

/*
$pdf->Cell(0,7, 'ARRENDATARIO:  ' .$arrendatario, 0,1,'C');

$pdf->Cell(0,7, 'IDENTIFICACION:  ' .$identificacion, 0,1,'C');

$pdf->Cell(20,10,'Title',1,1,'C');
$pdf->Cell(20,10,'Title',1,1,'C');
$pdf->Cell(20,10,'Title',1,1,'C');




for($i=1;$i<=2;$i++)
    $pdf->Cell(0,10,'Imprimiendo línea número '.$i,0,1);

    */
$pdf->Output();
?>



