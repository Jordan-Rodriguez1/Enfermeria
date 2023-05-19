<html>
<body>
<?php
$no_contrato = $_POST['no_contrato'];
$desc_contrato = $_POST['desc_contrato'];
$area_contrato = $_POST['area_contrato'];
$administrador_contrato = $_POST['administrador_contrato'];
$tipo_contrato = $_POST['tipo_contrato'];
$termino_contrato = $_POST['termino_contrato'];
$monto_contrato = $_POST['monto_contrato'];
$fianza_contrato = $_POST['fianza_contrato'];
$status_contrato = $_POST['status_contrato'];
$sistema_contrato = $_POST['sistema_contrato'];
$devengo_contrato = 0;
// process form
$link = mysqli_connect("localhost", "root");
mysqli_select_db($link, "maryscae");
$tildes = $link->query("SET NAMES 'utf8'");
mysqli_query($link, "INSERT INTO info_contratos (no_contrato, desc_contrato, area_contrato, administrador_contrato, tipo_contrato, termino_contrato, monto_contrato, devengo_contrato, fianza_contrato, status_contrato, sistema_contrato)
	VALUES ('".$no_contrato."','".$desc_contrato."','".$area_contrato."','".$administrador_contrato."','".$tipo_contrato."','".$termino_contrato."','".$monto_contrato."','".$devengo_contrato."','".$fianza_contrato."','".$status_contrato."','".$sistema_contrato."')");

	mysqli_query($link, "INSERT INTO administra_contrato (no_contrato, devengo_contrato,	concepto_devengo, unidad_contrato)
		VALUES ('".$no_contrato."','".$devengo_contrato."','".''."','".''."')");


echo mysqli_error($link);
Header("Location: ../contratos.php");
mysqli_close($link); // Cerramos la conexion con la base de datos




// echo 'Instrumento Agregado: '.$no_contrato;
// header ("location: ../contratos_cae.php#contratos");
?>
</body>
</html>
