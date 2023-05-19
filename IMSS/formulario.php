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
      <td>Tipo de Observación</td>
      <td>
				<select type="text" class="form-control" name="titulo" required>
						<option></option>
						<option value="Primer Validación">Solicitud de Revisión</option>
						<option value="Gramática y Ortografía">Gramática y Ortografía</option>
						<option value="Redacción">Redacción</option>
						<option value="Orden y secuencia">Orden y secuencia</option>
						<option value="Diferencias al fallo">Diferencias al fallo</option>
						<option value="Contenido legal">Contenido legal</option>
						<option value="Documentación faltante">Documentación faltante</option>
						<option value="Validado">Validado</option>
				</select>
			</td>
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
