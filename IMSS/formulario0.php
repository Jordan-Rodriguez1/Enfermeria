<?php
	if(isset($_GET["respuestas"]))
		$respuestas = $_GET['respuestas'];
	else
		$respuestas = 0;
	if(isset($_GET["identificador"]))
		$identificador = $_GET['identificador'];
	else
		$identificador = 0;
?>
<table>
<form name="form" action="agregar.php" method="post">
	<input type="hidden" name="identificador" value="<?php echo $identificador;?>">
	<input type="hidden" name="respuestas" value="<?php echo $respuestas;?>">
    <tr>
		<td>Autor </td>
		<td><input type="text" name="autor"></td>
    </tr>
    <tr>
      <td>Número de contrato </td>
	<td>

	<select class="form-control" id="" name="titulo" onChange="">
	  <?php
	                          $link = mysqli_connect("localhost", "root");
	                          mysqli_select_db($link, "maryscae");
	                          $tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
	                          $result = mysqli_query($link, "SELECT info_contratos.no_contrato as NC FROM info_contratos ORDER BY info_contratos.no_contrato DESC;");
	                          while ($fila = mysqli_fetch_assoc($result)){
	                          echo "<option>";
	                          echo $fila['NC'];
	                          echo "</option>";
	                          }
	                          mysqli_free_result($result);
	                          mysqli_close($link);
	                      ?>
	               </select></td>




    </tr>
    <tr>
      <td>Mensaje</td>
      <td><textarea name="mensaje" cols="50" rows="5" required="required"></textarea></td>
    </tr>
    <tr>
      <td><input type="submit" id="submit" name="submit" value="Enviar Mensaje"></td>
    </tr>
  </form>
</table>
