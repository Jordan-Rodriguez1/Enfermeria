<html>
<body>
<?php
$no_contrato = $_POST['no_contrato'];
$status_contrato = $_POST['status_contrato'];
$fianza_contrato = $_POST['fianza_contrato'];
$monto_contrato = $_POST['monto_contrato'];
$contacto_contrato = $_POST['contacto_contrato'];

$usuario_contrato = "luis.godinez";
$comentarios_contrato = $_POST['comentarios_contrato'];
$revision_contrato = "documento1.xls";

// process form
$link = mysqli_connect("localhost", "root");
mysqli_select_db($link, "maryscae");
$tildes = $link->query("SET NAMES 'utf8'");
mysqli_query($link,"UPDATE info_contratos SET status_contrato='" . $_POST['status_contrato'] . "', fianza_contrato='" . $_POST['fianza_contrato'] . "', monto_contrato='" . $_POST['monto_contrato'] . "' WHERE no_contrato='" . $_POST['no_contrato'] . "'");
mysqli_query($link, "INSERT INTO flujoDeContratos (no_contrato,usuario_contrato,status_contrato,	comentarios_contrato,	revision_contrato,contacto_contrato)
	VALUES ('".$no_contrato."','".$usuario_contrato."','".$status_contrato."','".$comentarios_contrato."','".$revision_contrato."','".$contacto_contrato."')");

echo mysqli_error($link);
mysqli_close($link); // Cerramos la conexion con la base de datos
header ("location: ../contratos.php");
?>
</body>
</html>
