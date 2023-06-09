<?php if($_SESSION['rol'] <= 1){ ?> 
    <?php eror403() ?>
<?php }  else { 
require_once "Assets/pdf/fpdf.php";
$total = 0.00;
$pdf = new FPDF('P', 'mm', 'A4'); //Tamaño de la hoja
$pdf->AddPage();
$pdf->setFont('Arial', 'B', 14); //Tipo de letra y tamaño
$pdf->setTitle(utf8_decode("Detalle_salida_".$data5['id'])); //Nombre del PDF

$pdf->image(base_url().'Assets/img/UDC.png', 8, 9, 60, 27, 'PNG');

$pdf->Cell(120);
$pdf->setFont('Arial', 'B', 20);
$pdf->Cell(70, 30, utf8_decode("DETALLE SALIDA"), 0, 1, 'L');

$pdf->Ln(-7);
$pdf->setFont('Arial', 'B', 14);
$pdf->Cell(60, 10, utf8_decode($data2['facultad']), 0, 1, 'L');
$pdf->setFont('Arial', '', 12);
$pdf->Cell(50, 5, utf8_decode($data2['calle']), 0, 0, 'L');
$pdf->Cell(72);
$pdf->setFont('Arial', 'B', 12);
$pdf->Cell(25, 5, utf8_decode("SALIDA Nº:"), 0, 0, 'R');
$pdf->setFont('Arial', '', 12);
$pdf->Cell(20, 5, utf8_decode($data5['id']), 0, 1, 'L');
$pdf->Cell(50, 5, utf8_decode($data2['colonia']." C.P. ".$data2['cp']), 0, 0, 'L'); 
$pdf->Cell(72);
$pdf->setFont('Arial', 'B', 12);
$pdf->Cell(18, 5, utf8_decode("FECHA:"), 0, 0, 'R');
$pdf->setFont('Arial', '', 12);
$pdf->Cell(35, 5, utf8_decode($data5['fecha']), 0, 1, 'L'); 
$pdf->Cell(50, 5, utf8_decode($data2['ciudad']), 0, 0, 'L');

$pdf->Ln(10);
$pdf->setFont('Arial', 'B', 12);
$pdf->Cell(80, 6, utf8_decode("DESCRIPCIÓN DE LA TRANSACCIÓN:"), 0, 1, 'L');
$pdf->setFont('Arial', '', 12);
$pdf->MultiCell(182, 6, utf8_decode($data5['descripcion']), 0, 'J');

$pdf->Ln();
$pdf->setFont('Arial', '', 12);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(30, 6, utf8_decode('CÓDIGO'), 1, 0, 'C', 1);
$pdf->Cell(70, 6, utf8_decode('DESCRIPCIÓN'), 1, 0, 'L', 1);
$pdf->Cell(30, 6, utf8_decode('CANTIDAD'), 1, 0, 'C', 1);
$pdf->Cell(25, 6, utf8_decode('PRECIO'), 1, 0, 'R', 1);
$pdf->Cell(25, 6, utf8_decode('SUBTOTAL'), 1, 1, 'R', 1);
foreach ($data1 as $compras) {
    $subtotal = $compras['cantidad'] * $compras['precio'];
    $total = $total + $subtotal;
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(30, 6, $compras['codigo'], 1, 0, 'C');
    $pdf->Cell(70, 6, utf8_decode($compras['producto']), 1, 0, 'L');
    $pdf->Cell(30, 6, $compras['cantidad'], 1, 0, 'C');
    $pdf->Cell(25, 6, '$'.$compras['precio'], 1, 0, 'R');
    $pdf->Cell(25, 6, '$'.number_format($subtotal, 2, '.', ','), 1, 1, 'R');
}
$pdf->Cell(130);
$pdf->setFont('Arial', 'B', 12);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(25, 6, 'Total', 1, 0, 'C', 1);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(25, 6, '$'. number_format( $total, 2, '.', ','), 1, 1, 'R');

$pdf->Ln(7);
$pdf->setFont('Arial', 'B', 12);
$pdf->Cell(90, 6, utf8_decode("AUTOR"), 0, 0, 'C');
$pdf->Cell(90, 6, utf8_decode("RESPONSABLE"), 0, 1, 'C');
$pdf->setFont('Arial', '', 12);
$pdf->Cell(90, 6, utf8_decode($data3['nombre']), 0, 0, 'C');
$pdf->Cell(90, 6, utf8_decode($data4['nombre']), 0, 1, 'C');
$pdf->Cell(90, 6, utf8_decode($data3['correo']), 0, 0, 'C');
$pdf->Cell(90, 6, utf8_decode($data4['correo']), 0, 1, 'C');
$pdf->Cell(90, 6, utf8_decode("Nº Trabajador: ".$data3['usuario']), 0, 0, 'C');
$pdf->Cell(90, 6, utf8_decode("Nº Trabajador: ".$data4['usuario']), 0, 1, 'C');

$pdf->Ln(10);
$pdf->setFont('Arial', 'B', 20);
$pdf->Cell(60);
if($data5['estado'] == 0){
$pdf->SetFillColor(220, 53, 69);
$pdf->Cell(60, 8, utf8_decode("RECHAZADO"), 0, 1, 'C', 1);
}  else {if($data5['estado'] == 1){
$pdf->SetFillColor(255, 193, 7);
$pdf->Cell(60, 8, utf8_decode("PENDIENTE"), 0, 1, 'C', 1); 
}  else {
$pdf->SetFillColor(40, 167, 69);
$pdf->Cell(60, 8, utf8_decode("APROBADO"), 0, 1, 'C', 1);
} }

$pdf->Ln();
$pdf->setFont('Arial', 'B', 14);
$pdf->Cell(180, 8, utf8_decode("GRACIAS POR TU CONFIANZA."), 0, 1, 'C');
$pdf->setFont('Arial', '', 10);
$pdf->Cell(180, 8, utf8_decode("Para cualquier aclaración o duda del sistema comunícate al correo mrodriguez74@ucol.mx"), 0, 1, 'C');

$pdf->Output();

}
?>