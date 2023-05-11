<?php if($_SESSION['rol'] <= 1){ ?>
<?php encabezado() ?> 
<div class="page-content2">
    <section>
        <div class="card container-fluid2 text-center">
            <div class="card-header"><i class="fas fa-exclamation-circle"></i> ERROR</div>
            <div class="card-body">
                <img src="../Assets/img/unicornio.png" style="height: 400px; ">
                <h5 class="card-title">Error: No tienes acceso a esta página.</h5>
            </div>
            <div class="card-footer text-muted">
              <a href="<?php echo base_url() ?>Dashboard/Alumnos" class="btn btn-primary">Ir al inicio</a>
            </div>
        </div>
    </section>
</div>
<?php }  elseif ($_SESSION['rol'] <= 2) { ?>
<?php encabezado() ?>
<div class="page-content">
   <section>
        <div class="card container-fluid2 text-center">
            <div class="card-header"><i class="fas fa-exclamation-circle"></i> ERROR</div>
            <div class="card-body">
                <img src="../Assets/img/unicornio.png" style="height: 400px; ">
                <h5 class="card-title">Error: No tienes acceso a esta página.</h5>
            </div>
            <div class="card-footer text-muted">
              <a href="<?php echo base_url() ?>Dashboard/Listar" class="btn btn-primary">Ir al inicio</a>
            </div>
        </div>
    </section>
</div>
<?php }  else { 

require_once "Assets/pdf/fpdf.php";
$total = 0.00;
$pdf = new FPDF('P', 'mm', 'A4'); //Tamaño de la hoja
$pdf->AddPage();
$pdf->setFont('Arial', 'B', 14); //Tipo de letra y tamaño
$pdf->setTitle(utf8_decode("Detalle_salida_".$data5['id'])); //Nombre del PDF

$pdf->image(base_url().'Assets/img/UDC.png', 8, 9, 60, 27, 'PNG');

$pdf->Cell(113);
$pdf->setFont('Arial', 'B', 20);
$pdf->Cell(70, 30, utf8_decode("DETALLE ENTRADA"), 0, 1, 'L');

$pdf->Ln(-7);
$pdf->setFont('Arial', 'B', 14);
$pdf->Cell(60, 10, utf8_decode($data2['facultad']), 0, 1, 'L');
$pdf->setFont('Arial', '', 12);
$pdf->Cell(50, 5, utf8_decode($data2['calle']), 0, 0, 'L');
$pdf->Cell(72);
$pdf->setFont('Arial', 'B', 12);
$pdf->Cell(30, 5, utf8_decode("ENTRADA Nº:"), 0, 0, 'R');
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
$pdf->Cell(90, 6, utf8_decode("PROVEEDOR"), 0, 1, 'C');
$pdf->setFont('Arial', '', 12);
$pdf->Cell(90, 6, utf8_decode($data3['nombre']), 0, 0, 'C');
$pdf->Cell(90, 6, utf8_decode($data4['nombre']), 0, 1, 'C');
$pdf->Cell(90, 6, utf8_decode($data3['correo']), 0, 0, 'C');
$pdf->Cell(90, 6, utf8_decode($data4['direccion']), 0, 1, 'C');
$pdf->Cell(90, 6, utf8_decode("Nº Trabajador: ".$data3['usuario']), 0, 0, 'C');
$pdf->Cell(90, 6, utf8_decode("Nº Teléfono: ".$data4['telefono']), 0, 1, 'C');

$pdf->Ln(10);
$pdf->setFont('Arial', 'B', 14);
$pdf->Cell(180, 8, utf8_decode("GRACIAS POR TU CONFIANZA."), 0, 1, 'C');
$pdf->setFont('Arial', '', 10);
$pdf->Cell(180, 8, utf8_decode("Para cualquier aclaración o duda del sistema comunícate al correo mrodriguez74@ucol.mx"), 0, 1, 'C');

$pdf->Output();
}
?>