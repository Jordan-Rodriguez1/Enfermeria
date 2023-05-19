<?php
$numContrato_Validar = $_POST['numContrato_Validar'];
// process form
$link = mysqli_connect("localhost", "root");
mysqli_select_db($link, "maryscae");
$tildes = $link->query("SET NAMES 'utf8'");
mysqli_query($link,"UPDATE info_contratos SET status_contrato='D' WHERE no_contrato='" . $_POST['numContrato_Validar'] . "'");
echo mysqli_error($link);
mysqli_close($link); // Cerramos la conexion con la base de datos
header ("location: ../contratos_rev.php");
?>
