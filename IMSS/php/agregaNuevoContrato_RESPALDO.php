<?php
$link = mysqli_connect('localhost', 'root','','maryscae');

$no_contrato = $_POST['no_contrato'];
$desc_contrato = $_POST['desc_contrato'];
$area_contrato = $_POST['area_contrato'];
$administrador_contrato = $_POST['administrador_contrato'];
$tipo_contrato = $_POST['tipo_contrato'];
$termino_contrato = $_POST['termino_contrato'];
$monto_contrato = $_POST['monto_contrato'];
$fianza_contrato = $_POST['fianza_contrato'];
$status_contrato = $_POST['status_contrato'];
$devengo_contrato = '';
// process form

$sqlTabla1 = "INSERT INTO info_contratos(no_contrato,desc_contrato,area_contrato,administrador_contrato,tipo_contrato,
termino_contrato,monto_contrato,fianza_contrato,status_contrato)
VALUES ('$no_contrato','$desc_contrato','$area_contrato','$administrador_contrato',
'$tipo_contrato','$termino_contrato','$monto_contrato','$fianza_contrato'.'$status_contrato')";

$ejecutado = mysqli_query($link,$sqlTabla1);

if($ejecutado == 1){

	$sqlTabla1 = "INSERT INTO administra_contrato(no_contrato,devengo_contrato,	concepto_devengo, unidad_contrato,fecha_devengo)
	VALUES ('$no_contrato','$devengo_contrato','','','')";

$ejecutado2 = mysqli_query($link, $sqlTabla1);
echo "Eres grande";
}else{
	echo mysqli_error($link);
}
mysqli_close($link); // Cerramos la conexion con la base de datos
// echo 'Instrumento Agregado: '.$no_contrato;
// header ("location: ../contratos_cae.php#contratos");
?>
