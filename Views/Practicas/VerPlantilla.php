<?php
require_once "Assets/pdf/fpdf.php";
$total = 0.00;
$pdf = new FPDF('P', 'mm', 'A4'); //Tamaño de la hoja
$pdf->AddPage();
$pdf->setFont('Arial', 'B', 14); //Tipo de letra y tamaño
$pdf->setTitle(utf8_decode("Detalle_plantilla_".$data3['id'])); //Nombre del PDF

$pdf->image(base_url().'Assets/img/UDC.png', 8, 9, 60, 27, 'PNG');

$pdf->Cell(105);
$pdf->setFont('Arial', 'B', 20);
$pdf->Cell(80, 30, utf8_decode("DETALLE PLANTILLA"), 0, 1, 'L');

$pdf->Ln(-7);
$pdf->setFont('Arial', 'B', 14);
$pdf->Cell(60, 10, utf8_decode($data2['facultad']), 0, 1, 'L');
$pdf->setFont('Arial', '', 12);
$pdf->Cell(50, 5, utf8_decode($data2['calle']), 0, 0, 'L');
$pdf->Cell(72);
$pdf->setFont('Arial', 'B', 12);
$pdf->Cell(33, 5, utf8_decode("PLANTILLA Nº:"), 0, 0, 'R');
$pdf->setFont('Arial', '', 12);
$pdf->Cell(20, 5, utf8_decode($data3['id']), 0, 1, 'L');
$pdf->Cell(50, 5, utf8_decode($data2['colonia']." C.P. ".$data2['cp']), 0, 0, 'L'); 
$pdf->Cell(72);
$pdf->setFont('Arial', 'B', 12);
$pdf->Cell(18, 5, utf8_decode("FECHA:"), 0, 0, 'R');
$pdf->setFont('Arial', '', 12);
$pdf->Cell(35, 5, utf8_decode($data3['fecha']), 0, 1, 'L'); 
$pdf->Cell(50, 5, utf8_decode($data2['ciudad']), 0, 0, 'L');

$pdf->Ln(10);
$pdf->setFont('Arial', 'B', 12);
$pdf->Cell(80, 6, utf8_decode("DESCRIPCIÓN DE LA PLANTILLA:"), 0, 1, 'L');
$pdf->setFont('Arial', '', 12);
$pdf->MultiCell(182, 6, utf8_decode($data3['descripcion']), 0, 'J');

$pdf->Ln();
$pdf->setFont('Arial', '', 12);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(40, 6, utf8_decode('CÓDIGO'), 1, 0, 'C', 1);
$pdf->Cell(100, 6, utf8_decode('DESCRIPCIÓN'), 1, 0, 'L', 1);
$pdf->Cell(40, 6, utf8_decode('CANTIDAD'), 1, 1, 'C', 1);
foreach ($data1 as $compras) {
    $total = $total + $compras['cantidad'];
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(40, 6, $compras['codigo'], 1, 0, 'C');
    $pdf->Cell(100, 6, utf8_decode($compras['nombre']), 1, 0, 'L');
    $pdf->Cell(40, 6, $compras['cantidad'], 1, 1, 'C');
}
$pdf->Cell(115);
$pdf->setFont('Arial', 'B', 12);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(25, 6, 'Total', 1, 0, 'C', 1);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(40, 6, number_format( $total, 2, '.', ','), 1, 1, 'C');

$pdf->Ln();
$pdf->setFont('Arial', 'B', 14);
$pdf->Cell(180, 8, utf8_decode("GRACIAS POR TU CONFIANZA."), 0, 1, 'C');
$pdf->setFont('Arial', '', 10);
$pdf->Cell(180, 8, utf8_decode("Para cualquier aclaración o duda del sistema comunícate al correo mrodriguez74@ucol.mx"), 0, 1, 'C');

$pdf->Output();
?>