<html>
<body>
<?php
$no_contrato = $_POST['no_contrato'];
$devengo_contrato = $_POST['devengo_contrato'];
$concepto_devengo = $_POST['concepto_devengo'];
$unidad_contrato = $_POST['unidad_contrato'];
$fecha_devengo = $_POST['fecha_devengo'];
// process form
$link = mysqli_connect("localhost", "root");
mysqli_select_db($link, "maryscae");
$tildes = $link->query("SET NAMES 'utf8'");
mysqli_query($link, "INSERT INTO administra_contrato (no_contrato, devengo_contrato, concepto_devengo,unidad_contrato, fecha_devengo)
	VALUES ('".$no_contrato."','".$devengo_contrato."','".$concepto_devengo."','".$unidad_contrato."','".$fecha_devengo."')");
echo mysqli_error($link);
mysqli_close($link); // Cerramos la conexion con la base de datos
// echo 'Instrumento Agregado: '.$no_contrato;
// header ("location: ../contratos_cae.php#contratos");
?>
</body>
</html>
