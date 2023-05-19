<?php
$no_contrato = $_POST['no_contrato'];
// process form
$link = mysqli_connect("localhost", "root");
mysqli_select_db($link, "maryscae");
$tildes = $link->query("SET NAMES 'utf8'");
mysqli_query($link,"UPDATE info_contratos SET status_contrato='E' WHERE no_contrato='" . $_POST['no_contrato'] . "'");
echo mysqli_error($link);
mysqli_close($link); // Cerramos la conexion con la base de datos
header ("location: ../contratos_tooadr.php");
?>
